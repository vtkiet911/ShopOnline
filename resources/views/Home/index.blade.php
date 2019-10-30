@extends('blade.master')
@section('title','Trang chủ')
@section('content')
<div class="rev-slider">
	<div class="fullwidthbanner-container">
		<div class="fullwidthbanner">
			<div class="bannercontainer" >
				<div class="banner" >
					<ul>
						<!-- THE FIRST SLIDE -->
						@if(isset($slides))
						@foreach($slides as $slide)
						<li data-transition="boxfade" data-slotamount="20" class="active-revslide" style="width: 100%; height: 100%; overflow: hidden; z-index: 18; visibility: hidden; opacity: 0;">
							<div class="slotholder" style="width:100%;height:100%;" data-duration="undefined" data-zoomstart="undefined" data-zoomend="undefined" data-rotationstart="undefined" data-rotationend="undefined" data-ease="undefined" data-bgpositionend="undefined" data-bgposition="undefined" data-kenburns="undefined" data-easeme="undefined" data-bgfit="undefined" data-bgfitend="undefined" data-owidth="undefined" data-oheight="undefined">
								<div class="tp-bgimg defaultimg" data-lazyload="undefined" data-bgfit="cover" data-bgposition="center center" data-bgrepeat="no-repeat" data-lazydone="undefined" src="image/slide/{{ $slide->image }}" data-src="image/slide/{{ $slide->image }}" style="background-color: rgba(0, 0, 0, 0); background-repeat: no-repeat; background-image: url('image/slide/{{ $slide->image }}'); background-size: cover; background-position: center center; width: 100%; height: 100%; opacity: 1; visibility: inherit;">
								</div>
							</div>

						</li>
						@endforeach
						@endif
					</ul>
				</div>
			</div>

			<div class="tp-bannertimer"></div>
		</div>
	</div>
	<!--slider-->
</div>
<div class="container">
	<div id="content" class="space-top-none">
		<div class="main-content">
			<div class="space60">&nbsp;</div>
			<div class="row">
				<div class="col-sm-12">
					<div class="beta-products-list">
						<h4>Sản phẩm mới</h4>
						<div class="beta-products-details">
							<p class="pull-left">Có {{ $newProducts->total() }} sản phẩm mới</p>
							<div class="clearfix"></div>
						</div>

						<div class="row">
							@foreach($newProducts as $product)
								<div class="col-sm-3 mb-2">
									<div class="single-item">
										@if($product->promotion_price != 0)
											<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
										@endif
										<div class="single-item-header">
											<a href="{{ route('detailproduct', $product->id) }}"><img src="image/product/{{ $product->image }}" alt="" style="height: 250px"></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">{{ $product->name }}</p>
											<p class="single-item-price mb-1">
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
						<div class="row">{{ $newProducts->render() }}</div>
					</div> <!-- .beta-products-list -->

					<div class="space50">&nbsp;</div>

					<div class="beta-products-list">
						<h4>Sản phẩm khuyến mãi</h4>
						<div class="beta-products-details">
							<p class="pull-left">Có {{ $promotionProducts->total() }} sản phẩm</p>
							<div class="clearfix"></div>
						</div>
						<div class="row">
							@foreach($promotionProducts as $product)
							<div class="col-sm-3">
								<div class="single-item">
									<div class="single-item-header">
										<a href="{{ route('detailproduct', $product->id) }}"><img src="image/product/{{ $product->image }}" alt="" height="250px"></a>
									</div>
									<div class="single-item-body">
										<p class="single-item-title">{{ $product->name }}</p>
										<p class="single-item-price mb-1">
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
						<div class="row">{{ $promotionProducts->render() }}</div>						
						
					</div> <!-- .beta-products-list -->
				</div>
			</div> <!-- end section with sidebar and main content -->


		</div> <!-- .main-content -->
	</div> <!-- #content -->
</div> <!-- .container -->

@endsection
