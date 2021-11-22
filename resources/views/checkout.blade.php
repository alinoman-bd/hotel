@extends('layouts.app')
@section('content')
@include('includes.common.bradcrum',[
'title' => 'CHECKOUT',
'description' => 'Only one step left to book your room'
])

<section class="section-checkout">
	<div class="container">
		<div class="checkout">

			<p class="checkout_login">Returning customer? <a href="#">Click here to login</a></p>
			<form action="{{route('checkout.post')}}" method="POST" id="checkOutForm">
				{{ csrf_field() }}
				<div class="row">
					<div class="col-md-6">
						<div class="checkout_head">
							<h3>BILLING DETAILS</h3>
							<span>Lorem Ipsum is simply dummy text</span>
						</div>

						<div class="checkout_form">
							<div class="row">
								<div class="col-xs-6 col-sm-6">
									<label>First Name*</label>
									<input type="text" name="name" class="field-text" required
									value="{{auth()->user() ? auth()->user()->name : ''}}"
									{{auth()->user() ? 'disabled' : ''}}>
								</div>

								<div class="col-xs-6 col-sm-6">
									<label>Last Name*</label>
									<input type="text" name="surname" class="field-text" required
									value="{{auth()->user() ? auth()->user()->surname : ''}}"
									{{auth()->user() ? 'disabled' : ''}}>
								</div>

								<div class="col-xs-6 col-sm-6">
									<label>Email Address*</label>
									<input type="text" name="email" class="field-text" required
									value="{{auth()->user() ? auth()->user()->email : ''}}"
									{{auth()->user() ? 'disabled' : ''}}>
								</div>

								<div class="col-xs-6 col-sm-6">
									<label>Phone*</label>
									<input type="text" name="phone" class="field-text" required
									value="{{auth()->user() ? auth()->user()->phone : ''}}"
									{{auth()->user() ? 'disabled' : ''}}>
								</div>
								<div class="col-xs-12 col-sm-12">
									<label>Address</label>
									<textarea class="field-textarea" name="address" {{auth()->user() ? 'disabled' : ''}}
										placeholder="Address"><?=@auth()->user()->adderss ?></textarea>
									</div>
									@if (!auth()->user())
									<h3>Create Account</h3>
									<div class="col-xs-12 col-sm-12">
										<label>Account Password*</label>
										<input type="password" name="password" class="field-text" required>
									</div>

									<div class="col-xs-12 col-sm-12">
										<label>Confirm Password*</label>
										<input type="password" name="confirm_password" class="field-text" required>
									</div>
									@endif
								</div>

							</div>
						</div>

						<div class="col-md-6">

							<div class="checkout_head checkout_margin">
								<h3>Your payment details</h3>
							</div>

							<div class="checkout_form checkout_margin">

								<div class="checkout_cart">
									<!-- ITEM -->

									@if (count($booking))
									@foreach ($booking as $book)
									<div class="cart-item">
										<div class="img">
											<a href="#"><img src="{{asset($book['thumb'])}}" alt=""></a>
										</div>
										<div class="text">
											<div class="row" style="margin: 0">
												<div style="width: 50%; float: left;">
													<a href="#">{{$book['title']}}</a>
													<p> {{$book['number_of_room']}} rooms</span></p>
													<p><span>{{$book['days']}} days</span></p>
													<p> <b>Price : ${{$book['price']}}</b></p>
												</div>
												<div>
													<h6>Bill</h6>
													<p><b>{{$book['calculation']}}</b></p>
													<p><b>{{$book['total_calc']}}</b></p>
													<p>Total : <b>${{$book['total']}}</b></p>
												</div>
											</div>
										</div>
										<a href="{{route('checkout.delete',['room' => $book['id']])}}" class="remove"><i
											class="fa fa-close"></i></a>
										</div>
										@endforeach
										@else
										<p class="alert alert-danger text-center"> No room added to list </p>
										@endif
										<!-- END / ITEM -->
										<div id="comments">
											<ul class="commentlist" style="height: 20px">
												<p style="float: left"><span style="font-size: 22px;
												font-weight: bolder;">Cart Subtotal:</span> ${{$subtotal}}</p>
												<a href="/" class="awe-btn awe-btn-14" style="float: right;">Add Another</a>
											</ul>
										</div>
									</div>

									<div class="checkout_option">
										<ul>
											<li>
												<input type="radio" class="radio payment-methor" name="payment">
												<h6>Direct Bank Transfer</h6>
												<p>Make your payment directly into our bank account. Please use your Order ID as
													the
													payment reference. Your order won’t be shipped until the funds have cleared
													in
												our account.</p>
											</li>
											<li>
												<input type="radio" class="radio payment-methor" name="payment">
												<h6>Cheque Payment</h6>
											</li>
											<li>
												<input type="radio" class="radio payment-methor" name="paysera" id="paysera_payment" value="1">
												<h6>Paysera Payment</h6>
											</li>

											<li>
												<input type="radio" class="radio payment-methor" name="payment">
												<h6>Credit Card</h6>
												<img src="{{asset('images/icon-card.jpg')}}" alt="">
											</li>
										</ul>
									</div>

									<input required="" type="checkbox" style="margin-top: 30px;" id="termsCondition" name="terms_n_condtion" value="1">
									<label for="termsCondition" style="position: relative;
									top: -22px;
									left: 27px;" > I accept <a style="text-decoration: underline;" target="_blank" href="{{route('termsNCondition')}}">Terms & Conditions</a></label>
									<!-- <a >Our Terms & Conditions</a> -->
									<div class="checkout_btn">
										<button class="awe-btn awe-btn-13 btn-order">PLACE ORDER</button>
									</div>
								</div>

							</div>

						</div>
					</form>
				</div>
			</div>
		</section>
		<script type="text/javascript">
			$(document).on('submit','#checkOutForm',function(){
				var data = new FormData( $( 'form#checkOutForm' )[ 0 ] );
				$.ajax({
					processData: false,
					contentType: false,
					data: data,
					type: 'POST',
					url: '{{route('checkout.post')}}',
					success: function(response) {
						if ($("#paysera_payment").prop("checked")) {
							window.location.href = response;
						}else{
							window.location.href = '{{url("/")}}';
						}

					}

				});
				return false;
			});
		</script>
		@endsection