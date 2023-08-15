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

function persian_valid_mobile($mobile)
{
	if (isset($mobile) && !empty($mobile))
	{
		$mobile = (substr($mobile, 0, 2) == "98") 	? substr($mobile, 2) : $mobile;
		$mobile = (substr($mobile, 0, 3) == "+98") 	? substr($mobile, 3) : $mobile;
		$mobile = (substr($mobile, 0, 4) == "0098") ? substr($mobile, 4) : $mobile;
		$mobile = str_replace(" ", "", $mobile);
		$mobile = str_replace("-", "", $mobile);
		$mobile = str_replace("/", "", $mobile);
		@$mobile = (is_numeric($mobile)) ? $mobile * 1 : false;

		if (is_numeric($mobile))
		{
			if ($mobile > 9000000000)
			{
				$mobile = "0{$mobile}";

				if(preg_match("/^09[0-9]{9}$/", $mobile))
				{
				   return $mobile;
				}else{
				   return false;
				}
			} else {
				return false;
			}
		} else {
			return false;
		}
	} else {
		return false;
	}
}

function persian_send_sms($mobile, $message)
{
	$CI = &get_instance();

	if ($CI->app_sms->get_active_gateway() !== false)
	{
		$gateway 	= $CI->app_sms->get_active_gateway();
		$className 	= 'sms_' . $gateway['id'];

		return $CI->{$className}->send($mobile, $message);
	} else {
		return false;
	}
}

function persian_translate_email()
{
	$CI = &get_instance();

	require_once("persian_email.php");
}

function persian_email_theme()
{
	require_once("persian_email_theme.php");
}

