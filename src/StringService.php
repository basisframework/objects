<?php
namespace Basis\Objects;

class StringService {
	private $encoding;

	public function __construct($encoding = 'UTF-8') {
		$this->encoding = $encoding;
	}

	/**
	 * Convert a string to uppercase
	 * @param string $str
	 * @return string
	 */
	function toUpper($str) {
		if(is_a($str, 'Basis\Objects\Stringlike')) {
			$str = $str->toString();
		}

		return mb_strtoupper((string)$str, $this->encoding);
	}

	/**
	 * Convert a string to lowercase
	 * @param string $str
	 * @return string
	 */
	function toLower($str) {
		if(is_a($str, 'Basis\Objects\Stringlike')) {
			$str = $str->toString();
		}

		return mb_strtolower((string)$str, $this->encoding);
	}

	/**
	 * Convert all underscores in a string to spaces
	 * @param string $str
	 * @return string
	 */
	function toSpaced($str) {
		if(is_a($str, 'Basis\Objects\Stringlike')) {
			$str = $str->toString();
		}

		return str_replace('_', ' ', (string)$str);
	}

	/**
	 * Convert an underscored or spaced string to camelcase
	 * @param string $str
	 * @return string
	 */
	function toCamel($str) {
		$str = $this->toLower($this->toSpaced($str));

		// Convert to title case and remove spaces
		$str = str_replace(' ', '', mb_convert_case($str, MB_CASE_TITLE, $this->encoding));
		$len =  mb_strlen($str, $this->encoding);

		$first = mb_substr($str, 0, 1, $this->encoding);
		$rest = mb_substr($str, 1, $len - 1, $this->encoding);
		return mb_strtolower($first, $this->encoding) . $rest;
	}
	
};
