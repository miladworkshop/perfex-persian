document.addEventListener('DOMContentLoaded', function()
{
	$('.datepicker').addClass('persian-datepicker');
	$('.datepicker').removeClass('datepicker');

	$('.datetimepicker').addClass('persian-datepicker');
	$('.datetimepicker').removeClass('datetimepicker');

	$('.persian-datepicker').pDatepicker({format: 'YYYY/MM/DD'});
});