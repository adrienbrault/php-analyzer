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

namespace Scrutinizer\PhpAnalyzer\DataFlow\TypeInference\FunctionInterpreter;

use Scrutinizer\PhpAnalyzer\Model\GlobalFunction;
use Scrutinizer\PhpAnalyzer\PhpParser\Type\PhpType;

/**
 * Interface for abstract interpretation of function return types.
 *
 * @author Johannes M. Schmitt <johannes@scrutinizer-ci.com>
 */
interface FunctionInterpreterInterface
{
    /**
     * Returns the return type of the passed function.
     *
     * @param GlobalFunction $function
     * @param array $argTypes
     *
     * @return PhpType|null
     */
    function getPreciserFunctionReturnTypeKnowingArguments(GlobalFunction $function, array $argValues, array $argTypes);
}