<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once("persian_date.php");

function persian_en($str)
{
	$str = str_replace("۰", "0", $str);
	$str = str_replace("۱", "1", $str);
	$str = str_replace("۲", "2", $str);
	$str = str_replace("۳", "3", $str);
	$str = str_replace("۴", "4", $str);
	$str = str_replace("۵", "5", $str);
	$str = str_replace("۶", "6", $str);
	$str = str_replace("۷", "7", $str);
	$str = str_replace("۸", "8", $str);
	$str = str_replace("۹", "9", $str);
	$str = str_replace("٠", "0", $str);
	$str = str_replace("١", "1", $str);
	$str = str_replace("٢", "2", $str);
	$str = str_replace("٣", "3", $str);
	$str = str_replace("٤", "4", $str);
	$str = str_replace("٥", "5", $str);
	$str = str_replace("٦", "6", $str);
	$str = str_replace("٧", "7", $str);
	$str = str_replace("٨", "8", $str);
	$str = str_replace("٩", "9", $str);

	return $str;
}

function persian_fa($str)
{
	$str = str_replace("٠", "۰", $str);
	$str = str_replace("١", "۱", $str);
	$str = str_replace("٢", "۲", $str);
	$str = str_replace("٣", "۳", $str);
	$str = str_replace("٤", "۴", $str);
	$str = str_replace("٥", "۵", $str);
	$str = str_replace("٦", "۶", $str);
	$str = str_replace("٧", "۷", $str);
	$str = str_replace("٨", "۸", $str);
	$str = str_replace("٩", "۹", $str);
	$str = str_replace("0", "۰", $str);
	$str = str_replace("1", "۱", $str);
	$str = str_replace("2", "۲", $str);
	$str = str_replace("3", "۳", $str);
	$str = str_replace("4", "۴", $str);
	$str = str_replace("5", "۵", $str);
	$str = str_replace("6", "۶", $str);
	$str = str_replace("7", "۷", $str);
	$str = str_replace("8", "۸", $str);
	$str = str_replace("9", "۹", $str);
	$str = str_replace("ك", "ک", $str);
	$str = str_replace("دِ", "د", $str);
	$str = str_replace("بِ", "ب", $str);
	$str = str_replace("زِ", "ز", $str);
	$str = str_replace("ذِ", "ذ", $str);
	$str = str_replace("شِ", "ش", $str);
	$str = str_replace("سِ", "س", $str);
	$str = str_replace("ى", "ی", $str);
	$str = str_replace("ي", "ی", $str);
	$str = str_replace("ة", "ه", $str);

	return $str;
}

function persian_form_select($id, $title, $dir, $option)
{
	$c_value = get_option($id);

	$dir = ($c_value == "") ? 'rtl' : $dir;

	$out = "<div class='form-group'><label for='{$id}' class='control-label'>{$title}</label><select name='{$id}' id='{$id}' class='form-control' dir='{$dir}'>";

	if (isset($option) && is_array($option))
	{
		$out .= "<option value=''>انتخاب کنید ...</option>";

		foreach($option as $key => $value)
		{
			$out .= (isset($c_value) && $c_value == $key) ? "<option value='{$key}' selected>{$value}</option>" : "<option value='{$key}'>{$value}</option>";
		}
	}

	$out .= "</select></div>";

	return $out;
}