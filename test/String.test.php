<?php

namespace Thunder2002\PhpLib;

require_once('simpletest/autorun.php');
require_once('../String.php');

class StringUnitTest extends \UnitTestCase {
	function testDummy() {
		$this->assertTrue(true);
	}

	function testConstructorEmpty() {
		$s = new String();
		$this->assertEqual($s->toString(), '');
	}
	function testConstructorNull() {
		$s = new String(null);
		$this->assertEqual($s->toString(), null);
	}
	function testConstructorHelloWorld() {
		$s = new String("Hello World");
		$this->assertEqual($s->toString(), "Hello World");
	}
	function testIndexOf() {
		$s = new String("Hello World");
		$this->assertEqual($s->indexOf("World"), 6);
	}
	function testIndexOfNegative() {
		$s = new String("Hello World");
		$this->assertEqual($s->indexOf("Test"), false);
	}
	function testIndexOfAny() {
		$s = new String("Hello World");
		$this->assertEqual($s->indexOfAny(array("a", "e")), 1);
	}
	function testLastIndexOf() {
		$s = new String("Hello World");
		$this->assertEqual($s->lastIndexOf("l"), 9);
	}
	function testLastIndexOfAny() {
		$s = new String("Hello World");
		$this->assertEqual($s->lastIndexOfAny(array("x", "o")), 7);
	}
	function testPadEven() {
		$s = new String("Test");
		$this->assertEqual($s->pad(8), "  Test  ");
	}
	function testPadOdd() {
		$s = new String("Test");
		$this->assertEqual($s->pad(7), " Test  ");
	}
	function testPadLeft() {
		$s = new String("Test");
		$this->assertEqual($s->padLeft(7), "   Test");
	}
	function testPadRight() {
		$s = new String("Test");
		$this->assertEqual($s->padRight(7), "Test   ");
	}
	function testTrim() {
		$s = new String("   Test   ");
		$this->assertEqual($s->trim(), "Test");
	}
	function testTrimEnd() {
		$s = new String("   Test   ");
		$this->assertEqual($s->trimEnd(), "   Test");
	}
	function testTrimStart() {
		$s = new String("   Test   ");
		$this->assertEqual($s->trimStart(), "Test   ");
	}
}

?>
