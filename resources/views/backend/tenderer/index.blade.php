@extends('layouts.admin')

@section('page_title')
	Danh sách nhà thầu
@endsection

@section('content')
<h2>Danh sách nhà thầu</h2>

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


<div class="grid-view">
@if (!empty ($tenderes))
	<table border="1" width="600">
		<table class="table">
		  <thead class="thead-dark">
		    <tr>
		      <td scope="col">Tên nhà thầu</td>
		      <td scope="col">Trạng thái</td>
		    </tr>
		  </thead>
					@foreach ($tenderes as $item)
		  <tbody>
		    <tr>
		      <td>{{ $item['name'] }}</td>

		      
		    </tr>
		    
		  </tbody>

		@endforeach
	</table>
@endif


</div>
@endsection
