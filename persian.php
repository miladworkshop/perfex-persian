<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*
	Module Name: توسعه پارسی
	Description: بهینه سازی زبان فارسی و Dateی سیستم
	Author: میلاد مالدار
	Author URI: https://miladworkshop.ir
	Version: 1.0.0
	Requires at least: 2.3.*
*/

require_once("inc/date.php");

register_language_files('persian', ['persian']);

hooks()->add_filter('after_format_date', 'persian_after_format_date');
hooks()->add_filter('after_format_datetime', 'persian_after_format_datetime');
hooks()->add_filter('before_sql_date_format', 'persian_before_sql_date_format');

hooks()->add_action('app_admin_head', 'persian_theme_style_persian_header');
hooks()->add_action('app_admin_authentication_head', 'persian_theme_style_persian_header');
hooks()->add_action('app_customers_head', 'persian_theme_style_persian_header');

hooks()->add_action('app_admin_footer', 'persian_theme_style_persian_footer');
hooks()->add_action('app_customers_footer', 'persian_theme_style_persian_footer');

function persian_english_number($number)
{
	$number = str_replace("۰", "0", $number);
	$number = str_replace("۱", "1", $number);
	$number = str_replace("۲", "2", $number);
	$number = str_replace("۳", "3", $number);
	$number = str_replace("۴", "4", $number);
	$number = str_replace("۵", "5", $number);
	$number = str_replace("۶", "6", $number);
	$number = str_replace("۷", "7", $number);
	$number = str_replace("۸", "8", $number);
	$number = str_replace("۹", "9", $number);
	$number = str_replace("٠", "0", $number);
	$number = str_replace("١", "1", $number);
	$number = str_replace("٢", "2", $number);
	$number = str_replace("٣", "3", $number);
	$number = str_replace("٤", "4", $number);
	$number = str_replace("٥", "5", $number);
	$number = str_replace("٦", "6", $number);
	$number = str_replace("٧", "7", $number);
	$number = str_replace("٨", "8", $number);
	$number = str_replace("٩", "9", $number);

	return $number;
}


function persian_after_format_date($date, $time = false)
{
	$timestamp 		= new DateTime($date);
	$timestamp 		= $timestamp->format('U');

	$date_format 	= (isset($time) && $time == true) ? "Y/m/d H:i" : "Y/m/d";

	return (isset($timestamp) && $timestamp > 1600000000) ? jdate($date_format, $timestamp) : $date;
}

function persian_after_format_datetime($date)
{
	return persian_after_format_date($date, true);
}

function persian_before_sql_date_format($date)
{
	$date 	= str_replace("/", "-", $date);
	$date 	= persian_english_number($date);
	$date 	= explode("-", $date);

	if ($date[0] > 1379 && $date[0] < 1999)
	{
		$gdate 	= jalali_to_gregorian($date[0], $date[1], $date[2]);

		$gdate[1] = ($gdate[1] > 9) ? $gdate[1] : "0{$gdate[1]}";
		$gdate[2] = ($gdate[2] > 9) ? $gdate[2] : "0{$gdate[2]}";
		
		$date = "{$gdate[0]}-{$gdate[1]}-{$gdate[2]}";
	} else {
		$date = "{$date[0]}-{$date[1]}-{$date[2]}";
	}

	return $date;
}

function persian_theme_style_persian_header()
{
	echo '<link href="'. module_dir_url('persian', 'assets/css/persian.css') .'"  rel="stylesheet" type="text/css" />';
	echo '<link href="'. module_dir_url('persian', 'assets/css/persian-datepicker.min.css') .'"  rel="stylesheet" type="text/css" />';
}

function persian_theme_style_persian_footer()
{
	echo '<script src="'. module_dir_url('persian', 'assets/js/persian.js') .'"></script>';
	echo '<script src="'. module_dir_url('persian', 'assets/js/persian-date.min.js') .'"></script>';
	echo '<script src="'. module_dir_url('persian', 'assets/js/persian-datepicker.min.js') .'"></script>';
}