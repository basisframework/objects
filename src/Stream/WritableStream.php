<?php
namespace Basis\Objects\Stream;
use Basis\Objects\Stream;

interface WritableStream extends Stream {
	
	/**
	 * Write data $data to the stream
	 * @param string $data
	 */
	public function write($data);

};
