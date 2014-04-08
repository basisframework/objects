<?php
namespace Basis\Objects\Stream;
use Basis\Objects\Stream;

interface SeekableStream extends Stream {
	
	/**
	 * Check the current position of the cursor within the stream
	 * @return integer
	 */
	public function tell();

	/**
	 * Seek to position $bytes from the beginning of the stream
	 * @param integer $bytes
	 * @return null
	 */
	public function seek($bytes);

}