<?php
namespace Basis\Objects;
use Basis\Objects\Stringlike;

class StringService {
	private $encoding;

	public function __construct($encoding = 'UTF-8') {
		$this->encoding = $encoding;
	}

	/**
	 * Convert a value to a string
	 * @param $val
	 * @return string
	 */
	public function cast($val) {
		if(is_object($val) && is_a($val, 'Basis\Objects\Stringlike')) {
			$val = $val->toString();
		}

		return (string)$val;
	}

	/**
	 * Convert a string to uppercase
	 * @param string|Stringlike $str
	 * @return string
	 */
	function toUpper($str) {
		$str = $this->cast($str);
		return mb_strtoupper($str, $this->encoding);
	}

	/**
	 * Convert a string to lowercase
	 * @param string|Stringlike $str
	 * @return string
	 */
	function toLower($str) {
		$str = $this->cast($str);
		return mb_strtolower($str, $this->encoding);
	}

	/**
	 * Convert all underscores in a string to spaces
	 * @param string|Stringlike $str
	 * @return string
	 */
	function toSpaced($str) {
		$str = $this->cast($str);
		return str_replace('_', ' ', $str);
	}

	/**
	 * Convert an underscored or spaced string to camelcase
	 * @param string|Stringlike $str
	 * @return string
	 */
	function toCamel($str) {
		$str = $this->cast($str);
		$str = $this->toLower($this->toSpaced($str));

		// Convert to title case and remove spaces
		$str = str_replace(' ', '', mb_convert_case($str, MB_CASE_TITLE, $this->encoding));
		$len =  mb_strlen($str, $this->encoding);

		$first = mb_substr($str, 0, 1, $this->encoding);
		$rest = mb_substr($str, 1, $len - 1, $this->encoding);
		return mb_strtolower($first, $this->encoding) . $rest;
	}
	
};
