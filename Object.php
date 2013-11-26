<?php

namespace Thunder2002\PhpLib;

require_once('common.php');

class Object {
	function __construct() {
	}

	function toString() {
		return get_class($this);
	}

	public function __toString() {
		return $this->toString();
	}
}
