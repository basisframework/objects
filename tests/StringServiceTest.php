<?php
require dirname(__DIR__) . '/src/StringService.php';
require dirname(__DIR__) . '/vendor/autoload.php';
require dirname(__DIR__) . '/src/Stringlike.php';
require __DIR__ . '/fixtures/MockStringlike.php';

class StringServiceTest extends PHPUnit_Framework_TestCase {

	public function setUp() {
		$this->string = new Basis\Objects\StringService;
	}

	public function testStringConversionToUppercase() {
		$string = 'hello world';
		$upper = $this->string->toUpper($string);

		$this->assertEquals('HELLO WORLD', $upper);
	}

	public function testStringlikeConversionToUppercase() {
		$string = new MockStringlike('hello world');
		$upper = $this->string->toUpper($string);

		$this->assertEquals('HELLO WORLD', $upper);
	}

	public function testStringConversionToLowercase() {
		$string = 'HELLO WORLD';
		$upper = $this->string->toLower($string);

		$this->assertEquals('hello world', $upper);
	}

	public function testStringlikeConversionToLowercase() {
		$string = new MockStringlike('HELLO WORLD');
		$upper = $this->string->toLower($string);

		$this->assertEquals('hello world', $upper);
	}

	public function testStringConversionToSpaced() {
		$string = 'My_Variable_Name';
		$spaced = $this->string->toSpaced($string);

		$this->assertEquals('My Variable Name', $spaced);
	}

	public function testStringlikeConversionToSpaced() {
		$string = new MockStringlike('My_Variable_Name');
		$spaced = $this->string->toSpaced($string);

		$this->assertEquals('My Variable Name', $spaced);
	}

	public function testStringConversionToCamel() {
		$string = 'my_variable_name';
		$spaced = $this->string->toCamel($string);

		$this->assertEquals('myVariableName', $spaced);
	}

	public function testStringlikeConversionToCamel() {
		$string = new MockStringlike('my_variable_name');
		$spaced = $this->string->toCamel($string);

		$this->assertEquals('myVariableName', $spaced);
	}
	
};
