<?php

namespace Thunder2002\PhpLib;

require_once('Object.php');

class String extends Object {
	private $mb_str;

	public function __construct() {
		parent::__construct();
	}

	public function indexOf($str, $offset = 0) {
		return mb_strpos($this->mb_str, $str, $offset);
	}

	public function contains($str) {
		return $this->indexOf($str) > -1;
	}

	public function endsWith($str) {
		return mb_strpos(mb_strrev($this->mb_str), mb_strrev($str)) === 0;
	}

	public function startsWith($str) {
		return mb_strpos($this->mb_str) === 0;
	}

	public function format($format) {
		// func_num_args
		// func_get_arg(i)
	}

	public function toLower() {
		return mb_strtolower($this->mb_str);
	}

	public function toUpper() {
		return mb_strtoupper($this->mb_str);
	}

	public function length() {
		return mb_strlen($this->mb_str);
	}

	public function reverse() {
		return new String(mb_strrev($this->mb_str));
	}

}

?>
