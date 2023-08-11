<?php
defined('BASEPATH') or exit('No direct script access allowed');

/* ticket */
$CI->db->query("UPDATE `". db_prefix() ."emailtemplates` SET
`active` 	= 1,
`fromname` 	= '{companyname}',
`subject` 	= 'شما یک تیکت جدید بررسی نشده دارید',
`message` 	= '<p><span>{contact_firstname} {contact_lastname} گرامی</span><br /><br /><span>تیکت جدیدی از طرف تیم پشتیبانی با مشخصات زیر برای شما ایجاد شده است.</span><br /><br /><span><strong>عنوان :</strong> {ticket_subject}</span><br /><span><strong>دپارتمان :</strong> {ticket_department}</span><br /><span><strong>اولویت :</strong> {ticket_priority}<br /></span><br /><span><strong>محتوای تیکت :</strong></span><br /><span>{ticket_message}</span><br /><br /><span>به منظور بررسی و پاسخ به تیکت <a href=\"{ticket_public_url}\">{ticket_id}</a> کلیک کنید.<br /><br />با تشکر,</span><br /><span>{email_signature}</span></p>'
WHERE `slug` = 'new-ticket-opened-admin' AND `language` = 'persian' LIMIT 1;");

$CI->db->query("UPDATE `". db_prefix() ."emailtemplates` SET
`active` 	= 1,
`fromname` 	= '{companyname}',
`subject` 	= 'به تیکت شما پاسخ داده شد',
`message` 	= '<p><span>{contact_firstname} {contact_lastname} گرامی</span><br /><br />به تیکت <span><a href=\"{ticket_public_url}\">{ticket_id}</a> پاسخ داده شد.</span><br /><br /><span><strong>عنوان تیکت :</strong> {ticket_subject}<br /></span><br /><span><strong>محتوای پیام :</strong></span><br /><span>{ticket_message}</span><br /><br />به منظور بررسی و پاسخ به تیکت <span><a href=\"{ticket_public_url}\">{ticket_id}</a> کلیک کنید</span><br /><br /><span>با تشکر,</span><br /><span>{email_signature}</span></p>'
WHERE `slug` = 'ticket-reply' AND `language` = 'persian' LIMIT 1;");

$CI->db->query("UPDATE `". db_prefix() ."emailtemplates` SET
`active` 	= 1,
`fromname` 	= '{companyname}',
`subject` 	= 'تیکت شما با موفقت ثبت شد',
`message` 	= '<p><span>{contact_firstname} {contact_lastname} گرامی</span><br /><br /><span>تیکت شما با موفقیت در سیستم ثبت شد, در اولین فرصت تیکت شما بررسی و به آن پاسخ خواهیم داد.</span><br /><br /><span><strong>عنوان :</strong> {ticket_subject}</span><br /><span><strong>دپارتمان </strong> {ticket_department}</span><br /><span><strong>اولویت :</strong> {ticket_priority}</span><br /><br /><span><strong>محتوای پیام :</strong></span><br /><span>{ticket_message}</span><br /><br />به منظور بررسی و پاسخ به تیکت <span><a href=\"{ticket_public_url}\">{ticket_id}</a> کلیک کنید.</span><br /><br /><span>با تشکر,</span><br /><span>{email_signature}</span></p>'
WHERE `slug` = 'ticket-autoresponse' AND `language` = 'persian' LIMIT 1;");

$CI->db->query("UPDATE `". db_prefix() ."emailtemplates` SET
`active` 	= 1,
`fromname` 	= '{companyname}',
`subject` 	= 'تیکت جدید توسط ایجاد شد',
`message` 	= '<p><span>تیکت جدیدی با مشخصات زیر ایجاد و در سیستم ثبت شد.</span><br /><br /><span><strong>عنوان </strong>: {ticket_subject}</span><br /><span><strong>دپارتمان </strong>: {ticket_department}</span><br /><span><strong>اولویت </strong>: {ticket_priority}<br /></span><br /><span><strong>محتوای پیام :</strong></span><br /><span>{ticket_message}</span></p>
<p><br />به منظور بررسی و پاسخ به تیکت <span><a href=\"{ticket_url}\">{ticket_id}</a> کلیک کنید.</span></p>
<p><span><br />با تشکر,</span><br /><span>{email_signature}</span></p>'
WHERE `slug` = 'new-ticket-created-staff' AND `language` = 'persian' LIMIT 1;");

$CI->db->query("UPDATE `". db_prefix() ."emailtemplates` SET
`active` 	= 1,
`fromname` 	= '{companyname}',
`subject` 	= 'پاسخ به تیکت توسط مشتری',
`message` 	= '<p><span>به تیکت به مشخصات زیر توسط مشتری {contact_firstname} {contact_lastname} پاسخ داده شد.</span><br /><br /><span><strong>عنوان </strong>: {ticket_subject}</span><br /><span><strong>دپارتمان </strong>: {ticket_department}</span><br /><span><strong>اولویت </strong>: {ticket_priority}</span><br /><br /><span><strong>محتوای پام :</strong></span><br /><span>{ticket_message}</span><br /><br />به منظور بررسی و پاسخ به تیکت <span><a href=\"{ticket_url}\">{ticket_id}</a> کلیک کیند.</span><br /><br /><span>با تشکر,</span><br /><span>{email_signature}</span></p>'
WHERE `slug` = 'ticket-reply-to-admin' AND `language` = 'persian' LIMIT 1;");

$CI->db->query("UPDATE `". db_prefix() ."emailtemplates` SET
`active` 	= 1,
`fromname` 	= '{companyname}',
`subject` 	= 'تیکت به صورت خودکار بسته شد',
`message` 	= '<p><span>{contact_firstname} {contact_lastname} گرامی</span><br /><br /><span>تیکت <a href=\"{ticket_public_url}\">{ticket_id}</a> با مشخصات زیر به صورت خودکار توسط سیستم بسته شد.</span></p>
<p><span><strong>عنوان :</strong> {ticket_subject}</span><br /><span><strong>دپارتمان :</strong> {ticket_department}</span><br /><span><strong>اولویت :</strong> {ticket_priority}</span></p>
<p><span>با تشکر,</span><br /><span>{email_signature}</span></p>'
WHERE `slug` = 'auto-close-ticket' AND `language` = 'persian' LIMIT 1;");

$CI->db->query("UPDATE `". db_prefix() ."emailtemplates` SET
`active` 	= 1,
`fromname` 	= '{companyname}',
`subject` 	= 'یک تیکت به شما تخصیص داده شد',
`message` 	= '<p>مدیر / پشتیبان گرامی,</p>
<p>تیکت جدیدی با مشخصات زیر به شما تخصیص داده شد</p>
<p><span><strong>عنوان :</strong> {ticket_subject}</span><br /><span><strong>دپارتمان :</strong> {ticket_department}</span><br /><span><strong>اولویت :</strong> {ticket_priority}<br /></span><br /><span><strong>محتوای تیکت :</strong></span><br /><span>{ticket_message}</span><br /><br />به منظور بررسی و پاسخ به تیکت <span><a href=\"{ticket_url}\">{ticket_id}</a> کلیک کنید.</span><br /><br /><span>با تشکر,</span><br /><span>{email_signature}</span></p>'
WHERE `slug` = 'ticket-assigned-to-admin' AND `language` = 'persian' LIMIT 1;");
/* ticket */


/* estimate */
$CI->db->query("UPDATE `". db_prefix() ."emailtemplates` SET
`active` 	= 1,
`fromname` 	= '{companyname}',
`subject` 	= 'پیش فاکتور {estimate_number} ایجاد شد',
`message` 	= '<p><span>{contact_firstname} {contact_lastname} گرامی</span><br /><br />پیش فاکتور {estimate_number} ایجاد شد<br /><br /><span><strong>وضعیت :</strong> {estimate_status}</span><br /><br /><span>به منظور بررسی و اطلاعات بیشتر در خصوص پیش فاکتور <a href=\"{estimate_link}\">{estimate_number}</a> کلیک کنید.</span><br /><br /><span>با تشکر,<br />{email_signature}</span></p>'
WHERE `slug` = 'estimate-send-to-client' AND `language` = 'persian' LIMIT 1;");

$CI->db->query("UPDATE `". db_prefix() ."emailtemplates` SET
`active` 	= 1,
`fromname` 	= '{companyname}',
`subject` 	= 'پیش فاکتور {estimate_number}',
`message` 	= '<p><span>{contact_firstname} {contact_lastname} گرامی</span><br /><br /><span>درخواست پیش فاکتور شما با موفقیت ثبت شد.</span><br /><br /><span>به منظور بررسی و اطلاعات بیشتر در خصوص پیش فاکتور <a href=\"{estimate_link}\">{estimate_number}</a> کلیک کنید.</span><br /><br /><span>با تشکر,</span><br /><span>{email_signature}</span></p>'
WHERE `slug` = 'estimate-already-send' AND `language` = 'persian' LIMIT 1;");

$CI->db->query("UPDATE `". db_prefix() ."emailtemplates` SET
`active` 	= 1,
`fromname` 	= '{companyname}',
`subject` 	= 'پیش فاکتور کنسل شد',
`message` 	= '<p><span>مدیر / پشتیبان گرامی</span></p>
<p><span></span></p>
<p><span></span>پیش فاکتور {estimate_number} توسط کاربر <span>({client_company}) لغو شد.</span><br /><br /><span>به منظور بررسی و اطلاعات بیشتر در خصوص پیش فاکتور <a href=\"{estimate_link}\">{estimate_number}</a> کلیک کنید.</span></p>
<p><br /><span>با تشکر,</span><br /><span>{email_signature}</span></p>'
WHERE `slug` = 'estimate-declined-to-staff' AND `language` = 'persian' LIMIT 1;");

$CI->db->query("UPDATE `". db_prefix() ."emailtemplates` SET
`active` 	= 1,
`fromname` 	= '{companyname}',
`subject` 	= 'پیش فاکتور توسط مشتری تایید شد',
`message` 	= '<p><span>مدیر / پشتیبان گرامی</span><br /><br /><span>پیش فاکتور {estimate_number} توسط کاربر ({client_company}) تایید شد.</span><br /><br /><span>به منظور بررسی و اطلاعات بیشتر در خصوص پیش فاکتور <a href=\"{estimate_link}\">{estimate_number}</a> کلیک کنید.</span><br /><br /><span>با تشکر,</span><br /><span>{email_signature}</span></p>'
WHERE `slug` = 'estimate-accepted-to-staff' AND `language` = 'persian' LIMIT 1;");

$CI->db->query("UPDATE `". db_prefix() ."emailtemplates` SET
`active` 	= 1,
`fromname` 	= '{companyname}',
`subject` 	= 'تایید پیش فاکتور',
`message` 	= '<p>{contact_firstname} {contact_lastname} گرامی<br /><br /><span>ضمن تشکر از شما بابت تایید پیش فاکتور.</span></p>
<p>پیش فاکتور مورد نظر در اسرع وقت بررسی و با شما تماس خواهیم گرفت.</p>
<p><br /><span>با تشکر,</span><br /><span>{email_signature}</span></p>'
WHERE `slug` = 'estimate-thank-you-to-customer' AND `language` = 'persian' LIMIT 1;");

$CI->db->query("UPDATE `". db_prefix() ."emailtemplates` SET
`active` 	= 1,
`fromname` 	= '{companyname}',
`subject` 	= 'یاد آوری انقضای پیش فاکتور',
`message` 	= '<p>{contact_firstname} {contact_lastname} گرامی</p>
<p>پیش فاکتور {estimate_number} در تاریخ {estimate_expirydate} منقضی خواهد شد.</p>
<p><span>به منظور بررسی و اطلاعات بیشتر در خصوص پیش فاکتور <a href=\"{estimate_link}\">{estimate_number}</a> کلیک کنید.</span><br /><br /><span>با تشکر,</span><br /><span>{email_signature}</span></p>'
WHERE `slug` = 'estimate-expiry-reminder' AND `language` = 'persian' LIMIT 1;");
/* estimate */

/* contract */
$CI->db->query("UPDATE `". db_prefix() ."emailtemplates` SET
`active` 	= 1,
`fromname` 	= '{companyname}',
`subject` 	= 'یادآوری انقضای قرارداد',
`message` 	= '<p><span>نماینده محترم {client_company}</span><br /><br /><span>قرارداد با مشخصات زیر به زودی منقضی می‌گردد :</span><br /><br /><span><strong>عنوان :</strong> {contract_subject}</span><br /><span><strong>اطلاعات :</strong> {contract_description}</span><br /><span><strong>تاریخ شروع :</strong> {contract_datestart}</span><br /><span><strong>تاریخ پایان :</strong> {contract_dateend}</span><br /><br /><span>به منظور کسب اطلاعات بیشتر با ما تماس بگیرید</span><br /><br /><span>با تشکر,</span><br /><span>{email_signature}</span></p>'
WHERE `slug` = 'contract-expiration' AND `language` = 'persian' LIMIT 1;");

$CI->db->query("UPDATE `". db_prefix() ."emailtemplates` SET
`active` 	= 1,
`fromname` 	= '{companyname}',
`subject` 	= 'قرارداد - {contract_subject}',
`message` 	= '<p><span>{contact_firstname} {contact_lastname} گرامی</span><br /><br /><span>لطفاً قرارداد <a href=\"{contract_link}\">{contract_subject}</a> پیوست شده را دریافت و بررسی کنید.<br /><br />توضیحات : {contract_description}<br /><br /></span>مشتاق همکاری با شما هستیم.<br /><br /><span>با تشکر,</span><br /><span>{email_signature}</span></p>'
WHERE `slug` = 'send-contract' AND `language` = 'persian' LIMIT 1;");

$CI->db->query("UPDATE `". db_prefix() ."emailtemplates` SET
`active` 	= 1,
`fromname` 	= '{companyname}',
`subject` 	= 'اظهار نظر در خصوص قرارداد',
`message` 	= '<p>{contact_firstname} {contact_lastname} گرامی<br /><br />اظهار نظر جدید در خصوص قرارداد : <strong>{contract_subject}</strong><br /><br />بررسی و نمایش اطلاعات بیشتر : <a href=\"{contract_link}\">{contract_subject}</a><br /><br />با تشکر,<br />{email_signature}</p>'
WHERE `slug` = 'contract-comment-to-client' AND `language` = 'persian' LIMIT 1;");

$CI->db->query("UPDATE `". db_prefix() ."emailtemplates` SET
`active` 	= 1,
`fromname` 	= '{companyname}',
`subject` 	= 'اظهار نظر جدید روی قرارداد توسط مشتری ثبت شد',
`message` 	= '<p>{staff_firstname} گرامی<br /><br />اظهار نظر جدید روی قرارداد {contract_subject} توسط مشتری ثبت شد.<br /><br />به منظور بررسی قرارداد <a href=\"{contract_link}\">{contract_subject}</a> کلیک کنید.<br /><br />{email_signature}</p>'
WHERE `slug` = 'contract-comment-to-admin' AND `language` = 'persian' LIMIT 1;");

$CI->db->query("UPDATE `". db_prefix() ."emailtemplates` SET
`active` 	= 1,
`fromname` 	= '{companyname}',
`subject` 	= 'یادآوری انقضای قرارداد مشتری',
`message` 	= '<p>{staff_firstname} گرامی<br /><br /><span>قرارداد با مشخصات زیر به زودی منقضی خواهد شد :</span><br /><br /><span><strong>عنوان :</strong> {contract_subject}</span><br /><span><strong>توضیحات :</strong> {contract_description}</span><br /><span><strong>تاریخ شروع :</strong> {contract_datestart}</span><br /><span><strong>تاریخ پایان :</strong> {contract_dateend}</span><br /><br /><span>با تشکر,</span><br /><span>{email_signature}</span></p>'
WHERE `slug` = 'contract-expiration-to-staff' AND `language` = 'persian' LIMIT 1;");

$CI->db->query("UPDATE `". db_prefix() ."emailtemplates` SET
`active` 	= 1,
`fromname` 	= '{companyname}',
`subject` 	= 'قرارداد توسط مشتری امضاء شد',
`message` 	= '<p>{staff_firstname} گرامی<br /><br />قرارداد {contract_subject} توسط مشتری امضاء شد.<br /><br />بررسی و دسترسی به قرارداد : <a href=\"{contract_link}\">{contract_subject}</a><br /><br />{email_signature}</p>'
WHERE `slug` = 'contract-signed-to-staff' AND `language` = 'persian' LIMIT 1;");

$CI->db->query("UPDATE `". db_prefix() ."emailtemplates` SET
`active` 	= 1,
`fromname` 	= '{companyname}',
`subject` 	= 'یادآوری امضای قرارداد',
`message` 	= '<p>{contact_firstname} {contact_lastname} گرامی<br /><br />یاد آوری امضای قرارداد : <a href=\"{contract_link}\">{contract_subject}</a></p>
<p>مشاهده و امضای قرارداد : <a href=\"{contract_link}\">{contract_subject}</a></p>
<p><br />ما مشتاقانه منتظر همکاری با شما هستیم.<br /><br />با تشکر,<br /><br />{email_signature}</p>'
WHERE `slug` = 'contract-sign-reminder' AND `language` = 'persian' LIMIT 1;");
/* contract */


/* invoice */
$CI->db->query("UPDATE `". db_prefix() ."emailtemplates` SET
`active` 	= 1,
`fromname` 	= '{companyname}',
`subject` 	= 'فاکتور شماره {invoice_number} صادر شد',
`message` 	= '<p><span>{contact_firstname} {contact_lastname} گرامی</span><br /><br />فاکتور شماره {invoice_number} صادر شد.<br /><br /><span><strong>وضعیت فاکتور </strong>: {invoice_status}</span><br /><br /><span>به منظور بررسی جزئیات فاکتور <a href=\"{invoice_link}\">{invoice_number}</a> کلیک کنید. </span><br /><br /><span>جهت دریافت اطلاعات بیشتر وارد پنل کاربری خود شوید.</span><br /><br /><span>با تشکر,</span><br /><span>{email_signature}</span></p>'
WHERE `slug` = 'invoice-send-to-client' AND `language` = 'persian' LIMIT 1;");

$CI->db->query("UPDATE `". db_prefix() ."emailtemplates` SET
`active` 	= 1,
`fromname` 	= '{companyname}',
`subject` 	= 'پرداخت جدیدی روی فاکتور ثبت شد',
`message` 	= '<p><span>{contact_firstname} {contact_lastname} گرامی<br /><br /></span>ضمن تشکر از شما, پرداخت شما روی فاکتور به شرح زیر ثبت شد.<br /><br />-------------------------------------------------<br /><br /><strong>مبلغ :</strong> {payment_total}<br /><strong>تاریخ :</strong> {payment_date}<br /><strong>شناسه فاکتور:</strong><span> {invoice_number}<strong><br /><br /></strong></span>-------------------------------------------------<br /><br /><span>به منظور بررسی جزئیات فاکتور <a href=\"{invoice_link}\">{invoice_number}</a> کلیک کنید. </span><br /><br /><span>جهت دریافت اطلاعات بیشتر وارد پنل کاربری خود شوید.</span><br /><br /><span>با تشکر,</span><br /><span>{email_signature}</span></p>'
WHERE `slug` = 'invoice-payment-recorded' AND `language` = 'persian' LIMIT 1;");

$CI->db->query("UPDATE `". db_prefix() ."emailtemplates` SET
`active` 	= 1,
`fromname` 	= '{companyname}',
`subject` 	= 'اطلاعیه سررسید پرداخت فاکتور {invoice_number}',
`message` 	= '<p><span>{contact_firstname} {contact_lastname} گرامی</span><br /><br />کاربر گرامی, این ایمیل به منظور یاد آوری موعد پرداخت فاکتور {invoice_number} برای شما ارسال شده است, به منظور بررسی بیشتر و پرداخت فاکتور وارد پنل خود شوید.<br /><br /><span><strong>تاریخ سررسید :</strong> {invoice_duedate}</span><br /><br /><span>به منظور بررسی جزئیات فاکتور <a href=\"{invoice_link}\">{invoice_number}</a> کلیک کنید. </span><br /><br /><span>جهت دریافت اطلاعات بیشتر وارد پنل کاربری خود شوید.</span><br /><br /><span>با تشکر,</span><br /><span>{email_signature}</span></p>'
WHERE `slug` = 'invoice-overdue-notice' AND `language` = 'persian' LIMIT 1;");

$CI->db->query("UPDATE `". db_prefix() ."emailtemplates` SET
`active` 	= 1,
`fromname` 	= '{companyname}',
`subject` 	= 'Invoice # {invoice_number} ',
`message` 	= '<p><span>{contact_firstname} {contact_lastname} گرامی</span><br /><br />فاکتور {invoice_number} به درخواست شما ایجاد شده است.<br /><br /><span>به منظور بررسی جزئیات فاکتور <a href=\"{invoice_link}\">{invoice_number}</a> کلیک کنید. </span><br /><br /><span>جهت دریافت اطلاعات بیشتر وارد پنل کاربری خود شوید.</span><br /><br /><span>با تشکر,</span><br /><span>{email_signature}</span></p>'
WHERE `slug` = 'invoice-already-send' AND `language` = 'persian' LIMIT 1;");

$CI->db->query("UPDATE `". db_prefix() ."emailtemplates` SET
`active` 	= 1,
`fromname` 	= '{companyname}',
`subject` 	= 'پرداخت جدیدی روی فاکتور ثبت شد',
`message` 	= '<p><span>مدیر / پشتیبان گرامی</span><br /><br />پرداخت جدیدی توسط مشتری روی فاکتور {invoice_number} ثبت شد.<br /><br /><span>به منظور بررسی جزئیات فاکتور <a href=\"{invoice_link}\">{invoice_number}</a> کلیک کنید. </span><br /><br /><span>با تشکر,</span><br /><span>{email_signature}</span></p>'
WHERE `slug` = 'invoice-payment-recorded-to-staff' AND `language` = 'persian' LIMIT 1;");

$CI->db->query("UPDATE `". db_prefix() ."emailtemplates` SET
`active` 	= 1,
`fromname` 	= '{companyname}',
`subject` 	= 'موعد پرداخت فاکتور {invoice_number} نزدیک است',
`message` 	= '<p><span>{contact_firstname} {contact_lastname} گرامی<br /><br /></span><span>سررسید پرداخت فاکتور <strong>{invoice_number} </strong>در تاریخ <strong>{invoice_duedate} </strong>می‌باشد.</span><br /><br /><span>به منظور بررسی جزئیات فاکتور <a href=\"{invoice_link}\">{invoice_number}</a> کلیک کنید. </span><br /><br /><span>جهت دریافت اطلاعات بیشتر وارد پنل کاربری خود شوید.</span><br /><br /><span>با تشکر,</span><br /><span>{email_signature}</span></p>'
WHERE `slug` = 'invoice-due-notice' AND `language` = 'persian' LIMIT 1;");

$CI->db->query("UPDATE `". db_prefix() ."emailtemplates` SET
`active` 	= 1,
`fromname` 	= '{companyname}',
`subject` 	= 'پرداخت‌های شما دریافت و ثبت شد',
`message` 	= '<p><span>{contact_firstname} {contact_lastname} گرامی</span><br /><br />بابت پرداختی‌های انجام شده از شما سپاس گذاریم, شرح پرداختی‌های شما به شرح زیر می‌باشد.<br /><br />{batch_payments_list}<br /><br />جهت بررسی و نمایش اطلاعات بیشتر وارد پنل خود شوید.<br /><br /><span>با تشکر,</span><br /><span>{email_signature}</span></p>'
WHERE `slug` = 'invoices-batch-payments' AND `language` = 'persian' LIMIT 1;");
/* invoice */


/* subscription */
$CI->db->query("UPDATE `". db_prefix() ."emailtemplates` SET
`active` 	= 1,
`fromname` 	= '{companyname}',
`subject` 	= 'اشتراک ایجاد شد',
`message` 	= '<p>{contact_firstname} {contact_lastname} گرامی<br /><br />اشتراک {subscription_name} ایجاد شد.<br /><br />به منظور بررسی بیشتر <a href=\"{subscription_link}\">کلیک کنید</a>.<br /><br />با تشکر,<br />{email_signature}</p>'
WHERE `slug` = 'send-subscription' AND `language` = 'persian' LIMIT 1;");

$CI->db->query("UPDATE `". db_prefix() ."emailtemplates` SET
`active` 	= 1,
`fromname` 	= '{companyname}',
`subject` 	= 'آخرین پرداخت فاکتور شما انجام نشد',
`message` 	= '<p>{contact_firstname} {contact_lastname} گرامی<br /><br /></p>
<p>متأسفانه، آخرین پرداخت فاکتور شما برای {subscription_name} رد شد.</p>
<p>این مشکل میتواند به دلیل بروز یک خطای بانکی رخ داده باشد.</p>
<p><br />با تشکر,<br />{email_signature}</p>'
WHERE `slug` = 'subscription-payment-failed' AND `language` = 'persian' LIMIT 1;");

$CI->db->query("UPDATE `". db_prefix() ."emailtemplates` SET
`active` 	= 1,
`fromname` 	= '{companyname}',
`subject` 	= 'اشتراک شما لغو شده است',
`message` 	= '<p>{contact_firstname} {contact_lastname} گرامی<br /><br />اشتراک {subscription_name} لغو شد.</p>
<p><br />با تشکر,<br />{email_signature}</p>'
WHERE `slug` = 'subscription-canceled' AND `language` = 'persian' LIMIT 1;");

$CI->db->query("UPDATE `". db_prefix() ."emailtemplates` SET
`active` 	= 1,
`fromname` 	= '{companyname}',
`subject` 	= 'رسید پرداخت حق اشتراک - {subscription_name}',
`message` 	= '<p>{contact_firstname} {contact_lastname} گرامی<br /><br /></p>
<p>پرداخت حق اشتراک {subscription_name} به مبلغ {payment_total} تایید و ثبت شد.</p>
<p><strong></strong></p>
<p>وضعیت فاکتور به {invoice_status} تغییر یافت.</p>
<p><strong></strong></p>
<p><strong></strong>با تشکر,<br />{email_signature}</p>'
WHERE `slug` = 'subscription-payment-succeeded' AND `language` = 'persian' LIMIT 1;");

$CI->db->query("UPDATE `". db_prefix() ."emailtemplates` SET
`active` 	= 1,
`fromname` 	= '{companyname}',
`subject` 	= 'ثبت اشتراک مشتری',
`message` 	= '<p>مشتری {client_company}</p>
<p></p>
<p>مشتری {client_company} در اشتراکی با نام {subscription_name} مشترک شد.</p>
<p><br /><br /><strong>شناسه </strong>: {subscription_id}<br /><strong>عنوان </strong>: {subscription_name}<br /><strong>توضیحات </strong>: {subscription_description}<br /><br />به منظور دریافت اطلاعات بیشتر <a href=\"{subscription_link}\">کلیک کنید</a>.</p>
<p>با تشکر,<br />{email_signature}</p>'
WHERE `slug` = 'customer-subscribed-to-staff' AND `language` = 'persian' LIMIT 1;");

$CI->db->query("UPDATE `". db_prefix() ."emailtemplates` SET
`active` 	= 1,
`fromname` 	= '{companyname}',
`subject` 	= 'مهم: پرداخت {subscription_name} اشتراک خود را تأیید کنید',
`message` 	= '<p>{contact_firstname} گرامی</p>
<p><strong>لازم است پرداخت حق اشتراک خود را تایید کنید.</strong><br /><br />به دلیل مقررات اروپایی برای محافظت از مصرف کنندگان، بسیاری از پرداخت های آنلاین اکنون نیاز به احراز هویت دو مرحله ای دارند. بانک شما در نهایت تصمیم می‌گیرد که چه زمانی برای تأیید پرداخت نیاز به احراز هویت است، اما ممکن است وقتی شروع به پرداخت برای یک سرویس می‌کنید یا زمانی که هزینه تغییر می‌کند، متوجه این مرحله شوید.</p>
<p><br />به منظور تایید پرداخت حق اشتراک <strong>{subscription_name} </strong>روی لینک زیر کلیک کنید : <strong><a href=\"{subscription_authorize_payment_link}\">{subscription_authorize_payment_link}</a></strong><br /><br /><br />با تشکر,<br />{email_signature}</p>'
WHERE `slug` = 'subscription-payment-requires-action' AND `language` = 'persian' LIMIT 1;");
/* subscription */


/* credit */
$CI->db->query("UPDATE `". db_prefix() ."emailtemplates` SET
`active` 	= 1,
`fromname` 	= '{companyname}',
`subject` 	= 'یادداشت اعتباری {credit_note_number} ایجاد شد',
`message` 	= '<p>{contact_firstname} {contact_lastname} گرامی<br /><br />سند اعتباری <strong>{credit_note_number}</strong> پیوست شد.<br /><br /><strong>تاریخ :</strong> {credit_note_date}<br /><strong>مبلغ :</strong> {credit_note_total}<br /><br /><span>با تشکر,</span><br /><span>{email_signature}</span></p>'
WHERE `slug` = 'credit-note-send-to-client' AND `language` = 'persian' LIMIT 1;");
/* credit */


/* task */
/* task */


/* contact */
/* contact */


/* proposal */
/* proposal */


/* project */
/* project */


/* staff */
/* staff */


/* lead */
/* lead */


/* estimate-request */
/* estimate-request */


/* reminder */
/* reminder */