@extends('frontend.master')
@section('content')
<div class="top-brands">
		<div class="container">
			<h3>{{$category->name}}</h3>
			<div class="agile_top_brands_grids">
				@foreach ($products as $product)
						<div class="col-md-3 top_brand_left">
					<div class="hover14 column">
						<div class="agile_top_brand_left_grid">
							<div class="tag">
								{{-- <img src="{{asset('upload/'.$product->image)}}" alt=" " class="img-responsive" /> --}}
							</div>
							<div class="agile_top_brand_left_grid1">
								<figure>
									<div class="snipcart-item block" >
										<div class="snipcart-thumb">
												<a href="{{url('product-details',[$product->id,$product->slug])}}"> <img src="/upload/{{$product->image}}"></a>		
												<p>{{$product->name}}</p>
											<h4>{{$product->price}} <span>{{$product->discounted_price}}</span></h4>
										
										</div>
										<div class="snipcart-details top_brand_home_details">
											<form action="checkout.html" method="post">
												<fieldset>
													<input type="hidden" name="cmd" value="_cart" />
													<input type="hidden" name="add" value="1" />
													<input type="hidden" name="business" value=" " />
													<input type="hidden" name="item_name" value="Fortune Sunflower Oil" />
													<input type="hidden" name="amount" value="7.99" />
													<input type="hidden" name="discount_amount" value="1.00" />
													<input type="hidden" name="currency_code" value="USD" />
													<input type="hidden" name="return" value=" " />
													<input type="hidden" name="cancel_return" value=" " />
													<input type="submit" name="submit" value="Add to cart" class="button" />
												</fieldset>
													
											</form>
									
										
											
										</div>
									</div>
								</figure>
							</div>
						</div>
					</div>
				</div>
				@endforeach
			
				
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
@endsection();
