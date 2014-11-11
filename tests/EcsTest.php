<?php

namespace Ecs;

class ECSTest extends \PHPUnit_Framework_TestCase {

 	/**
	* @covers \Ecs\Ecs::__construct
	* @expectedException \Ecs\InvalidArgumentException
	*/
 	public function testExceptionIsRaisedForInvalidConstructorArguments() {
		new Ecs(null,null,null);
 	}

        /**
        * @covers \Ecs\Ecs::__construct
        * @expectedException \Ecs\InvalidArgumentException
        */
        public function testExceptionIsRaisedForInvalidConstructorArguments2() {
                new Ecs('test',null,null);
        }

        /**
        * @covers \Ecs\Ecs::__construct
        * @expectedException \Ecs\InvalidArgumentException
        */
        public function testExceptionIsRaisedForInvalidConstructorArguments3() {
                new Ecs(null,'test',null);
        }

        /**
        * @covers \Ecs\Ecs::__construct
        * @expectedException \Ecs\InvalidArgumentException
        */
        public function testExceptionIsRaisedForInvalidConstructorArguments4() {
                new Ecs(null,null,'test');
        }

        /**
        * @covers \Ecs\Ecs::__construct
        * @expectedException \Ecs\InvalidArgumentException
        */
        public function testExceptionIsRaisedForInvalidConstructorArguments5() {
                new Ecs('test',null,'test');
        }

        /**
        * @covers \Ecs\Ecs::__construct
        * @expectedException \Ecs\InvalidArgumentException
        */
        public function testExceptionIsRaisedForInvalidConstructorArguments6() {
                new Ecs(null,'test','test');
        }

        /**
        * @covers \Ecs\Ecs::__construct
        * @expectedException \Ecs\InvalidArgumentException
        */
        public function testExceptionIsRaisedForInvalidConstructorArguments7() {
                new Ecs('test',null,null);
        }


	 /**
	* @covers \Ecs\Ecs::__construct
	*/
        public function testForValidConstructorArguments() {
                $e = new Ecs('test','test','test');
		
		$this->assertInstanceOf('Ecs\\Ecs', $e);

		return $e;

        }




}
