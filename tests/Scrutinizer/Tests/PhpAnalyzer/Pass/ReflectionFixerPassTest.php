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

namespace Scrutinizer\Tests\PhpAnalyzer\Pass;

class ReflectionFixerPassTest extends BaseFixingPassTest
{
   protected function getPasses()
   {
       $passes = \Scrutinizer\PhpAnalyzer\PassConfig::createForTypeScanning()->getPasses();
       $passes[] = new \Scrutinizer\PhpAnalyzer\Pass\ReflectionFixerPass();

       return $passes;
   }

   protected function getTestDir()
   {
       return __DIR__.'/Fixture/ReflectionFixer';
   }
}