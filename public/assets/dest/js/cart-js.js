

$(document).ready(function ($) {
	if($('#Auth').data('auth') == 1){
		$('#name').val($('#Auth').data('fullname'));
		$('#email').val($('#Auth').data('email'));
		$('#adress').val($('#Auth').data('address'));
		$('#phone').val($('#Auth').data('phone'))
	}
	var maxAttribute = 4;
	$.ajaxSetup({
	    headers: {
	        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    }
	});

	$(document).on('click','#BtnCheckOut',function(){

		var name = $('#name').val();
		var email = $('#email').val();
		var adress = $('#adress').val();
		var gender = $('input[name=gender]:checked').val();
		var phone = $('#phone').val();
		var notes = $('#notes').val();
		var payment = $('input[name=payment_method]:checked').val();

		var data = {
			name: name,
			gender: gender,
			email: email,
			adress: adress,
			phone: phone,
			notes: notes,
			payment: payment,
		};
		var url = location.origin + "/CheckOutRequest";
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
					// Validate = true;
					$.ajax({
						url: location.origin + "/AddCartInDB",
						type: 'POST',
						data: data,
						success:function(){
							toastr['success']('Bạn đã đặt hàng thành công');
							window.open(location.origin,'_self');
						},
						error: function(req, err){
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
