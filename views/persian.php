<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php init_head(); ?>
<div id="wrapper">
    <div class="content">
        <div class="row">
            <div class="col-md-3 picker">
                <ul class="nav navbar-pills navbar-pills-flat nav-tabs nav-stacked" id="persian_area">
                    <li role="presentation" class="persianlogo">
						<center><a href="https://miladworkshop.ir/blog/perfex-crm-persian" target="_blank"><img src="<?php echo module_dir_url('persian', 'assets/image/logo.png'); ?>" alt="Miladworkshop" /></a></center>
					</li>
                    <li role="presentation" class="active"><a href="#general" aria-controls="general" role="tab" data-toggle="tab">تنظیمات اصلی</a></li>
                    <li role="presentation"><a href="#login" aria-controls="login" role="tab" data-toggle="tab">تنظیمات ورود پیامکی</a></li>
                    <li role="presentation"><a href="#more" aria-controls="more" role="tab" data-toggle="tab">سایر ماژول‌های منتشر شده</a></li>
                    <li role="presentation"><a href="#changelog" aria-controls="changelog" role="tab" data-toggle="tab">لیست تغییرات و بروزرسانی‌ها</a></li>
                </ul>
            </div>
            <form method="post" action="" id="persian">
				<div class="col-md-9">
					<div class="panel_s">
						<div class="panel-body pickers">
							<div class="tab-content">
								<div role="tabpanel" class="tab-pane ptop10 active" id="general">
									<div class="row">
										<div class="col-md-6">
											<?php echo persian_form_select('persian_style', 'بهبود ظاهر', 'rtl', array('Y' => 'فعال', 'N' => 'غیرفعال')); ?>
											<small>در صورت فعال سازی, ظاهر پنل مدیریت و پنل کاربری بهبود خواهد یافت.</small>
										</div>
										<div class="col-md-6">
											<?php echo persian_form_select('persian_lang', 'بهبود ترجمه', 'rtl', array('Y' => 'فعال', 'N' => 'غیرفعال')); ?>
											<small>در صورت فعال سازی, ترجمه زبان پارسی بهبود خواهد یافت.</small>
										</div>

										<div class="col-md-12"><hr /></div>

										<div class="col-md-12">
											<?php echo persian_form_select('persian_date', 'شمسی سازی تاریخ', 'rtl', array('Y' => 'فعال', 'N' => 'غیرفعال')); ?>
											<small>در صورت فعال بود, کلیه تاریخ‌های سیستم بصورت شمسی نمایش داده خواهد شد.</small>
										</div>

										<div class="col-md-12"><hr /></div>

										<div class="col-md-12">
											<?php echo persian_form_select('persian_number', 'نوع اعداد', 'rtl', array('EN' => 'انگلیسی', 'FA' => 'پارسی')); ?>
											<small>در صورت انتخاب گزینه پارسی, کلیه اعداد تاریخ سیستم بصورت پارسی ( ۰۱۲۳۴۵۶۷۸۹ ) و در صورت انتخاب گزینه انگلیسی اعداد بصورت انگلیسی ( 0123456789 ) نمایش داده خواهد شد.</small>
										</div>

										<div class="col-md-12"><hr /></div>

										<div class="col-md-12">
											<?php echo persian_form_select('persian_date_format', 'فرمت نمایش تاریخ', 'ltr', array('YYYY/MM/DD' => 'YYYY/MM/DD', 'YYYY-MM-DD' => 'YYYY-MM-DD')); ?>
											<small>فرمت جدا سازی روز, ماه, سال در نمایش تاریخ سیستم.</small>
										</div>

										<div class="col-md-12"><hr /></div>

										<div class="col-md-12">
											<?php echo persian_form_select('persian_verify_email', 'تایید خودکار آدرس ایمیل', 'rtl', array('Y' => 'فعال', 'N' => 'غیرفعال')); ?>
											<small>در صورت فعال بود, پس از ثبت نام کاربر جدید, آدرس ایمیل کاربر بصورت خودکار فعال شده و نیازی به تایید و فعال سازی آدرس ایمیل توسط کاربر نیست.</small>
										</div>
									</div>
								</div>
								<div role="tabpanel" class="tab-pane ptop10" id="login">
									<div class="row">
										<div class="col-md-12">
											این قابلیت در نسخه جدید افزوده خواهد شد.
										</div>
									</div>
								</div>
								<div role="tabpanel" class="tab-pane" id="more">
									<div class="row">
										<div class="persian-more col-md-12">
											<a href="https://miladworkshop.ir/blog/perfex-crm-persian" target="_blank">
												<img src="<?php echo module_dir_url('persian', 'assets/image/more/persian.jpg'); ?>" alt="www.miladworkshop.ir" />
											</a>
										</div>
										<div class="persian-more col-md-6">
											<a href="https://miladworkshop.ir/blog/perfex-crm-sms-ir-module" target="_blank">
												<img src="<?php echo module_dir_url('persian', 'assets/image/more/smsir.jpg'); ?>" alt="www.miladworkshop.ir" />
											</a>
										</div>
										<div class="persian-more col-md-6">
											<a href="https://miladworkshop.ir/blog/perfex-crm-farapayamak-sms-module" target="_blank">
												<img src="<?php echo module_dir_url('persian', 'assets/image/more/farapayamak.jpg'); ?>" alt="www.miladworkshop.ir" />
											</a>
										</div>
										<div class="persian-more col-md-6">
											<a href="https://miladworkshop.ir/blog/perfex-crm-melipayamak-sms-module" target="_blank">
												<img src="<?php echo module_dir_url('persian', 'assets/image/more/melipayamak.jpg'); ?>" alt="www.miladworkshop.ir" />
											</a>
										</div>
										<div class="persian-more col-md-6">
											<a href="https://miladworkshop.ir/blog/perfex-crm-ippanel-sms-module" target="_blank">
												<img src="<?php echo module_dir_url('persian', 'assets/image/more/ippanel.jpg'); ?>" alt="www.miladworkshop.ir" />
											</a>
										</div>
										<div class="persian-more col-md-6">
											<a href="https://miladworkshop.ir/blog/perfex-crm-kavenegar-sms-module" target="_blank">
												<img src="<?php echo module_dir_url('persian', 'assets/image/more/kavenegar.jpg'); ?>" alt="www.miladworkshop.ir" />
											</a>
										</div>
										<div class="persian-more col-md-6">
											<a href="https://miladworkshop.ir/blog/perfex-crm-zarinpal-gateway" target="_blank">
												<img src="<?php echo module_dir_url('persian', 'assets/image/more/zarinpal.jpg'); ?>" alt="www.miladworkshop.ir" />
											</a>
										</div>
										<div class="persian-more col-md-6">
											<a href="https://miladworkshop.ir/blog/perfex-crm-idpay-gateway" target="_blank">
												<img src="<?php echo module_dir_url('persian', 'assets/image/more/idpay.jpg'); ?>" alt="www.miladworkshop.ir" />
											</a>
										</div>
										<div class="persian-more col-md-6">
											<a href="https://miladworkshop.ir/blog/perfex-crm-zibal-gateway" target="_blank">
												<img src="<?php echo module_dir_url('persian', 'assets/image/more/zibal.jpg'); ?>" alt="www.miladworkshop.ir" />
											</a>
										</div>
									</div>
								</div>
								<div role="tabpanel" class="tab-pane ptop10" id="changelog">
									<div class="row">
										<div class="col-md-12">
											<ul class="persian-timeline">
												<li>
													<p class="persian-timeline-date">1402/05/04</p>
													<div class="persian-timeline-content">
														<p>ارائه نسخه اولیه</p>
														<p>قابلیت بهبود ظاهر</p>
														<p>قابلیت بهبود ترجمه</p>
														<p>قابلیت شمسی سازی تاریخ</p>
														<p>قابلیت تنظیم نوع اعداد تاریخ</p>
														<p>قابلیت تایید خودکار آدرس ایمیل</p>
														<p>قابلیت تنظیم فرمت نمایش تاریخ</p>
													</div>
												</li>
											</ul>											
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</form>
        </div>
        <div class="btn-bottom-pusher"></div>
        <div class="btn-bottom-toolbar text-right">
            <a href="javascript:void(0)" onclick="save(); return false;" class="btn btn-primary"><?php echo _l('save'); ?></a>
        </div>
    </div>
</div>
<?php init_tail(); ?>
<script>
function save()
{
	var post_data 		= {};
	const formElements 	= Array.from(document.getElementById("persian").elements);

	formElements.forEach(element =>
	{
		if (element.name != "")
		{		
			post_data[element.name] = element.value;
		}
	});

    $.post(admin_url + 'persian/save', {
        data: post_data
    }).done(function() {
        var tab 		= $('#persian_area').find('li.active > a:eq(0)').attr('href');
        tab 			= tab.substring(1, tab.length)
        window.location = admin_url + 'persian?tab=' + tab;
    });
}
</script>
</body>

</html>