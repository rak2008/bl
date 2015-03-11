<?php include 'Files.php';?>
<?php
$select_form ='';
print '<head><LINK href="style.css" rel="stylesheet" type="text/css"></head>';
print '<meta charset="UTF-8">';
print '<form action="form_print.php" method="post" align="right">';
print '<select name="select_form">';

foreach ($file_select as $key => $value) 
{
	print "<option value=".$file_select[$key]['file'].">".$file_select[$key]['name']."</option>";
}


/* print '<option value="' . $file_select [1] ['file'] . '">' . $file_select [1] ['name'] . '</option>';
print '<option value="' . $file_select [2] ['file'] . '">' . $file_select [2] ['name'] . '</option>';
print '<option value="' . $file_select [3] ['file'] . '">' . $file_select [3] ['name'] . '</option>';
print '<option value="' . $file_select [4] ['file'] . '">' . $file_select [4] ['name'] . '</option>';
print '<option value="' . $file_select [5] ['file'] . '">' . $file_select [5] ['name'] . '</option>';
print '<option value="' . $file_select [8] ['file'] . '">' . $file_select [8] ['name'] . '</option>';
print '<option value="' . $file_select [11] ['file'] . '">' . $file_select [11] ['name'] . '</option>';
print '<option value="' . $file_select [12] ['file'] . '">' . $file_select [12] ['name'] . '</option>';
print '<option value="' . $file_select [13] ['file'] . '">' . $file_select [13] ['name'] . '</option>';*/
print '</select>';
print '<input type="submit">'; 