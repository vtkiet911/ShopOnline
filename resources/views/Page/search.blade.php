@extends('Blade.master')
@section('title','Tìm kiếm')
@section('content')
<div class="container">
	<div id="content" class="space-top-none">
		<div class="main-content">
			<div class="space60">&nbsp;</div>
			<div class="row">
				<div class="col-sm-12">
					<div class="beta-products-list">
						<h4>Sản phẩm tìm kiếm</h4>
						@if($products->total() != 0)
							<div class="beta-products-details">
								<p class="pull-left">Có {{ $products->total() }} sản phẩm</p>
								<div class="clearfix"></div>
							</div>

							<div class="row">
								@foreach($products as $product)
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
							<div class="row">{{ $products->render() }}</div>
						@else
							<div class="beta-products-details">
								<p class="pull-left">Không tìm thấy sản phẩm nào</p>
								<div class="clearfix"></div>
							</div>
						@endif
					</div> <!-- .beta-products-list -->
				</div>
			</div> <!-- end section with sidebar and main content -->


		</div> <!-- .main-content -->
	</div> <!-- #content -->
</div> <!-- .container -->
@endsection