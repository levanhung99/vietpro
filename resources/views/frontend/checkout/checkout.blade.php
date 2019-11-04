@extends('frontend.master.master')
@section('title','Checkout')
@section('content')
		<!-- main -->

		<div class="colorlib-shop">
				<div class="container">
					<div class="row row-pb-md">
						<div class="col-md-10 col-md-offset-1">
							<div class="process-wrap">
								<div class="process text-center active">
									<p><span>01</span></p>
									<h3>Giỏ hàng</h3>
								</div>
								<div class="process text-center active">
									<p><span>02</span></p>
									<h3>Thanh toán</h3>
								</div>
								<div class="process text-center">
									<p><span>03</span></p>
									<h3>Hoàn tất thanh toán</h3>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-7">
							<form method="post" class="colorlib-form">
								@csrf
								<h2>Chi tiết thanh toán</h2>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="fname">Họ & Tên</label>
											<input name="full" type="text" id="fname" class="form-control" placeholder="First Name">
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<label for="fname">Địa chỉ</label>
											<input name="address" type="text" id="address" class="form-control"
												placeholder="Nhập địa chỉ của bạn">
										</div>
									</div>
	
									<div class="form-group">
										<div class="col-md-6">
											<label for="email">Địa chỉ email</label>
											<input name="email" type="email" id="email" class="form-control"
												placeholder="Ex: youremail@domain.com">
										</div>
										<div class="col-md-6">
											<label for="Phone">Số điện thoại</label>
											<input name="phone" type="text" id="zippostalcode" class="form-control"
												placeholder="Ex: 0123456789">
										</div>
									</div>
									<div class="form-group">
										<div class="col-md-12">
	
										</div>
									</div>
								</div>
							
						</div>
						<div class="col-md-5">
							<div class="cart-detail">
								<h2>Tổng Giỏ hàng</h2>
								<ul>
									<li>
	
										<ul>
											@foreach ($cart as $row)
										<li><span>{{ $row->qty }} x {{ $row->name }}</span> <span>{{ number_format($row->qty*$row->price,0,"",".") }} VND</span></li>
										
											@endforeach
											
										</ul>
									</li>
	
								<li><span>Tổng tiền đơn hàng</span> <span>{{ $total }} VND</span></li>
								</ul>
							</div>
	
							<div class="row">
								<div class="col-md-12">
									<p><button type="submit" class="btn btn-primary">Thanh Toán</button></p>
								</div>
							</div>
						</div>
					</form>
					</div>
				</div>
			</div>
	
			<!-- end main -->

@endsection
