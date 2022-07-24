<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

const DEFAULT_LANGUAGE = 'english';
const DEFAULT_LANGUAGE_CODE = 'en-US';

define('DEFAULT_DATE', mktime(0, 0, 0, 1, 1, 2010));
define('DEFAULT_DATETIME', mktime(0, 0, 0, 1, 1, 2010));

/**
 * Currency locale helper
 */

function cek($params){
	echo "<pre>";
	print_r($params);
	echo "</pre>";
}