function persian_translate_sms()
{
	update_option("sms_trigger_invoice_overdue_notice", "{contact_firstname} {contact_lastname} گرامی\n\nمهلت پرداخت {invoice_number} به اتمام رسیده است.");
	update_option("sms_trigger_invoice_due_notice", "{contact_firstname} {contact_lastname} گرامی\n\nیادآوری مهلت پرداخت فاکتور {invoice_number}\nمبلغ : {invoice_total}\nتاریخ : {invoice_duedate}");
	update_option("sms_trigger_invoice_payment_recorded", "{contact_firstname} {contact_lastname} گرامی\n\nپرداخت شما به مبلغ {payment_total} روی فاکتور {invoice_number} ثبت شد.");
	update_option("sms_trigger_estimate_expiration_reminder", "{contact_firstname} {contact_lastname} گرامی\n\nپیش فاکتور {estimate_number} به زودی منقضی خواهد شد.");
	update_option("sms_trigger_proposal_expiration_reminder", "پروپوزال {proposal_number} به زودی منقضی خواهد شد.");
	update_option("sms_trigger_proposal_new_comment_to_customer", "کاربر گرامی\n\nدیدگاه جدیدی روی پروپوزال {proposal_number} ثبت شد.");
	update_option("sms_trigger_proposal_new_comment_to_staff", "مدیر گرامی\n\nدیدگاه جدیدی روی پروپوزال {proposal_number} ثبت شد.");
	update_option("sms_trigger_contract_new_comment_to_customer", "{contact_firstname} {contact_lastname} گرامی\n\nدیدگاه جدیدی روی قرارداد {contract_id} ثبت شد.");
	update_option("sms_trigger_contract_new_comment_to_staff", "مدیر گرامی\n\nدیدگاه جدیدی روی قرارداد {contract_id} ثبت شد.");
	update_option("sms_trigger_contract_expiration_reminder", "{contact_firstname} {contact_lastname} گرامی\n\nقرارداد {contract_id} به زودی منقضی خواهد شد.");
	update_option("sms_trigger_contract_sign_reminder_to_customer", "{contact_firstname} {contact_lastname} گرامی\n\nلطفاً نسبت به امضاء قرارداد {contract_id} اقدام فرمایید.");
	update_option("sms_trigger_staff_reminder", "{staff_firstname} {staff_lastname} گرامی\n\nیادآوری\n\n{staff_reminder_description}");

	update_option('sms_trigger_persian_sms_project_created', "{contact_firstname} {contact_lastname} گرامی\n\nپروژه {project_name} ایجاد شد.");
	update_option('sms_trigger_persian_sms_invoice_created', "{contact_firstname} {contact_lastname} گرامی\n\nفاکتور {invoice_number} به مبلغ {invoice_total} ایجاد شد.");
	update_option('sms_trigger_persian_sms_proposal_created', "کاربر گرامی\n\nپروپوزال {proposal_subject} ایجاد شد.");
	update_option('sms_trigger_persian_sms_estimate_created', "{contact_firstname} {contact_lastname} گرامی\n\nپیش فاکتور {estimate_number} به مبلغ {estimate_total} ایجاد شد.");
	update_option('sms_trigger_persian_sms_contract_created', "{contact_firstname} {contact_lastname} گرامی\n\nقرارداد {contract_subject} ایجاد و در پنل ثبت شد.");
	update_option('sms_trigger_persian_sms_ticket_created', "کاربر گرامی\n\nتیکت جدید با عنوان {ticket_subject} ایجاد شد.");
	update_option('sms_trigger_persian_sms_credit_note_created', "{contact_firstname} {contact_lastname} گرامی\n\nیادداشت اعتباری جدیدی با شناسه {credit_note_number}, به مبلغ {credit_note_total} ایجاد شد.");
	update_option('sms_trigger_persian_sms_lead_created', "{lead_name} گرامی\n\nمشتاقانه آماده همکاری با شما هستیم.");
	update_option('sms_trigger_persian_sms_project_status_changed', "{contact_firstname} {contact_lastname} گرامی\n\nوضعیت پروژه {project_name} به {project_status} تغییر یافت.");
	update_option('sms_trigger_persian_sms_invoice_status_changed', "{contact_firstname} {contact_lastname} گرامی\n\nوضعیت فاکتور {invoice_number} به {invoice_status} تغییر یافت.");
	update_option('sms_trigger_persian_sms_lead_status_changed', "");
	update_option('sms_trigger_persian_sms_ticket_status_changed', "کاربر گرامی\n\nوضعیت تیکت {ticket_subject} به {ticket_status} تغییر یافت.");
	update_option('sms_trigger_persian_sms_proposal_accepted', "کاربر گرامی\n\nپروپوزال {proposal_subject} تایید شد.");
	update_option('sms_trigger_persian_sms_proposal_declined', "کاربر گرامی\n\nپروپوزال {proposal_subject} لغو شد.");
	update_option('sms_trigger_persian_sms_proposal_accepted_to_staff', "مدیر گرامی\n\nپروپوزال {proposal_subject} تایید شد.");
	update_option('sms_trigger_persian_sms_proposal_declined_to_staff', "مدیر گرامی\n\nپروپوزال {proposal_subject} لغو شد.");
	update_option('sms_trigger_persian_sms_estimate_accepted', "{contact_firstname} {contact_lastname} گرامی\n\nپیش فاکتور {estimate_number} تایید شد.");
	update_option('sms_trigger_persian_sms_estimate_declined', "{contact_firstname} {contact_lastname} گرامی\n\nپیش فاکتور {estimate_number} لغو شد.");
	update_option('sms_trigger_persian_sms_estimate_accepted_to_staff', "مدیر گرامی\n\nپیش فاکتور {estimate_number} تایید شد.");
	update_option('sms_trigger_persian_sms_estimate_declined_to_staff', "مدیر گرامی\n\nپیش فاکتور {estimate_number} لغو شد.");
	update_option('sms_trigger_persian_sms_contact_created', "کاربر گرامی\n\nاطلاعات مخاطب جدید :\n\nشماره موبایل : {contact_phonenumber}\n\nآدرس ایمیل : {contact_email}");
}

function persian_sms_get_customer_merge_fields($clientid)
{
	$merge_fields = array();
	$phonenumber 	= '';
	$CI 			= &get_instance();
	$client 		= $CI->clients_model->get($clientid);

	if (!$client)
	{
		return $merge_fields;
	}

	$contact = $CI->clients_model->get_contact(get_primary_contact_user_id($clientid));

	if ($contact)
	{
		if(!is_null($contact->phonenumber) && $contact->phonenumber!=='')
			$phonenumber = $contact->phonenumber;
		elseif(get_option('persian_sms_send_to_alt_client'))
			$phonenumber = $client->phonenumber;	
		$merge_fields['{contact_firstname}'] = $contact->firstname;
		$merge_fields['{contact_lastname}'] = $contact->lastname;
	} elseif(get_option('persian_sms_send_to_alt_client'))
	{
		$phonenumber = $client->phonenumber;
		$merge_fields['{contact_firstname}'] = $client->company;
		$merge_fields['{contact_lastname}'] = '';
	}

	$merge_fields['{client_company}'] 	= $client->company;
	$merge_fields['{client_id}'] 		= $clientid;
	$merge_fields['phone_number'] 		= $phonenumber;

	return $merge_fields;
}