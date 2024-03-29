@extends('backend.master.master')
@section('title','Chi tiết đơn hàng')
@section('order')
	class="active"
@endsection
@section('content')

	<!--main-->
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home">
							<use xlink:href="#stroked-home"></use>
						</svg></a></li>
				<li class="active">Đơn hàng / Chi tiết đặt hàng</li>
			</ol>
		</div>
		<!--/.row-->
		<div class="row">
			<div class="col-xs-12 col-md-12 col-lg-12">

				<div class="panel panel-primary">
					<div class="panel-heading">Chi tiết đặt hàng</div>
					<div class="panel-body">
						<div class="bootstrap-table">
							<div class="table-responsive">
								<div class="form-group">
									<div class="row">
										<div class="col-md-6">
											<div class="panel panel-blue">
												<div class="panel-heading dark-overlay">Thông tin khách hàng</div>
												<div class="panel-body">
												<strong><span class="glyphicon glyphicon-user" aria-hidden="true"></span> : {{$od->full}}</strong> <br>
													<strong><span class="glyphicon glyphicon-phone" aria-hidden="true"></span> : Số điện thoại: {{$od->phone}}</strong>
													<br>
													<strong><span class="glyphicon glyphicon-send" aria-hidden="true"></span> : {{$od->address}}</strong>
												</div>
											</div>
										</div>
									</div>


								</div>
								<table class="table table-bordered" style="margin-top:20px;">
									<thead>
										<tr class="bg-primary">
											<th>ID</th>
											<th>Thông tin Sản phẩm</th>
											<th>Số lượng</th>
											<th>Giá sản phẩm</th>
											<th>Thành tiền</th>

										</tr>
									</thead>
									<tbody>
										@foreach ($od->product_order as $row)		
										<tr>
										<td>{{$row->id}}</td>
											<td>
												<div class="row">
													<div class="col-md-4">
														<img width="100px" src="backend\img\{{$row->img}}" class="thumbnail">
													</div>
													<div class="col-md-8">
														<p>Mã sản phẩm: {{$row->code}}</p>
														<p>Tên Sản phẩm: <strong>{{$row->name}}</strong></p>
													</div>
												</div>
											</td>
											<td>{{$row->quantity}}</td>
											<td>{{number_format($row->price,0,",",",")}} VNĐ </td>
											<td>{{number_format($row->price*$row->quantity,0,",",",")}} VNĐ</td>

										</tr>
										@endforeach
									</tbody>

								</table>
								<table class="table">
									<thead>
										<tr>
											<th width='70%'>
												<h4 align='right'>Tổng Tiền :</h4>
											</th>
											<th>
												<h4 align='right' style="color: brown;">{{number_format($od->total,0,",",",")}} VNĐ</h4>
											</th>

										</tr>
									</thead>
									<tbody>
									</tbody>
								</table>
								<div class="alert alert-primary" role="alert" align='right'>
									<a oneclick="return processed()" name="" id="" class="btn btn-success" href="/admin/order/paid/{{$od->id}}" role="button">Đã xử lý</a>
								</div>
							</div>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
		</div>
		<!--/.row-->


	</div>
	<!--end main-->
	@endsection
	@section('script')
	@parent
	<script>
		function processed(){
			return confirm("Đơn hàng sau khi xử lí sẽ được tính vào phần doanh thu !");
		}
	</script>
		
	@endsection