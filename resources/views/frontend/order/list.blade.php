@extends('layouts.master')

@section('page_title')
Danh sách đơn hàng
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
<div class="container-fluid">
	@if(count($errors)>0)
<div class="alert alert-danger">
<ul>
	@foreach($errors->all() as $error)
	<li>{{$error}}</li>
	@endforeach
</ul>
</div>
@endif

@if(\Session::has('success'))
	
	<div class="alert alert-success">
		<p>{{\Session::get('success')}}</p>
	</div>
@endif
	<div class="card">
		<div class="card-header">Danh sách đơn hàng</div>
		<div class="card-body">
			<table class="table">
				<thead class="bg-primary">
					<tr>
						<td width="5%">Stt</td>
						<td width="50%">Tên đơn hàng</td>
						<td>Tình trạng đơn hàng</td>
						<td>Ngày tạo</td>
						<td colspan="2" width="10%">Tuỳ chọn</td>
					</tr>
				</thead>
						@foreach($orders as $key=>$order)
				<tbody>
					<tr>
						<td>{{$key+1}}</td>
						<td><a href="{{ route('order.show',['id' =>$order->id]) }}">{{$order->project->name}}</a></td>
						<td>Đang tiến hành</td>
						<td>{{date('d/m/Y', strtotime($order->created_at))}}</td>
						<td><button type="button" class="btn btn-info" data-catid="{{$order->id}}" data-myname="{{$order->name}}" data-toggle="modal" data-target="#edit">
		      			<span class="glyphicon glyphicon-edit"> Edit</button></td>
			  			<td><button type="button" class="btn btn-danger" data-proid="{{$order->id}}" data-toggle="modal" data-target="#delete"><span class="glyphicon glyphicon-trash"> Delete</button></td>
					</tr>
				</tbody>
						@endforeach
			</table>
			{{ $orders->links() }}
		</div>
	</div>
</div>
@endsection