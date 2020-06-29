@extends('layouts.master')

@section('page_title')
Thông tin đơn hàng
@endsection

@section('content')
<div>
	<div class="card">
		<div class="card-heard bg-primary">Thông tin đơn hàng</div>
		<div class="card-body">
			<div class="col-md-6" id="tendererinfo">
				<div class="card">
					<div class="card-header">Thông tin bên mời thầu</div>
					<div class="card-body">
						<p>Tên bên mời thầu:{{$order->tenderer->name}}</p>
					</div>
				</div>
			</div>
			<div class="col-md-6" id="contractorinfo"></div>
		</div>
	</div>
</div>
@endsection