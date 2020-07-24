@extends('layouts.master')

@section('page_title')
Kết quả tìm kiếm
@endsection

@section('content')
<div>
	<p>Có {{$projects->count()}} kết quả</p>
	<table class="table table-bordered">
		<thead>
			<td>Tên dự án</td>
			<td>Nhà mời thầu</td>
			<td>Thời gian mở thầu</td>
			<td>Thời gian đóng thầu</td>
		</thead>
		<tbody>
			@isset($projects)
			@foreach($projects as $project)
			<tr>
				<td>{{$project->name}}</td>
				<td>{{$project->tenderer->name}}</td>
				<td>{{$project->timeStart}}</td>
				<td>{{$project->timeEnd}}</td>
			</tr>
			@endforeach
			@endisset
		</tbody>
	</table>
</div>
@endsection