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
$CI->db->query("UPDATE `". db_prefix() ."emailtemplates` SET
`active` 	= 1,
`fromname` 	= '{companyname}',
`subject` 	= 'وظیفه جدیدی به شما واگذار شد - {task_name}',
`message` 	= '<p><span>{staff_firstname} گرامی</span><br /><br /><span>یک وظیفه با مشخصات زیر به شما واگذار شد :</span><br /><br /><span><strong>عنوان :</strong> {task_name}<br /></span><strong>زمان شروع :</strong> {task_startdate}<br /><span><strong>زمان پایان :</strong> {task_duedate}</span><br /><span><strong>اولویت :</strong> {task_priority}<br /><br /></span><span>اطلاعات بیشتر : <a href=\"{task_link}\">{task_name}</a> </span><br /><br /><span>با تشکر,</span><br /><span>{email_signature}</span></p>'
WHERE `slug` = 'task-assigned' AND `language` = 'persian' LIMIT 1;");

$CI->db->query("UPDATE `". db_prefix() ."emailtemplates` SET
`active` 	= 1,
`fromname` 	= '{companyname}',
`subject` 	= 'شما به عنوان دنبال کننده به وظیفه افزوده شده‌اید / {task_name}',
`message` 	= '<p><span>{staff_firstname} گرامی</span></p>
<p><br /><span>شما به عنوان دنبال کننده به وظیفه با مشخصات زیر افزوده شده اید :</span><br /><br /><span><strong>عنوان :</strong> {task_name}</span><br /><span><strong>زمان سررسید :</strong> {task_startdate}</span><br /><br />اطلاعات بیشتر : <a href=\"{task_link}\">{task_name}</a><br /><br /><span>با تشکر,</span><br /><span>{email_signature}</span></p>'
WHERE `slug` = 'task-added-as-follower' AND `language` = 'persian' LIMIT 1;");

$CI->db->query("UPDATE `". db_prefix() ."emailtemplates` SET
`active` 	= 1,
`fromname` 	= '{companyname}',
`subject` 	= 'یک دیدگاه جدید در وظیفه - {task_name}',
`message` 	= '<p>{staff_firstname} گرامی<br /><br />دیدگاه جدیدی روی وظیفه با مشخصات زیر درج شد :<br /><br /><strong>عنوان :</strong> {task_name}<br /><strong>دیدگاه :</strong> {task_comment}<br /><br />اطلاعات بیشتر : <a href=\"{task_link}\">{task_name}</a><br /><br />با تشکر,<br />{email_signature}</p>'
WHERE `slug` = 'task-commented' AND `language` = 'persian' LIMIT 1;");

$CI->db->query("UPDATE `". db_prefix() ."emailtemplates` SET
`active` 	= 1,
`fromname` 	= '{companyname}',
`subject` 	= 'پیوست جدید روی وظیفه - {task_name}',
`message` 	= '<p>{staff_firstname} گرامی<br /><br /><strong>{task_user_take_action}</strong> پیوست جدیدی به وظیفه افزود :<br /><br /><strong>عنوان :</strong> {task_name}<br /><br />اطلاعات بیشتر : <a href=\"{task_link}\">{task_name}</a><br /><br />با تشکر,<br />{email_signature}</p>'
WHERE `slug` = 'task-added-attachment' AND `language` = 'persian' LIMIT 1;");

$CI->db->query("UPDATE `". db_prefix() ."emailtemplates` SET
`active` 	= 1,
`fromname` 	= '{companyname}',
`subject` 	= 'یادآوری مهلت انجام وظیفه',
`message` 	= '<p>{staff_firstname} {staff_lastname} گرامی<br /><br />این یک ایمیل خودکار از {companyname} است.<br /><br />مهلت انجام وظیفه {task_name} در تاریخ {task_duedate} به پایان خواهد رسید.<br />این کار هنوز تمام نشده است.<br /><br />اطلاعات بیشتر : <a href=\"{task_link}\">{task_name}</a><br /><br />با تشکر,<br />{email_signature}</p>'
WHERE `slug` = 'task-deadline-notification' AND `language` = 'persian' LIMIT 1;");

$CI->db->query("UPDATE `". db_prefix() ."emailtemplates` SET
`active` 	= 1,
`fromname` 	= '{companyname}',
`subject` 	= 'پیوست جدیدی روی وظیفه افزوده شد -  {task_name}',
`message` 	= '<p><span>{contact_firstname} {contact_lastname} گرامی</span><br /><br />{task_user_take_action} پیوستی را به وظیفه زیر افزود :<br /><br /><strong>عنوان :</strong><span> {task_name}</span><br /><br /><span>اطلاعات بیشتر : <a href=\"{task_link}\">{task_name}</a></span><br /><br /><span>با تشکر,</span><br /><span>{email_signature}</span></p>'
WHERE `slug` = 'task-added-attachment-to-contacts' AND `language` = 'persian' LIMIT 1;");

$CI->db->query("UPDATE `". db_prefix() ."emailtemplates` SET
`active` 	= 1,
`fromname` 	= '{companyname}',
`subject` 	= 'ثبت دیدگاه جدید روی وظیفه - {task_name}',
`message` 	= '<p><span>{contact_firstname} {contact_lastname} گرامی</span><br /><br /><span>یک دیدگاه جدید روی وظیفه با مشخصات زیر افزوده شد :</span><br /><br /><strong>عنوان :</strong><span> {task_name}</span><br /><strong>دیدگاه :</strong><span> {task_comment}</span><br /><br /><span>اطلاعات بیشتر : <a href=\"{task_link}\">{task_name}</a></span><br /><br /><span>با تشکر,</span><br /><span>{email_signature}</span></p>'
WHERE `slug` = 'task-commented-to-contacts' AND `language` = 'persian' LIMIT 1;");

$CI->db->query("UPDATE `". db_prefix() ."emailtemplates` SET
`active` 	= 1,
`fromname` 	= '{companyname}',
`subject` 	= 'وضعیت وظیفه تغییر یافت',
`message` 	= '<p><span>{staff_firstname} گرامی</span><br /><br /><span><strong>{task_user_take_action}</strong> وضعیت <strong>{task_status}</strong></span><br /><br /><span><strong>عنوان :</strong> {task_name}</span><br /><span><strong>تاریخ سررسید :</strong> {task_duedate}</span><br /><br /><span>اطلاعات بیشتر : <a href=\"{task_link}\">{task_name}</a></span><br /><br /><span>با تشکر,</span><br /><span>{email_signature}</span></p>'
WHERE `slug` = 'task-status-change-to-staff' AND `language` = 'persian' LIMIT 1;");

$CI->db->query("UPDATE `". db_prefix() ."emailtemplates` SET
`active` 	= 1,
`fromname` 	= '{companyname}',
`subject` 	= 'وضعیت وظیفه تغییر کرد',
`message` 	= '<p><span>{contact_firstname} {contact_lastname} گرامی</span><br /><br /><span><strong>{task_user_take_action}</strong> وضعیت <strong>{task_status}</strong></span><br /><br /><span><strong>عنوان :</strong> {task_name}</span><br /><span><strong>سررسید :</strong> {task_duedate}</span><br /><br /><span>نمایش اطلاعات بیشتر در خصوص وظیفه <a href=\"{task_link}\">{task_name}</a></span><br /><br /><span>با تشکر,</span><br /><span>{email_signature}</span></p>'
WHERE `slug` = 'task-status-change-to-contacts' AND `language` = 'persian' LIMIT 1;");
/* task */


/* client */
$CI->db->query("UPDATE `". db_prefix() ."emailtemplates` SET
`active` 	= 1,
`fromname` 	= '{companyname}',
`subject` 	= 'خوش آمدید',
`message` 	= '<p>{contact_firstname} {contact_lastname} گرامی<br /><br />عضویت و ثبت اطلاعات شما در <strong>{companyname}</strong> با موفقیت انجام شد.<br /><br />در صورتی که نیاز به پشتیبانی, مشاوره یا استفاده از خدمات ما را دارید, کافیست وارد <a href=\"{crm_url}\">پنل کاربری</a> خود شده و تیکت ارسال کنید.<br /><br />با تشکر, <br />{email_signature}<br /><br /><span style=\"color: #808080;\">( این ایمیل به صورت خودکار برای شما ارسال شده است, از پاسخ دادن به این ایمیل خودداری فرمایید )</span></p>'
WHERE `slug` = 'new-client-created' AND `language` = 'persian' LIMIT 1;");

$CI->db->query("UPDATE `". db_prefix() ."emailtemplates` SET
`active` 	= 1,
`fromname` 	= '{companyname}',
`subject` 	= 'بازیابی کلمه عبور',
`message` 	= '<p><strong>بازیابی کلمه عبور</strong></p><p></p><p>کلمه عبور خود را فراموش کرده‌اید ؟<br />به منظور بازیابی کلمه عبور <a href=\"{reset_password_url}\">اینجا کلیک کنید</a>.<br /><br /><br /><br />این ایمیل به درخواست شما از سامانه {companyname} به منظور بازیابی و تغییر کلمه عبور شما ارسال شده است, در صورتی که این درخواست توسط شما صورت نگرفته است از کلیک روی لینک مربوطه خودداری نموده و این ایمیل را نادیده بگیرید.<br /><br />{email_signature}</p>'
WHERE `slug` = 'contact-forgot-password' AND `language` = 'persian' LIMIT 1;");

$CI->db->query("UPDATE `". db_prefix() ."emailtemplates` SET
`active` 	= 1,
`fromname` 	= '{companyname}',
`subject` 	= 'کلمه عبور شما تغییر یافت',
`message` 	= '<p>کلمه عبور شما تغییر یافت</p><p></p><p>کلمه عبور اکانت شما ( {contact_email} ) تغییر یافت.</p><p></p><p>{email_signature}</p>'
WHERE `slug` = 'contact-password-reseted' AND `language` = 'persian' LIMIT 1;");

$CI->db->query("UPDATE `". db_prefix() ."emailtemplates` SET
`active` 	= 1,
`fromname` 	= '{companyname}',
`subject` 	= 'تغییر کلمه عبور',
`message` 	= '<p><strong>تغییر کلمه عبور در سامانه {companyname}</strong></p><p></p><p>به منظور تغییر کلمه عبور <a href=\"{set_password_url}\">اینجا کلیک کنید</a>.<br /><br /><br />توجه داشته باشید لینک ارسال شده تنها تا 48 ساعت آینده معتبر بوده و پس از آن قابل استفاده نخواهد بود.<br /><br />آدرس ورود به سامانه : <a href=\"{crm_url}\">{crm_url}</a><br />آدرس ایمیل شما جهت ورود به سامانه : {contact_email}<br /><br />{email_signature}</p>'
WHERE `slug` = 'contact-set-password' AND `language` = 'persian' LIMIT 1;");

$CI->db->query("UPDATE `". db_prefix() ."emailtemplates` SET
`active` 	= 1,
`fromname` 	= '{companyname}',
`subject` 	= 'صورت حساب {statement_from} تا {statement_to}',
`message` 	= '<p>{contact_firstname} {contact_lastname} گرامی<br /><br />شرح صورت حساب {statement_from} تا {statement_to} پیوست شده است.<br /><br />مجموع صورت حساب شما : {statement_balance_due}<br /><br />در صورت نیاز به اطلاعات بیشتر با ما در تماس باشید.<br /><br />با تشکر,<br />{email_signature}</p>'
WHERE `slug` = 'client-statement' AND `language` = 'persian' LIMIT 1;");

$CI->db->query("UPDATE `". db_prefix() ."emailtemplates` SET
`active` 	= 1,
`fromname` 	= '{companyname}',
`subject` 	= 'یک کاربر جدید در سامانه ثبت شد',
`message` 	= '<p>مدیر گرامی<br /><br />یک کاربر جدید با مشخصات زیر در سامانه ثبت شد :<br /><br /><strong>نام :</strong> {contact_firstname}<br /><strong>نام خانوادگی :</strong> {contact_lastname}<br /><strong>نام شرکت :</strong> {client_company}<br /><strong>آدرس ایمیل :</strong> {contact_email}</p>'
WHERE `slug` = 'new-client-registered-to-admin' AND `language` = 'persian' LIMIT 1;");

$CI->db->query("UPDATE `". db_prefix() ."emailtemplates` SET
`active` 	= 1,
`fromname` 	= '{companyname}',
`subject` 	= 'تایید آدرس ایمیل',
`message` 	= '<p>{contact_firstname} {contact_lastname} گرامی<br /><br />به منظور تایید آدرس ایمیل و فعال سازی حساب کاربری روی لینک زیر کلیک کنید.<br /><br /><a href=\"{email_verification_url}\">تایید آدرس ایمیل و فعال سازی حساب کاربری</a><br /><br /><span style=\"color: #808080;\">در صورتی که ثبت نام توسط شما انجام نشده است این ایمیل را نادیده بگیرید.</span></p><p><br />{email_signature}</p>'
WHERE `slug` = 'contact-verification-email' AND `language` = 'persian' LIMIT 1;");

$CI->db->query("UPDATE `". db_prefix() ."emailtemplates` SET
`active` 	= 1,
`fromname` 	= '{companyname}',
`subject` 	= 'آپلود فایل جدید روی پروفایل توسط مشتری',
`message` 	= '<p>مدیر گرامی<br /><br /></p><p>فایل جدیدی توسط کاربر {contact_firstname} {contact_lastname} روی پروفایل {client_company} آپلود شد.</p><p><br /><a href=\"{customer_profile_files_admin_link}\">به منظور بررسی فایل آپلود شده کلیک کنید.</a></p><p><br /><br />{email_signature}</p>'
WHERE `slug` = 'new-customer-profile-file-uploaded-to-staff' AND `language` = 'persian' LIMIT 1;");

$CI->db->query("UPDATE `". db_prefix() ."emailtemplates` SET
`active` 	= 1,
`fromname` 	= '{companyname}',
`subject` 	= 'حساب کاربری شما فعال شد',
`message` 	= '<p>مدیر گرامی<br /><br />ضمن تشکر, حساب کاربری شما با موفقیت فعال شد.<br /><br />{email_signature}</p>'
WHERE `slug` = 'client-registration-confirmed' AND `language` = 'persian' LIMIT 1;");
/* client */


/* proposal */
$CI->db->query("UPDATE `". db_prefix() ."emailtemplates` SET
`active` 	= 1,
`fromname` 	= '{companyname}',
`subject` 	= 'پذیرش پروپوزال توسط مشتری',
`message` 	= '<div>مدیر گرامی<br /><br />کاربر {proposal_proposal_to} پروپوزال با مشخصات زیر را پذیرفت :<br /><br /><strong>شماره :</strong> {proposal_number}<br /><strong>عنوان </strong>: {proposal_subject}<br /><b>مجموع </b>: {proposal_total}<br /><br />نمایش اطلاعات بیشتر : <a href=\"{proposal_link}\">{proposal_number}</a><br /><br />با تشکر,<br />{email_signature}</div>'
WHERE `slug` = 'proposal-client-accepted' AND `language` = 'persian' LIMIT 1;");

$CI->db->query("UPDATE `". db_prefix() ."emailtemplates` SET
`active` 	= 1,
`fromname` 	= '{companyname}',
`subject` 	= 'پروپوزال {proposal_number} ایجاد شد',
`message` 	= '<p>{proposal_proposal_to} گرامی<br /><br />پروپوزال پیوست شده را بررسی کنید.<br /><br />اعتبار پروپوزال : {proposal_open_till}<br />بررسی و نمایش اطلاعات بیشتر : <a href=\"{proposal_link}\">{proposal_number}</a><br /><br />در صورتی که سوالی دارید با ما در ارتباط باشید.<br /><br />مشتاق تماس شما هستیم ...<br /><br />با تشکر,<br />{email_signature}</p>'
WHERE `slug` = 'proposal-send-to-customer' AND `language` = 'persian' LIMIT 1;");

$CI->db->query("UPDATE `". db_prefix() ."emailtemplates` SET
`active` 	= 1,
`fromname` 	= '{companyname}',
`subject` 	= 'پروپوزال توسط مشتری رد شد',
`message` 	= '<p>مدیر گرامی<br /><br />پروپوزال {proposal_subject} توسط {proposal_proposal_to} رد شد.<br /><br />به منظور بررسی پروپوزال <a href=\"{proposal_link}\">کلیک کنید</a>.<br /><br />با تشکر,<br />{email_signature}</p>'
WHERE `slug` = 'proposal-client-declined' AND `language` = 'persian' LIMIT 1;");

$CI->db->query("UPDATE `". db_prefix() ."emailtemplates` SET
`active` 	= 1,
`fromname` 	= '{companyname}',
`subject` 	= 'بابت تایید پروپوزال از شما سپاس گذاریم',
`message` 	= '<p>{proposal_proposal_to} گرامی<br /><br />از اینکه پروپوزال را بررسی و تایید کرده‌اید سپاس گذاریم.<br /><br />ما مشتاقانه آماده همکاری با شما هستیم.<br /><br />با تشکر,<br />{email_signature}</p>'
WHERE `slug` = 'proposal-client-thank-you' AND `language` = 'persian' LIMIT 1;");

$CI->db->query("UPDATE `". db_prefix() ."emailtemplates` SET
`active` 	= 1,
`fromname` 	= '{companyname}',
`subject` 	= 'دیدگاه جدید رو پروپوزال',
`message` 	= '<p>{proposal_proposal_to} گرامی<br /><br />دیدگاه جدیدی روی پروپوزال {proposal_number} ثبت شد.<br /><br />بررسی و نمایش اطلاعات بیشتر : <a href=\"{proposal_link}\">{proposal_number}</a><br /><br />با تشکر,<br />{email_signature}</p>'
WHERE `slug` = 'proposal-comment-to-client' AND `language` = 'persian' LIMIT 1;");

$CI->db->query("UPDATE `". db_prefix() ."emailtemplates` SET
`active` 	= 1,
`fromname` 	= '{companyname}',
`subject` 	= 'ثبت دیدگاه جدید رو پروپوزال',
`message` 	= '<p>مدیر گرامی<br /><br />دیدگاه جدیدی روی پروپوزال {proposal_subject} ثبت شد.<br /><br /><a href=\"{proposal_link}\">بررسی و نمایش اطلاعات بیشتر</a><br /><br />{email_signature}</p>'
WHERE `slug` = 'proposal-comment-to-admin' AND `language` = 'persian' LIMIT 1;");

$CI->db->query("UPDATE `". db_prefix() ."emailtemplates` SET
`active` 	= 1,
`fromname` 	= '{companyname}',
`subject` 	= 'یادآوری انقضاء پروپوزال',
`message` 	= '<p>{proposal_proposal_to} گرامی<br /><br />پروپوزال {proposal_number} در {proposal_open_till} منقضی و فاقد اعتبار خواهد شد.<br /><br />بررسی و نمایش اطلاعات بیشتر : <a href=\"{proposal_link}\">{proposal_number}</a><br /><br />با تشکر,<br />{email_signature}</p>'
WHERE `slug` = 'proposal-expiry-reminder' AND `language` = 'persian' LIMIT 1;");

/* proposal */


/* project */
$CI->db->query("UPDATE `". db_prefix() ."emailtemplates` SET
`active` 	= 1,
`fromname` 	= '{companyname}',
`subject` 	= 'گفتگوی جدید روی پروژه {project_name}',
`message` 	= '<p>{staff_firstname} گرامی<br /><br />گفتگوی جدید با مشخصات زیر روی پروژه توسط <strong>{discussion_creator}</strong> ایجاد شد.<br /><br /><strong>عنوان :</strong> {discussion_subject}<br /><strong>توضیحات :</strong> {discussion_description}<br /><br />بررسی و نمایش اطلاعات بیشتر : <a href=\"{discussion_link}\">{discussion_subject}</a><br /><br />با تشکر,<br />{email_signature}</p>'
WHERE `slug` = 'new-project-discussion-created-to-staff' AND `language` = 'persian' LIMIT 1;");

$CI->db->query("UPDATE `". db_prefix() ."emailtemplates` SET
`active` 	= 1,
`fromname` 	= '{companyname}',
`subject` 	= 'گفتگوی جدید روی پروژه {project_name}',
`message` 	= '<p>{contact_firstname} {contact_lastname} گرامی<br /><br />گفتگوی جدیدی با مشخصات زیر رو پروژه توسط <strong>{discussion_creator}</strong> ایجاد شد.<br /><br /><strong>عنوان :</strong> {discussion_subject}<br /><strong>توضیحات :</strong> {discussion_description}<br /><br />نمایش و بررسی اطلاعات بیشتر : <a href=\"{discussion_link}\">{discussion_subject}</a><br /><br />با تشکر,<br />{email_signature}</p>'
WHERE `slug` = 'new-project-discussion-created-to-customer' AND `language` = 'persian' LIMIT 1;");

$CI->db->query("UPDATE `". db_prefix() ."emailtemplates` SET
`active` 	= 1,
`fromname` 	= '{companyname}',
`subject` 	= 'پیوست فایل جدید رو پروژه {project_name}',
`message` 	= '<p>{contact_firstname} {contact_lastname} گرامی<br /><br />پیوست جدیدی به پروژه {project_name} توسط {file_creator} افزوده شد.<br /><br />بررسی و نمایش اطلاعات بیشتر : <a href=\"{project_link}\">{project_name}</a><br /><br />دسترسی به پیوست از طریق سامانه : <a href=\"{discussion_link}\">{discussion_subject}</a><br /><br />با تشکر,<br />{email_signature}</p>'
WHERE `slug` = 'new-project-file-uploaded-to-customer' AND `language` = 'persian' LIMIT 1;");

$CI->db->query("UPDATE `". db_prefix() ."emailtemplates` SET
`active` 	= 1,
`fromname` 	= '{companyname}',
`subject` 	= 'پیوست فایل جدید رو پروژه {project_name}',
`message` 	= '<p>{staff_firstname} گرامی</p><p>پیوست جدیدی به پروژه {project_name} توسط {file_creator} افزوده شد.</p><p>بررسی و نمایش اطلاعات بیشتر : <a href=\"{project_link}\">{project_name}<br /></a><br />دسترسی به پیوست از طریق سامانه : <a href=\"{discussion_link}\">{discussion_subject}</a></p><p>با تشکر,<br />{email_signature}</p>'
WHERE `slug` = 'new-project-file-uploaded-to-staff' AND `language` = 'persian' LIMIT 1;");

$CI->db->query("UPDATE `". db_prefix() ."emailtemplates` SET
`active` 	= 1,
`fromname` 	= '{companyname}',
`subject` 	= 'ثبت دیدگاه جدید روی گفتگوی پروژه',
`message` 	= '<p><span>{contact_firstname} {contact_lastname} گرامی</span><br /><br /><span>دیدگاه جدیدی روی گفتگوی <strong>{discussion_subject}</strong> توسط <strong>{comment_creator}</strong> ثبت شد.</span><br /><br /><span><strong>عنوان گفتگو :</strong> {discussion_subject}</span><br /><span><strong>دیدگاه </strong>: {discussion_comment}</span><br /><br /><span>بررسی و نمایش اطلاعات بیشتر : <a href=\"{discussion_link}\">{discussion_subject}</a></span><br /><br /><span>با تشکر,</span><br /><span>{email_signature}</span></p>'
WHERE `slug` = 'new-project-discussion-comment-to-customer' AND `language` = 'persian' LIMIT 1;");

$CI->db->query("UPDATE `". db_prefix() ."emailtemplates` SET
`active` 	= 1,
`fromname` 	= '{companyname}',
`subject` 	= 'ثبت دیدگاه جدید روی گفتگوی پروژه ',
`message` 	= '<p>{staff_firstname} گرامی<br /><br /><span>دیدگاه جدیدی روی گفتگوی <strong>{discussion_subject}</strong> توسط <strong>{comment_creator}</strong> ثبت شد.</span><br /><br /><strong>عنوان گفتگو :</strong> {discussion_subject}<br /><strong>دیدگاه :</strong> {discussion_comment}<br /><br /><span>بررسی و نمایش اطلاعات بیشتر </span>: <a href=\"{discussion_link}\">{discussion_subject}</a><br /><br /><span>با تشکر</span>,<br />{email_signature}</p>'
WHERE `slug` = 'new-project-discussion-comment-to-staff' AND `language` = 'persian' LIMIT 1;");

$CI->db->query("UPDATE `". db_prefix() ."emailtemplates` SET
`active` 	= 1,
`fromname` 	= '{companyname}',
`subject` 	= 'یک پروژه جدید به شما محول شده است',
`message` 	= '<p>{staff_firstname} گرامی<br /><br />یک پروژه جدید به شما محول شده است.<br /><br />بررسی و نمایش اطلاعات بیشتر پروژه : <a href=\"{project_link}\">{project_name}</a><br /><br />{email_signature}</p>'
WHERE `slug` = 'staff-added-as-project-member' AND `language` = 'persian' LIMIT 1;");

$CI->db->query("UPDATE `". db_prefix() ."emailtemplates` SET
`active` 	= 1,
`fromname` 	= '{companyname}',
`subject` 	= 'پروژه جدید ایجاد شد',
`message` 	= '<p>{contact_firstname} {contact_lastname} گرامی</p><p>یک پروژه با مشخصات زیر ایجاد شد :<br /><br /><strong>عنوان :</strong> {project_name}<br /><strong>تاریخ شروع پروژه :</strong> {project_start_date}</p><p>بررسی و نمایش اطلاعات بیشتر : <a href=\"{project_link}\">{project_name}</a></p><p>ما مشتاقانه منتظر شنیدن دیدگاه و نظرات شما هستیم.<br /><br />با تشکر,<br />{email_signature}</p>'
WHERE `slug` = 'assigned-to-project' AND `language` = 'persian' LIMIT 1;");

$CI->db->query("UPDATE `". db_prefix() ."emailtemplates` SET
`active` 	= 1,
`fromname` 	= '{companyname}',
`subject` 	= 'پروژه تکمیل شد',
`message` 	= '<p>{contact_firstname} {contact_lastname} گرامی</p><p>وضعیت پروژه {project_name} با توجه به انجام شدن پروژه به تکمیل شده تغییر یافت.<br /><br />بررسی و نمایش اطلاعات بیشتر : <a href=\"{project_link}\">{project_name}</a></p><p>در صورت نیاز با ما در ارتباط باشید.<br /><br />با تشکر,<br />{email_signature}</p>'
WHERE `slug` = 'project-finished-to-customer' AND `language` = 'persian' LIMIT 1;");
/* project */


/* staff */
$CI->db->query("UPDATE `". db_prefix() ."emailtemplates` SET
`active` 	= 1,
`fromname` 	= '{companyname}',
`subject` 	= 'دسترسی شما به سامانه ایجاد شد',
`message` 	= '<p>{staff_firstname} گرامی<br /><br />دسترسی شما به سامانه مدیریت کاربران با مشخصات زیر ایجاد شد.<br /><br />به منظور ورود به پنل مدیری از اطلاعات زیر استفاده کنید :<br /><br /><strong>آدرس ایمیل / نام کاربری :</strong> {staff_email}<br /><strong>کلمه عبور :</strong> {password}<br /><br />به منظور ورود به پنل مدیریت <a href=\"{admin_url}\">اینجا کلیک کنید</a>.<br /><br />با تشکر,<br />{email_signature}</p>'
WHERE `slug` = 'new-staff-created' AND `language` = 'persian' LIMIT 1;");

$CI->db->query("UPDATE `". db_prefix() ."emailtemplates` SET
`active` 	= 1,
`fromname` 	= '{companyname}',
`subject` 	= 'بازیابی کلمه عبور',
`message` 	= '<p><strong>بازیابی کلمه عبور</strong></p><p>کلمه عبور خود را فراموش کرده اید ؟<br />به منظور بازیابی کلمه عبور و ایجاد کلمه عبور جدید <a href=\"{reset_password_url}\">اینجا کلیک کنید</a>.<br /><br /><br />در صورتی که شما درخواست بازیابی کلمه عبور نداده اید این ایمیل را نادیده بگیرید.<br /><br />{email_signature}</p>'
WHERE `slug` = 'staff-forgot-password' AND `language` = 'persian' LIMIT 1;");

$CI->db->query("UPDATE `". db_prefix() ."emailtemplates` SET
`active` 	= 1,
`fromname` 	= '{companyname}',
`subject` 	= 'کلمه عبور شما تغییر یافت',
`message` 	= '<p>مدیر گرامی</p><p>کلمه عبور اکانت شما با موفقیت تغییر یافت.<br /><br />آدرس ایمیل شما جهت ورود به سیستم : {staff_email}<br /><br /><br />{email_signature}</p>'
WHERE `slug` = 'staff-password-reseted' AND `language` = 'persian' LIMIT 1;");

$CI->db->query("UPDATE `". db_prefix() ."emailtemplates` SET
`active` 	= 1,
`fromname` 	= '{companyname}',
`subject` 	= 'کد تایید ورود به سیستم',
`message` 	= '<p>{staff_firstname} گرامی</p><p style=\"text-align: right;\">ورود به اکانت شما به صورت تایید دو مرحله ای می باشد.</p><p style=\"text-align: right;\"><br />کد تایید ورود به پنل مدیریت :</p><p style=\"text-align: left;\"><span style=\"font-size: 18pt;\"><strong>{two_factor_auth_code}<br /></strong></span></p><p style=\"text-align: right;\"><span style=\"font-size: 18pt;\"><span>{email_signature}</span><strong><br /><br /><br /><br /></strong></span></p>'
WHERE `slug` = 'two-factor-authentication' AND `language` = 'persian' LIMIT 1;");

$CI->db->query("UPDATE `". db_prefix() ."emailtemplates` SET
`active` 	= 1,
`fromname` 	= '{companyname}',
`subject` 	= 'شما یک یادآوری جدید دارید',
`message` 	= '<p>{staff_firstname} گرامی<br /><br /><strong>شما یک یادآوری جدید دارید : {staff_reminder_relation_name}<br /><br />توضیحات بیشتر :</strong><br />{staff_reminder_description}<br /><br />بررسی و نمایش اطلاعات بیشتر : <a href=\"{staff_reminder_relation_link}\">{staff_reminder_relation_name}</a><br /><br />با تشکر<br /><br /></p>'
WHERE `slug` = 'reminder-email-staff' AND `language` = 'persian' LIMIT 1;");

$CI->db->query("UPDATE `". db_prefix() ."emailtemplates` SET
`active` 	= 1,
`fromname` 	= '{companyname}',
`subject` 	= 'یادآوری رویداد - {event_title}',
`message` 	= '<p>{staff_firstname} گرامی<br /><br />صرفاً جهت یادآوری :</p><p>رویداد <a href=\"{event_link}\">{event_title}</a> برای تاریخ {event_start_date} تنظیم شده است. <br /><br />با تشکر</p>'
WHERE `slug` = 'event-notification-to-staff' AND `language` = 'persian' LIMIT 1;");
/* staff */


/* lead */
$CI->db->query("UPDATE `". db_prefix() ."emailtemplates` SET
`active` 	= 1,
`fromname` 	= '{companyname}',
`subject` 	= 'یک مشتری احتمالی به شما تخصیص داده شد',
`message` 	= '<p>{lead_assigned} گرامی<br /><br />یک مشتری احتمالی به شما تخصیص داده شد.<br /><br /><strong>نام :</strong> {lead_name}<br /><strong>آدرس ایمیل :</strong> {lead_email}<br /><br />بررسی و نمایش اطلاعات بیشتر : <a href=\"{lead_link}\">{lead_name}</a><br /><br />با تشکر,<br />{email_signature}</p>'
WHERE `slug` = 'new-lead-assigned' AND `language` = 'persian' LIMIT 1;");

$CI->db->query("UPDATE `". db_prefix() ."emailtemplates` SET
`fromname` 	= '{companyname}',
`subject` 	= 'درخواست شما را دریافت کردیم',
`message` 	= '<p>{lead_name} گرامی</p><p><br />درخواست شما را دریافت کردیم و در اصرع وقت با شما تماس خواهیم گرفت.<br /><br />با تشکر,<br />{email_signature}</p>'
WHERE `slug` = 'new-web-to-lead-form-submitted' AND `language` = 'persian' LIMIT 1;");
/* lead */


/* estimate-request */
$CI->db->query("UPDATE `". db_prefix() ."emailtemplates` SET
`active` 	= 1,
`fromname` 	= '{companyname}',
`subject` 	= 'درخواست پیش فاکتور جدید',
`message` 	= '<p><span> مدیر گرامی, </span><br /><br />درخواست پیش فاکتور توسط آدرس ایمیل / شخص {estimate_request_email} از طریق فرم {estimate_request_form_name} ثبت شد.</p><p><br />بررسی و نمایش اطلاعات بیشتر : <a href=\"{estimate_request_link}\">{estimate_request_link}</a><br /><br />============ اطلاعات دریافت شده از طریق فرم ============<br /><br />{estimate_request_submitted_data}<br /><br />با تشکر,<br /><span>{email_signature}</span></p>'
WHERE `slug` = 'estimate-request-submitted-to-staff' AND `language` = 'persian' LIMIT 1;");

$CI->db->query("UPDATE `". db_prefix() ."emailtemplates` SET
`active` 	= 1,
`fromname` 	= '{companyname}',
`subject` 	= 'تخصیص درخواست پیش فاکتور به شما',
`message` 	= '<p><span>{estimate_request_assigned} گرامی, </span><br /><br />درخواست پیش فاکتور {estimate_request_id} به شما تخصیص داده شده است.<br /><br />بررسی و نمایش اطلاعات بیشتر : <a href=\"{estimate_request_link}\">{estimate_request_link}</a><br /><br />با تشکر,<br /><span>{email_signature}</span></p>'
WHERE `slug` = 'estimate-request-assigned' AND `language` = 'persian' LIMIT 1;");

$CI->db->query("UPDATE `". db_prefix() ."emailtemplates` SET
`fromname` 	= '{companyname}',
`subject` 	= 'درخواست پیش فاکتور ثبت شد',
`message` 	= '<p>سلام و احترام,</p><p>درخواست پیش فاکتور شما دریافت و ثبت شد.<br /><br />در اولین فرصت درخواست شما را بررسی و در صورت نیاز با شما تماس خواهیم گرفت.<br /><br />با تشکر,<br />{email_signature}</p>'
WHERE `slug` = 'estimate-request-received-to-user' AND `language` = 'persian' LIMIT 1;");
/* estimate-request */


/* notifications */
$CI->db->query("UPDATE `". db_prefix() ."emailtemplates` SET
`active` 	= 1,
`fromname` 	= '{companyname}',
`subject` 	= 'اقدام مورد نیاز : وظایف تکمیل شده بدون صورت حساب',
`message` 	= '<p>{staff_firstname} گرامی<br /><br />وظایف زیر به عنوان تکمیل شده علامت گذاری شده است اما صورت حسابی برای آنها دریافت نشده است:<br /><br />{unbilled_tasks_list}<br /><br />با تشکر,<br />{email_signature}</p>'
WHERE `slug` = 'non-billed-tasks-reminder' AND `language` = 'persian' LIMIT 1;");
/* notifications */