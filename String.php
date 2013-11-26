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

	/**
	 * Searches for the first occurrence of the string and returnd the position
	 * @param str    The string to find
	 * @param offset A zero-based offset to start the search from
	 * @return The zero-based position where the string was found or false if not found
	 */
	public function indexOf($str, $offset = 0) {
		return mb_strpos($this->mb_str, $str, $offset);
	}

	/**
	 * Searches for the first occurrence of any given character and returns the position
	 * @param chars  The array of characters to find
	 * @param offset A zero-based offset to start the search from
	 * @return The zero-based position where a character was found or false if not found
	 */
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

	/**
	 * Searches for the last occurrence of the string and returns the position
	 * @param str    The string to find
	 * @param offset A zero-based offset to start the search from TODO
	 * @return The zero-based position where the string was found or false if not found
	 */
	public function lastIndexOf($str, $offset = 0) {
		for ($i = $this->len() - 1; $i >= $offset; --$i) {
			$idx = mb_strpos($this->mb_str, $str, $i);
			if ($idx !== false) {
				return $idx;
			}
		}

		return false;
	}

	/**
	 * Searches for the last occurrence of any given character and return the position
	 * @param chars
	 * @param offset A zero-based offset to start the search from
	 * @return The zero-based position where a character was found or false if not found
	 */
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

	/**
	 * Gets the number of bytes the string takes
	 * @return The number of bytes the string takes
	 */
	public function bytes() {
		return strlen($this->mb_str);
	}

	/**
	 * Creates a new String with equal padding to the left and right,
	 * if the padding is odd the right padding is bigger
	 * @param len The total target length, string and padding
	 * @param ch  The padding character or string
	 * @return A new String containing the old string and the padding
	 */
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

		return new String($padLeft . $this->mb_str . $padRight);
	}

	/**
	 * Creates a new String with padding to the left
	 * @param len The total target length, string and padding
	 * @param ch  The padding character or string
	 * @return A new String containing the old string and the padding
	 */
	public function padLeft($len, $ch = ' ') {
		$padLeft = '';
		$diffLen = $len - $this->len();

		for ($i = 0; $i < $diffLen; ++$i) {
			$padLeft .= $ch;
		}

		return new String($padLeft . $this->mb_str);
	}

	/**
	 * Creates a new String with padding to the right
	 * @param len The total target length, string and padding
	 * @param ch  The padding character or string
	 * @return A new String containing the old string and the padding
	 */
	public function padRight($len, $ch = ' ') {
		$padRight = '';
		$diffLen = $len - $this->len();

		for ($i = 0; $i < $diffLen; ++$i) {
			$padRight .= $ch;
		}

		return new String($this->mb_str . $padRight);
	}

	/**
	 * Creates a new trimmed String without leading or following whitespaces
	 * @return A new trimmed String
	 */
	public function trim() {
		return mb_trim($this->mb_str);
	}

	/**
	 * Creates a new trimmed String without following whitespaces
	 * @return A new trimmed String
	 */
	public function trimEnd() {
		return mb_trimr($this->mb_str);
	}

	/**
	 * Creates a new trimmed String without leading whitespaces
	 * @return A new trimmed String
	 */
	public function trimStart() {
		return mb_triml($this->mb_str);
	}

	/**
	 * Replaces the search string with the replacement string
	 * @param search  The string to replace
	 * @param replace The replacement string
	 * @return A new String with the replaced content
	 */
	public function replace($search, $replace) {
		$res = mb_ereg_replace($search, $replace, $this->mb_str);
		if ($res !== false) {
			return new String($res);
		} else {
			return false;
		}
	}

	public function remove($offset, $len = null) {
		
	}

	/**
	 * Checks whether the String contains the given string
	 * @param str The string to look for
	 * @return A boolean to indicate whether the string exists
	 */
	public function contains($str) {
		return $this->indexOf($str) > -1;
	}

	/**
	 * Checks wether the String ends with the given string
	 * @param str The string it should end with
	 * @return A boolean to indicate wether the string ends with the given one
	 */
	public function endsWith($str) {
		return mb_strpos(mb_strrev($this->mb_str), mb_strrev($str)) === 0;
	}

	/**
	 * Checks wether the String starts with the given string
	 * @param str The string it should start with
	 * @return A boolean to indicate wether the string starts with the given one
	 */
	public function startsWith($str) {
		return mb_strpos($this->mb_str) === 0;
	}

	public function format($format) {
		// func_num_args
		// func_get_arg(i)
	}

	/**
	 * Creates a new String version with lowercase characters
	 * @return The new lowercase String
	 */
	public function lower() {
		return mb_strtolower($this->mb_str);
	}

	/**
	 * Creates a new String version with uppercase characters
	 * @return The new uppercase String
	 */
	public function upper() {
		return mb_strtoupper($this->mb_str);
	}

	/**
	 * Determines the number of characters contained in the String
	 * @return The number of characters
	 */
	public function len() {
		return mb_strlen($this->mb_str);
	}

	/**
	 * Creates a new reversed version of the String
	 * @return The new reversed String
	 */
	public function rev() {
		return new String(mb_strrev($this->mb_str));
	}

	/**
	 * Creates a copy of a portion of the String
	 * @param offset The zero-based start position
	 * @param lengh  The length of the portion
	 * @return A new String containing only the portion of the String
	 */
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

	/**
	 * Inserts the given string at the given offset
	 * @param offset The offset where to insert the string
	 * @param str    The string to insert
	 */
	public function insert($offset, $str) {
		$this->mb_str = $this->sub(0, $offset) . $str . $this->sub($offset, $this->len() - $offset);
	}

	/**
	 * Creates and array of the characters of the string
	 * @param offset The offset where to begin
	 * @param len    The max length of the array
	 * @return An array of the characters of the String
	 */
	public function toArray($offset = 0, $len = null) {
		if ($len === null) {
			$len = $this->len();
		}

		$chars = array();
		$length = $this->len();

		for ($i = $offset; $i < $length && $i < ($offset + $len); ++$i) {
			$chars[] = $this->sub($i, 1);
		}

		return $chars;
	}

	// Override

	/**
	 * Returns the plain string
	 * @return The plain string
	 */
	public function toString() {
		return $this->mb_str;
	}

	// ArrayAccess methods
	public function offsetSet($offset, $value) {
		$this->mb_str = $this->sub(0, $offset) . $value . $this->sub($offset + 1, $this->len() - $offset);
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
