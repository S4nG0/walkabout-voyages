<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('code')) {

    function code() {
        $characts = 'abcdefghijklmnopqrstuvwxyz';
        $characts .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$characts .= '1234567890';
	$code_aleatoire = '';

	for($i=0;$i < 18;$i++)    //10 est le nombre de caractères
	{
            $code_aleatoire .= substr($characts,rand()%(strlen($characts)),1);
	}

        return $code_aleatoire;
    }
}

function slugify($text,$strict = false) {
    $text = html_entity_decode($text, ENT_QUOTES, 'UTF-8');
    // replace non letter or digits by -
    $text = preg_replace('~[^\\pL\d.]+~u', '-', $text);

    // trim
    $text = trim($text, '-');
    setlocale(LC_CTYPE, 'en_GB.utf8');
    // transliterate
    if (function_exists('iconv')) {
       $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
    }

    // lowercase
    $text = strtolower($text);
    // remove unwanted characters
    $text = preg_replace('~[^-\w.]+~', '', $text);
    if (empty($text)) {
       return 'empty_$';
    }
    if ($strict) {
        $text = str_replace(".", "_", $text);
    }
    return $text;
}