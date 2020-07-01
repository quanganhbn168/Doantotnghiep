@extends('layouts.admin')

@section('page_title')
	News
@endsection

@section('content')
<h2>News</h2>

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
<button type="button" style="float: right;margin-bottom: 2px;" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><span class="glyphicon glyphicon-plus"> Thêm
</button>
@if (!empty ($data))
	<table border="1" width="600">
		<table class="table">
		  <thead class="thead-dark">
		    <tr>
		      <th scope="col">Tên sản phẩm</th>
		      <th scope="col" colspan="2" style="width: 20%;text-align: center;">Action</th>
		    </tr>
		  </thead>
					@foreach ($data as $item)
		  <tbody>
		    <tr>
		      <td>{{ $item['name'] }}</td>
		      <td><button type="button" class="btn btn-info" data-catid="{{$item->id}}" data-myname="{{$item->name}}" data-toggle="modal" data-target="#edit">
		      	<span class="glyphicon glyphicon-edit"> Edit</button></td>
			  <td><button type="button" class="btn btn-danger" data-catid="{{$item->id}}" data-toggle="modal" data-target="#delete"><span class="glyphicon glyphicon-trash"> Delete</button></td>
		    </tr>
		    
		  </tbody>

		@endforeach
	</table>
@endif
<!-- Modal create -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Thêm</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <form action="{{ route('category.store')}}" method="POST">
        	@csrf
      <div class="modal-body">
		  <div class="form-group">
		  	
		    <label for="category">Tên Danh Mục</label>
		    <input type="text" class="form-control" id="category" name='name'>
		  </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
        <button type="submit" class="btn btn-primary">Thêm</button>
      </div>
		</form>
    </div>
	   </div>
</div>


<!-- Model Edit -->
<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cập nhật</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <form action="{{ route('category.update','test')}}" method="POST">
        	@method('PUT')
        	@csrf
		      <div class="modal-body">
				  <div class="form-group">
				  	<input type="hidden" name="category_id" id="catid" value="">
				    <label for="category">Tên Danh Mục</label>
				    <input type="text" class="form-control" id="category" name='name'>
				  </div>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
		        <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
		      </div>
		</form>
    </div>
	   </div>
</div>

<!-- Modal delete -->
<div class="modal modal-danger fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Xoá danh mục</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <form action="{{ route('category.destroy','test')}}" method="POST">
        	@method('DELETE')
        	@csrf
		      <div class="modal-body">
		      	<p class="text-center">
		      		Bạn có chắc chắn muốn tin tức này?
		      	</p>
				  	<input type="hidden" name="category_id" id="catid" value="">
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Không</button>
		        <button type="submit" class="btn btn-danger">Có</button>
		      </div>
		</form>
    </div>
	   </div>
</div>



</div>
@endsection
