<?php

namespace Thunder2002\PhpLib;

require_once('Object.php');

class String extends Object implements \ArrayAccess {
	//const Empty = '';

	private $mb_str;

	public function __construct($str = null) {
		parent::__construct();

		$this->mb_str = $str;
	}

	public function indexOf($str, $offset = 0) {
		return mb_strpos($this->mb_str, $str, $offset);
	}

	public function indexOfAny($chars, $offset = 0) {
		$arr = $this->toArray();

		for ($i = $offset; $i < count($arr); ++$i) {
			for ($j = 0; $j < count($chars); ++$j) {
				if ($arr[$i] == $chars[$j]) {
					return $i;
				}
			}
		}

		return false;
	}

	public function lastIndexOf($str, $offset = 0) {
		for ($i = $this->len() - 1; $i >= $offset; --$i) {
			$idx = mb_strpos($this->mb_str, $str, $i);
			if ($idx !== false) {
				return $idx;
			}
		}

		return false;
	}

	public function lastIndexOfAny($chars, $offset = 0) {
		$arr = $this->toArray();

		for ($i = $this->len() - 1; $i >= $offset; --$i) {
			for ($j = 0; $j < count($chars); ++$j) {
				if ($arr[$i] == $chars[$j]) {
					return $i;
				}
			}
		}

		return false;

	}

	public function bytes() {
		return strlen($this->mb_str);
	}

	public function pad($len, $ch = ' ') {
		$padLeft = '';
		$padRight = '';
		$diffLen = $len - $this->len();

		for ($i = 0; $i < $diffLen; ++$i) {
			if ($i % 2 == 0) {
				$padRight .= $ch;
			} else {
				$padLeft .= $ch;
			}
		}

		return $padLeft . $this->mb_str . $padRight;
	}

	public function padLeft($len, $ch = ' ') {
		$padLeft = '';
		$diffLen = $len - $this->len();

		for ($i = 0; $i < $diffLen; ++$i) {
			$padLeft .= $ch;
		}

		return $padLeft . $this->mb_str;
	}

	public function padRight($len, $ch = ' ') {
		$padRight = '';
		$diffLen = $len - $this->len();

		for ($i = 0; $i < $diffLen; ++$i) {
			$padRight .= $ch;
		}

		return $this->mb_str . $padRight;
	}

	public function trim() {
		return mb_trim($this->mb_str);
	}

	public function trimEnd() {
		return mb_trimr($this->mb_str);
	}

	public function trimStart() {
		return mb_triml($this->mb_str);
	}

	public function replace($search, $replace) {
	}

	public function remove($offset, $len = null) {
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

	public function lower() {
		return mb_strtolower($this->mb_str);
	}

	public function upper() {
		return mb_strtoupper($this->mb_str);
	}

	public function len() {
		return mb_strlen($this->mb_str);
	}

	public function rev() {
		return new String(mb_strrev($this->mb_str));
	}

	public function sub($offset, $length = null) {
		if ($length === null) {
			$length = mb_strlen($this->mb_str) - $offset;
		}

		return mb_substr($this->mb_str, $offset, $length);
	}

	public function split($pattern, $limit = -1) {
		$arr = mb_split($pattern, $this->mb_str, $limit);
		$len = count($arr);
		$res = array();

		for ($i = 0; $i < $len; ++$i) {
			$res[] = new String($arr[$i]);
		}

		return $res;
	}

	public function insert($offset, $str) {
	}

	public function toArray($offset = 0, $len = null) {
		if ($len === null) {
			$len = $this->len();
		}

		$chars = array();
		$length = $this->len();

		for ($i = 0; $i < $length; ++$i) {
			$chars[] = $this->sub($i, 1);
		}

		return $chars;
	}

	// Override
	public function toString() {
		return $this->mb_str;
	}

	// ArrayAccess methods
	public function offsetSet($offset, $value) {
	}
	public function offsetGet($offset) {
		return $this->sub($offset, 1);
	}
	public function offsetExists($offset) {
		return is_int($offset) && $offset > 0 && $offset < $this->len();
	}
	public function offsetUnset($offset) {
	}
}

?>
