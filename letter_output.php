<?php
print '<head><LINK href="style.css" rel="stylesheet" type="text/css"></head>';
$word_file = file_get_contents($_POST["select_form"]);

if (isset ( $_POST ) && count ( $_POST ) > 0) {
	$final_result = word_file_data ( $word_file, '{INPUT}', 'field', FALSE );
	$final_result = word_file_data ( $final_result, '{CHECKBOX}', 'check', FALSE );
	
	$final_result = explode ( '{SET_RADIO}', $final_result );
	$final_text = '';
	foreach ( $final_result as $key => $value ) {
		$value = word_file_radio ( $value, '{RADIO}', 'radio', FALSE, @$_POST ['radio'] [$key] );
		$value = str_replace ( '{/SET_RADIO}', ' ', $value );
		$final_text .= $value;
	}
	print '<meta http-equiv="content-type" content="text/html; charset=utf-8">';
	print $final_text;
	exit ();
}
function word_file_data($data, $replacer, $replacement, $input = true) {
	$explode_for_replacer = explode ( $replacer, $data );
	$final_result = '';
	foreach ( $explode_for_replacer as $key => $paragraph ) {
		$final_result .= $paragraph;
		if (isset ( $explode_for_replacer [$key + 1] )) {
			if ($input)
				$final_result .= str_replace ( '{KEY}', $key, $replacement );
			else {
				if (isset ( $_POST [$replacement] [$key] ))
					$final_result .= $_POST [$replacement] [$key];
			}
		}
	}
	// return the word file for input html
	return $final_result;
}

//
function word_file_radio($data, $replacer, $replacement, $input = true, $selectedKey = FALSE) {
	$explode_for_replacer = explode ( $replacer, $data );
	$final_result = '';
	$nummm = 0;
	foreach ( $explode_for_replacer as $key => $paragraph ) 
	{
		$nummm ++;
		$final_result .= $paragraph;
		if (isset ( $explode_for_replacer [$key + 1] )) 
		{
			if ($input) 
			{
				$final_result .= str_replace ( '{KEY}', $key, $replacement );
			} else {
				if ($selectedKey == $key) {
					$final_result .= '(✓)';
				} else {
					$final_result .= '( )';
					}
				}
		}
	}
		return $final_result;
	}

