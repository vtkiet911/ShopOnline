$(document).ready(function($){
	var maxAttribute = 5;
	$.ajaxSetup({
	    headers: {
	        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    }
	});
	
	$(document).on('click','#btnRegister',function(){

		var name = $('#name').val();
		var email = $('#email').val();
		var adress = $('#adress').val();
		var password =  $('#password').val();
		var phone = $('#phone').val();

		var data = {
			name: name,
			email: email,
			adress: adress,
			phone: phone,
			phonecheck: parseInt(phone),
			password: password,
		};
		var url = location.origin + "/CheckRequestRegister";
		$.ajax({
			url: url,
			type: 'POST',
			data: data,

			success: function(response){
				var errors = response['error'];
				if(errors.length != 0){
					// Có lỗi từ input nhập vào.
					Validate(errors);
					toastr['warning']('Vui lòng kiểm tra lại thông tin');
				}
				else{
					var i = 1;
					for(i = 1; i <= maxAttribute; i++){
						 RemoveValidate('validate_'+i);
					}
					$.ajax({
						url: location.origin + "/InsertUser",
						type: 'POST',
						data: data,
						success:function(){
							toastr['success']('Bạn đã đăng ký thành công');
							window.open(location.origin,'_self');
						},
						error: function(req, err){
							var error = req['responseJSON']['message'];
							var suberror = error.substring(0,15);
							if(suberror == "SQLSTATE[23000]")
							{
								toastr['error']('Email đã được sử dụng!');
							}
							// if(req['responseJSON']['message'])
							console.log(req,err);
						}
					});
				}
			},
			error: function(req, err){
				console.log(req,err);
			}

		});
	});

	function Validate(errors){
		var stt = 0;
		var i = 1;
		for(i = 1; i <= maxAttribute; i++){
			 RemoveValidate('validate_'+i);
		}
		$.each(errors, function(index, val) {
			var attribute = '';
			stt++;
			if(index == 'name') attribute = "họ và tên" ;
			if(index == 'email') attribute = "email" ;
			if(index == 'adress') attribute = "địa chỉ" ;
			if(index == 'phone') attribute = "đúng số điện thoại" ;
			if(index == 'password') attribute = "mật khẩu 6 - 25 kí tự" ;
			
			AddValidate('group_'+index,'validate_'+stt,'Vui lòng nhập ' + attribute + ' !');
		});
	}
	function AddValidate(groupID, validateID, message) {
	    $('#' + validateID).remove();
	    $('#' + groupID).append('<label id ="' + validateID + '" class ="mb-0 pl-1 pt-1 validate" style="color: #dc3545"><i class="fa fa-warning"></i>' + message + '</lable>');
	}
	function RemoveValidate(validateID) {
	    $('#' + validateID).remove();
	}
	toastr.options = {
	  "closeButton": false,
	  "debug": false,
	  "newestOnTop": true,
	  "progressBar": false,
	  "positionClass": "toast-bottom-right",
	  "preventDuplicates": true,
	  "onclick": null,
	  "showDuration": "300",
	  "hideDuration": "1000",
	  "timeOut": "5000",
	  "extendedTimeOut": "1000",
	  "showEasing": "swing",
	  "hideEasing": "linear",
	  "showMethod": "fadeIn",
	  "hideMethod": "fadeOut"
	}
});