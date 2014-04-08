<?php
namespace Basis\Objects;

class Stream {
	private $data = '';

	public function write($data) {
		$this->data .= $data;
	}

	public function read($bytes) {
		if(strlen($this->data) < $bytes) {
			return NULL;
		}

		$data = substr($this->data, 0, $bytes);
		$this->data = substr($this->data, $bytes);
		return $data;
	}
	
};
