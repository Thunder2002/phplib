<?php

function mb_strrev($str, $enc) {
	if ($enc === null) {
		$enc = mb_detect_encoding($str);
	}

	$len = mb_strlen($str, $enc);
	$rev = '';

	while ($len-- > 0) {
		$rev .= mb_substr($mb_str, $len, 1, $enc);
	}

	return $rev;
}

?>
