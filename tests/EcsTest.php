<?php

namespace Ecs;

class ECSTest extends \PHPUnit_Framework_TestCase {

 public function testExceptionIsRaisedForInvalidConstructorArguments() {
	new Ecs('test','test','test');
 }

}
