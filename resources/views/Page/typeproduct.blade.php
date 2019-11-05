@extends('Blade.master')
@section('title','Loại sản phẩm')
@section('content')
<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Sản phẩm</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="{{ route('home') }}">Trang chủ</a> / <span>Sản phẩm</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<div class="container">
		<div id="content" class="space-top-none">
			<div class="main-content">
				<div class="space60">&nbsp;</div>
				<div class="row">
					<div class="col-sm-3">
						<ul class="aside-menu">
							@if(isset($typeProducts))
								@foreach($typeProducts as $typeProduct)
									<li><a href="{{ route('typeproduct',$typeProduct->id) }}">{{ $typeProduct->name }}</a></li>
								@endforeach
							@endif
						</ul>
					</div>
					<div class="col-sm-9">
						<div class="beta-products-list">
							<h4>Sản phẩm mới</h4>
							<div class="beta-products-details">
								<p class="pull-left">Có {{ $products->total() }} sản phẩm</p>
								<div class="clearfix"></div>
							</div>

							<div class="row">
								@foreach($products as $product)
								<div class="col-sm-4">
									<div class="single-item mb-1">
										@if($product->promotion_price != 0)
										<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
										@endif
										<div class="single-item-header">
											<a href="{{ route('detailproduct', $product->id) }}"><img src="image/product/{{ $product->image }}" alt="" style="height: 250px"></a>
										</div>
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
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="{{ route('addtocart',$product->id) }}"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="{{ route('detailproduct', $product->id) }}">Chi tiết <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
								@endforeach
							</div>
						</div> <!-- .beta-products-list -->
						<div class="row">{{ $products->render() }}</div>
						<div class="space50">&nbsp;</div>

						<div class="beta-products-list">
							<h4>Sản phẩm khác</h4>
							<div class="beta-products-details">
								<p class="pull-left">Có {{ $otherProducts->total() }} sản phẩm</p>
								<div class="clearfix"></div>
							</div>

							<div class="row">
								@foreach($otherProducts as $product)
								<div class="col-sm-4">
									<div class="single-item mb-1">
										@if($product->promotion_price != 0)
										<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
										@endif
										<div class="single-item-header">
											<a href="{{ route('detailproduct', $product->id) }}"><img src="image/product/{{ $product->image }}" alt="" style="height: 250px"></a>
										</div>
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
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="{{ route('addtocart',$product->id) }}"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="{{ route('detailproduct', $product->id) }}">Chi tiết <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
								@endforeach
							</div>
							<div class="space40">&nbsp;</div>
							<div class="row">{{ $otherProducts->render() }}</div>
						</div> <!-- .beta-products-list -->
					</div>
				</div> <!-- end section with sidebar and main content -->


			</div> <!-- .main-content -->
		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection