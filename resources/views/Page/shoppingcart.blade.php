@extends('Blade.master')
@section('title','Thanh toán sản phẩm')
@section('script')
<script src="assets/dest/js/cart-js.js"></script>
@endsection
@section('content')
	<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Đặt hàng</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb">
					<a href="index.html">Trang chủ</a> / <span>Đặt hàng</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	@if(Auth::check())
		<input type="hidden" id="Auth" data-auth="1" data-fullname="{{ Auth::user()->full_name }}" data-email="{{ Auth::user()->email }}" data-address="{{ Auth::user()->address }}" data-phone="{{ Auth::user()->phone }}">
	@else
		<input type="hidden" id="Auth" data-auth="0">
	@endif
	<div class="container">
		<div id="content">
			<form class="beta-form-checkout" id='formcheckout' action="{{ route('CheckOutRequest') }}" method="POST">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<div class="row">
					<div class="col-sm-6">
						<h4>Đặt hàng</h4>
						<div class="space20">&nbsp;</div>
						<div class="form-block col-lg-12 col-md-12 col-sm-12 mb-0" id="group_name">
							<label for="name">Họ tên</label>
							<input type="text" class=" col-lg-12 col-md-12 col-sm-12" id="name" name="name" placeholder="Họ và tên">
						</div>
						<div class="form-block col-lg-12 col-md-12 col-sm-12 mb-0">
							<label>Giới tính </label>
							<div class="col-lg-12 col-md-12 col-sm-12 p-0 m-0">
								<input id="gendermale" type="radio" class="input-radio" name="gender" value="1" checked="checked"><span class="pr-3">Nam</span>
								<input id="genderfemale" type="radio" class="input-radio" name="gender" value="0"><span>Nữ</span>
							</div>		
						</div>

						<div class="form-block col-lg-12 col-md-12 col-sm-12 mb-0" id="group_email">
							<label for="email">Email</label>
							<input type="email" id="email" name="email" class=" col-lg-12 col-md-12 col-sm-12 " placeholder="expample@gmail.com">
						</div>

						<div class="form-block col-lg-12 col-md-12 col-sm-12 mb-0" id="group_adress">
							<label for="adress">Địa chỉ</label>
							<input type="text" id="adress" name="adress" class="col-lg-12 col-md-12 col-sm-12 " placeholder="Địa chỉ nhận hàng" >
						</div>
						

						<div class="form-block col-lg-12 col-md-12 col-sm-12 mb-0" id="group_phone">
							<label for="phone">Điện thoại</label>
							<input type="text" class=" col-lg-12 col-md-12 col-sm-12 " id="phone" name="phone">
						</div>
						
						<div class="form-block col-lg-12 col-md-12 col-sm-12 mb-0">
							<label for="notes">Ghi chú</label>
							<textarea id="notes" class=" col-lg-12 col-md-12 col-sm-12 "></textarea>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="your-order">
							<div class="your-order-head"><h5>Đơn hàng của bạn</h5></div>
							<div class="your-order-body" style="padding: 0px 10px">
								<div class="your-order-item">
									<div>
										{{-- @dd($cart->items) --}}
									<!--  one item	 -->
									@foreach($cart->items as $product)
										<div class="media">
											<img width="25%" src="image/product/{{ $product['item']['image'] }}" alt="" class="pull-left">
											
											<div class="media-body">
												<p class="font-large">{{ $product['item']['name'] }}</p>
												<span class="color-gray your-order-info">Số lượng: {{ $product['qty'] }}</span>
											</div>
											
										</div>
									@endforeach
									<!-- end one item -->
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="your-order-item">
									<div class="pull-left"><p class="your-order-f18">Tổng tiền:</p></div>
									<div class="pull-right"><h5 class="color-black">{{ number_format($cart->totalPrice,0,",",".") }}</h5></div>
									<div class="clearfix"></div>
								</div>
							</div>
							<div class="your-order-head"><h5>Hình thức thanh toán</h5></div>
							
							<div class="your-order-body">
								<ul class="payment_methods methods">
									<li class="payment_method_bacs">
										<input id="payment_method_bacs" type="radio" class="input-radio" name="payment_method" value="COD" checked="checked" data-order_button_text="">
										<label for="payment_method_bacs">Thanh toán khi nhận hàng </label>
										<div class="payment_box payment_method_bacs" style="display: block;">
											Cửa hàng sẽ gửi hàng đến địa chỉ của bạn, bạn xem hàng rồi thanh toán tiền cho nhân viên giao hàng
										</div>						
									</li>

									<li class="payment_method_cheque">
										<input id="payment_method_cheque" type="radio" class="input-radio" name="payment_method" value="ATM" data-order_button_text="">
										<label for="payment_method_cheque">Chuyển khoản </label>
										<div class="payment_box payment_method_cheque" style="display: none;">
											Chuyển tiền đến tài khoản sau:
											<br>- Số tài khoản: 123 456 789
											<br>- Chủ TK: Vũ Thái Kiệt
											<br>- Ngân hàng VCB, Chi nhánh bắc sài gòn
										</div>						
									</li>
									
								</ul>
							</div>
							<div class="text-center"><button class="beta-btn primary" id="BtnCheckOut" type="button">Đặt hàng <i class="fa fa-chevron-right"></i></button></div>
						</div> <!-- .your-order -->
					</div>
				</div>
			</form>
		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection