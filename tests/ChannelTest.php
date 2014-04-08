<?php
require dirname(__DIR__) . '/src/Channel.php';

class DummyObject {

};

class ChannelTest extends PHPUnit_Framework_TestCase {

	public function testSendingAPrimitive() {
		$num = 10;
		$success = FALSE;

		$channel = new Basis\Objects\Channel('integer');
		$channel->receive(function($i) use(&$success, $num) {
			if($num == $i) {
				$success = TRUE;
			}
		});

		$channel->send($num);
		$this->assertEquals(TRUE, $success);
	}

	public function testQueuingAPrimitive() {
		$num = 10;
		$success = FALSE;

		$channel = new Basis\Objects\Channel('integer');
		$channel->send($num);

		$channel->receive(function($i) use(&$success, $num) {
			if($num == $i) {
				$success = TRUE;
			}
		});

		$this->assertEquals(TRUE, $success);
	}

	public function testSendingAnObject() {
		$success = FALSE;

		$channel = new Basis\Objects\Channel('DummyObject');
		$channel->receive(function($msg) use(&$success) {
			if(is_a($msg, 'DummyObject')) {
				$success = TRUE;
			}
		});

		$channel->send(new DummyObject);
		$this->assertEquals(TRUE, $success);
	}

	public function testQueuingAnObject() {
		$success = FALSE;

		$channel = new Basis\Objects\Channel('DummyObject');
		$channel->send(new DummyObject);

		$channel->receive(function($msg) use(&$success) {
			if(is_a($msg, 'DummyObject')) {
				$success = TRUE;
			}
		});

		$this->assertEquals(TRUE, $success);
	}
	
};
