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

function mb_triml($str) {
	$chars = implode('|', array("\s", "\t", "\n", "\r", "\0"));

	$res = mb_ereg_replace("^($chars)*", "", $str);

	return $res;
}

function mb_trimr($str) {
	$chars = implode('|', array("\s", "\t", "\n", "\r", "\0"));

	$res = mb_ereg_replace("($chars)*$", "", $str);

	return $res;
}

function mb_trim($str) {
	$chars = implode('|', array("\s", "\t", "\n", "\r", "\0"));

	$res = mb_ereg_replace("^($chars)*", "", $str);
	$res = mb_ereg_replace("($chars)*$", "", $res);

	return $res;
}

?>
