<?php
namespace Basis\Objects\Stream;
use Basis\Objects\Stream;

interface ReadableStream extends Stream {
	
	/**
	 * Read $bytes bytes from the stream
	 * @param integer $bytes
	 * @return string
	 */
	public function read($bytes);

	/**
	 * Reads out all the remaining bytes from the stream
	 * @return string
	 */
	public function readAll();

};
