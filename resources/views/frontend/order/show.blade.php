@extends('layouts.master')

@section('page_title')
Thông tin đơn hàng
@endsection

@section('content')
<style>
#carouselExampleIndicators {
	display: none;
}
#search-form
{
	display: none;
}
</style>
<div>
	<div class="card">
		<div class="card-header bg-primary">Thông tin đơn hàng</div>
		<div class="card-body row">
			<div class="col-md-6" id="tendererinfo">
				<div class="card">
					<div class="card-header">Thông tin bên mời thầu</div>
					<div class="card-body">
						<p>Tên bên mời thầu:{{$orders->tenderer->name}}</p>
						<p>Email:{{$orders->tenderer->email}}</p>
						<p>Phone:{{$orders->tenderer->phone}}</p>
					</div>
				</div>
			</div>
			<div class="col-md-6" id="contractorinfo">
				<div class="card">
					<div class="card-header">Thông tin bên dự thầu</div>
					<div class="card-body">
						<p>Tên bên mời thầu:{{$orders->contractor->name}}</p>
						<p>Email:{{$orders->contractor->email}}</p>
						<p>Phone:{{$orders->contractor->phone}}</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="card">
		<div class="card-header bg-primary">Thông tin dự án</div>
		<div class="card-body">
			<p>Tên dự án: {{$orders->project->name}}</p>
			<p>Loại dự án: {{$orders->project->category->name}}</p>
			<p>Thời gian bắt đầu: {{$orders->project->timeStart}}</p>
			<p>Thời gian kết thúc: {{$orders->project->timeEnd}}</p>
		</div>
	</div>
	<div class="card">
		<div class="card-header bg-primary">Danh sách sản phẩm</div>
		<div class="card-body">
			<table class="table table-bordered">
				<thead>
					<tr>
						<td>STT</td>
						<td>Tên sản phẩm</td>
						<td>Đơn vị tính</td>
						<td>Số lượng</td>
						<td>Yêu cầu thêm</td>
					</tr>
				</thead>
				@isset($orders->project->products)
				@foreach($orders->project->products as $key =>$row)
				<tbody>
					<tr>
						<td>{{$key+1}}</td>
						<td>{{$row->name}}</td>
						<td>{{$row->unit->name}}</td>
						<td>{{$row->quantity}}</td>
						<td>{{$row->description}}</td>
					</tr>
				</tbody>
				@endforeach
				@endisset
			</table>
		</div>
	</div>
</div>
@endsection