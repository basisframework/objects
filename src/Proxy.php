<?php
namespace Basis\Objects;

class Proxy {
	private $target;

	public function __construct($target) {
		$this->target = $target;
	}

	public function __isset($name) {
		return isset($this->target->$name);
	}

	public function &__get($name) {
		return $this->target->$name;
	}

	public function __set($name, $val) {
		$this->target->$name = $val;
	}

	public function __unset($name) {
		unset($this->target->$name);
	}

	public function __clone() {
		return new static($this->target);
	}

	public function __call($fn, $args) {
		return call_user_func_array(array($this->target, $fn), $args);
	}

	public function __toString() {
		return (string)$this->target;
	}

	protected function getTarget() {
		return $this->target;
	}
	
};
