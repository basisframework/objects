<?php
use Basis\Objects\Types\Stringlike;

class MockStringlike implements Stringlike {
	private $str;

	public function __construct($str) {
		$this->str = $str;
	}

	public function toString() {
		return $this->str;
	}
}