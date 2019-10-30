@extends('blade.master')
@section('title','Chi tiết sản phẩm')
@section('content')
<div class="inner-header">
	<div class="container">
		<div class="pull-left">
			<h6 class="inner-title">Chi tiết sản phẩm</h6>
		</div>
		<div class="pull-right">
			<div class="beta-breadcrumb font-large">
				<a href="{{ route('home') }}">Trang chủ</a> / <span>Chi tiết sản phẩm</span>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
</div>
@if(isset($product))
	@php
		$maxQuantity = 10;
	@endphp
	<div class="container">
		<div id="content">
			<div class="row">
				<div class="col-sm-9">
					
					<div class="row">
						<div class="col-sm-4 p-0">
							@if($product->promotion_price != 0)
								<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
							@endif
							<img src="image/product/{{ $product->image }}" alt="">
						</div>
						<div class="col-sm-8">
							<div class="single-item-body">
								<p class="single-item-title">{{ $product->name }}</p>
								<p class="single-item-price">
									@if($product->promotion_price == 0)
										<span class="flash-sale">{{ number_format($product->unit_price) }} đồng</span>
									@else
										<span class="flash-sale">{{ number_format($product->promotion_price) }} đồng</span>
										<span class="flash-del">{{ number_format($product->unit_price) }} đồng</span>
									@endif
								</p>
							</div>

							<div class="clearfix"></div>
							<div class="space20">&nbsp;</div>

							<div class="single-item-desc">
								<p>{{ $product->description }}</p>
							</div>
							<div class="space20">&nbsp;</div>

							<p>Số lượng:</p>
							<div class="single-item-options">
								<select class="wc-select" name="color">
									@for($i = 1; $i <= $maxQuantity; $i++)
										<option value="{{ $i }}">{{ $i }}</option>
									@endfor
								</select>
								<a class="add-to-cart" href="#"><i class="fa fa-shopping-cart"></i></a>
								<div class="clearfix"></div>
							</div>
						</div>
					</div>
						
					<div class="space40">&nbsp;</div>
					<div class="woocommerce-tabs">
						<ul class="tabs">
							<li><a href="#tab-description">Mô tả</a></li>
							<li><a href="#tab-reviews">Đánh giá (0)</a></li>
						</ul>

						<div class="panel" id="tab-description">
							{{ $product->description }}
						</div>
						<div class="panel" id="tab-reviews">
							<p>No Reviews</p>
						</div>
					</div>
					<div class="space50">&nbsp;</div>
					<div class="beta-products-list">
						<h4>Sản phẩm liên quan</h4>

						<div class="row">
							@if($otherProducts->total() != 0)
							@foreach($otherProducts as $otherProduct)
								<div class="col-sm-4">
									<div class="single-item">
										<div class="single-item-header">
											@if($otherProduct->promotion_price != 0)
												<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
											@endif
												<img src="image/product/{{ $otherProduct->image }}" alt="" height="250px">
										</div>
										<div class="single-item-body">
											<p class="single-item-title">{{ $otherProduct->name }}</p>
											<p class="single-item-price">
												@if($otherProduct->promotion_price == 0)
													<span class="flash-sale">{{ number_format($otherProduct->unit_price) }} đồng</span>
												@else
													<span class="flash-sale">{{ number_format($otherProduct->promotion_price) }} đồng</span>
													<span class="flash-del">{{ number_format($otherProduct->unit_price) }} đồng</span>
												@endif
											</p>
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="product.html"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="{{ route('typeproduct',$otherProduct->id) }}">Chi tiết <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
							@endforeach
							@else
								<h6 class="col-sm-6">Không có sản phẩm nào</h6>
							@endif
						</div>
						<div class="row"> {{ $otherProducts->render() }} </div>
					</div> <!-- .beta-products-list -->
				</div>
				<div class="col-sm-3 aside">
					<div class="widget">
						<h3 class="widget-title">Best Sellers</h3>
						<div class="widget-body">
							<div class="beta-sales beta-lists">
								<div class="media beta-sales-item">
									<a class="pull-left" href="product.html"><img src="assets/dest/images/products/sales/1.png" alt=""></a>
									<div class="media-body">
										Sample Woman Top
										<span class="beta-sales-price">$34.55</span>
									</div>
								</div>
								<div class="media beta-sales-item">
									<a class="pull-left" href="product.html"><img src="assets/dest/images/products/sales/2.png" alt=""></a>
									<div class="media-body">
										Sample Woman Top
										<span class="beta-sales-price">$34.55</span>
									</div>
								</div>
								<div class="media beta-sales-item">
									<a class="pull-left" href="product.html"><img src="assets/dest/images/products/sales/3.png" alt=""></a>
									<div class="media-body">
										Sample Woman Top
										<span class="beta-sales-price">$34.55</span>
									</div>
								</div>
								<div class="media beta-sales-item">
									<a class="pull-left" href="product.html"><img src="assets/dest/images/products/sales/4.png" alt=""></a>
									<div class="media-body">
										Sample Woman Top
										<span class="beta-sales-price">$34.55</span>
									</div>
								</div>
							</div>
						</div>
					</div> <!-- best sellers widget -->
					<div class="widget">
						<h3 class="widget-title">New Products</h3>
						<div class="widget-body">
							<div class="beta-sales beta-lists">
								<div class="media beta-sales-item">
									<a class="pull-left" href="product.html"><img src="assets/dest/images/products/sales/1.png" alt=""></a>
									<div class="media-body">
										Sample Woman Top
										<span class="beta-sales-price">$34.55</span>
									</div>
								</div>
								<div class="media beta-sales-item">
									<a class="pull-left" href="product.html"><img src="assets/dest/images/products/sales/2.png" alt=""></a>
									<div class="media-body">
										Sample Woman Top
										<span class="beta-sales-price">$34.55</span>
									</div>
								</div>
								<div class="media beta-sales-item">
									<a class="pull-left" href="product.html"><img src="assets/dest/images/products/sales/3.png" alt=""></a>
									<div class="media-body">
										Sample Woman Top
										<span class="beta-sales-price">$34.55</span>
									</div>
								</div>
								<div class="media beta-sales-item">
									<a class="pull-left" href="product.html"><img src="assets/dest/images/products/sales/4.png" alt=""></a>
									<div class="media-body">
										Sample Woman Top
										<span class="beta-sales-price">$34.55</span>
									</div>
								</div>
							</div>
						</div>
					</div> <!-- best sellers widget -->
				</div>
			</div>
		</div> <!-- #content -->
	</div> <!-- .container -->
@endif
@endsection