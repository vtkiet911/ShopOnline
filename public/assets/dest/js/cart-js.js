$(document).ready(function ($) {

	$(document).on('click','#BtnCheckOut',function(){

		$('#formcheckout').validate({
	    //Khai báo cáo rule
	      rules: {
		      // username là bắt buộc và có độ dài từ 6 - 20 kí tự
		      name: "required"
	      },
	      // Các thông báo lỗi tương ứng với mỗi rule
	      messages: {
	        name:"Vui lòng nhập họ và tên!"
	      }
	    });
		console.log('123');
	});
});
