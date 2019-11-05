@extends('Blade.master')
@section('title','Đăng ký')
@section('script')
<script src="assets/dest/js/register-js.js"></script>
@endsection
@section('content')
<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Đăng ký</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb">
					<a href="{{ route('home') }}">Trang chủ</a> / <span>Đăng ký</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	
	<div class="container">
		<div id="content">
			
			<form action="#" method="post" class="beta-form-checkout">
				<div class="row">
					<div class="col-sm-3"></div>
					<div class="col-sm-6">
						<h4>Đăng ký</h4>
						<div class="space20">&nbsp;</div>

						
						<div class="form-block" id="group_email">
							<label for="email">Địa chỉ email</label>
							<input type="email" id="email" >
						</div>

						<div class="form-block" id="group_name">
							<label for="name">Họ và tên</label>
							<input type="text" id="name" >
						</div>

						<div class="form-block" id="group_adress">
							<label for="adress">Địa chỉ</label>
							<input type="text" id="adress" value="" placeholder="Địa chỉ">
						</div>


						<div class="form-block" id="group_phone">
							<label for="phone">Số điện thoại</label>
							<input type="text" id="phone" >
						</div>
						<div class="form-block" id="group_password">
							<label for="password">Mật khẩu</label>
							<input type="password" id="password" >
						</div>
						<div class="form-block">
							<button type="button" id="btnRegister" class="btn btn-primary">Đăng ký</button>
						</div>
					</div>
					<div class="col-sm-3"></div>
				</div>
			</form>
		</div> <!-- #content -->
	</div> <!-- .container -->

@endsection
