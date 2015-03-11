
<?php
$word_file = file_get_contents ( $_POST ["select_form"] );
print '<head><LINK href="style.css" rel="stylesheet" type="text/css"></head>';
print '<meta http-equiv="content-type" content="text/html; charset=utf-8">';
print '<form action="letter_output.php" method="post" align="right">';
$word_file = explode ( '{SET_RADIO}', $word_file );
foreach ( $word_file as $key => $value ) {
	
	$value = word_file_radio ( $value, '{RADIO}', '<input type="radio" name="radio[' . $key . ']" value="{KEY}">', TRUE );
	$value = str_replace ( '{/SET_RADIO}', ' ', $value );
	@$final_result .= $value;
}

$final_result = word_file_data ( $final_result, '{INPUT}', '<input type="text" name="field[{KEY}]">', TRUE );
$final_result = word_file_data ( $final_result, '{CHECKBOX}', '<input type="checkbox" name="check[{KEY}]">', TRUE );

print $final_result;
print '<input type="hidden" name="select_form" value="' . $_POST ['select_form'] . '" />';
print '<input type="submit">';
print '</form>';

//
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
	foreach ( $explode_for_replacer as $key => $paragraph ) {
		$nummm ++;
		$final_result .= $paragraph;
		if (isset ( $explode_for_replacer [$key + 1] )) {
			if ($input) {
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