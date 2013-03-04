<?php

/*
 * Copyright 2013 Johannes M. Schmitt <johannes@scrutinizer-ci.com>
 * 
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 * 
 *     http://www.apache.org/licenses/LICENSE-2.0
 * 
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

namespace Scrutinizer\PhpAnalyzer\Model\Persister;

use Doctrine\DBAL\Connection;
use Doctrine\DBAL\Types\Type;
use Scrutinizer\PhpAnalyzer\Model\CallGraph\Argument;
use Scrutinizer\PhpAnalyzer\Model\Type\PhpTypeType;

class ArgumentPersister
{
    const INSERT_SQL = 'INSERT INTO `callsite_arguments`(`index_nb`, `phpType`, `callSite_id`) VALUES (?, ?, ?)';

    private $con;
    private $platform;
    private $phpType;
    private $insertStmt;

    public function __construct(Connection $con)
    {
        $this->con = $con;
        $this->platform = $con->getDatabasePlatform();
        $this->phpType = Type::getType(PhpTypeType::NAME);
        $this->insertStmt = $con->prepare(self::INSERT_SQL);
    }

    public function persist(Argument $arg, $callSiteId)
    {
        $this->insertStmt->bindValue(1, $arg->getIndex(), \PDO::PARAM_INT);
        $this->insertStmt->bindValue(2, $this->phpType->convertToDatabaseValue($arg->getPhpType(), $this->platform));
        $this->insertStmt->bindValue(3, $callSiteId, \PDO::PARAM_INT);
        $this->insertStmt->execute();
    }
}