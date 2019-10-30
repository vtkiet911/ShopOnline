$(document).ready(function ($) {

	$.ajaxSetup({
	    headers: {
	        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    }
	});

	$(document).on('click','#BtnCheckOut',function(){
		var name = $('#name').val();
		var email = $('#email').val();
		var adress = $('#adress').val();
		var phone = parseInt($('#phone').val());

		var data = {
			name: name,
			email: email,
			adress: adress,
			phone: phone,
		};
		var url = location.origin + "/CheckOutRequest";
		console.log(url);
		$.ajax({
			url: url,
			type: 'POST',
			data: data,
			success: function(response){
				var errors = response['error'];
				if(errors){
					console.log(errors);
					// Có lỗi input nhập vào.
					Validate(errors);
				}
				else{
					var i = 1;
					for(i = 1; i <= 4; i++){
						 RemoveValidate('validate_'+i);
					}
					// Validate = true;
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
		for(i = 1; i <= 4; i++){
			 RemoveValidate('validate_'+i);
		}
		$.each(errors, function(index, val) {
			var attribute = '';
			stt++;
			if(index == 'name') attribute = "họ và tên" ;
			if(index == 'email') attribute = "email" ;
			if(index == 'adress') attribute = "địa chỉ" ;
			if(index == 'phone') attribute = "đúng số điện thoại" ;
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
});
