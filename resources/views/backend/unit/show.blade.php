@extends('backend.index')

@section('page_title')
	Đơn vị tính
@endsection

@section('content')
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

	<h2>Đơn vị tính</h2>
	<div class="grid-view">
	<button type="button" style="float: right;margin-bottom: 2px;" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><span class="fas fa-plus"> Thêm
	</button>
	@if (!empty ($data))
		<table border="1" width="600">
			<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Tên sản phẩm</th>
      <th scope="col" colspan="2" style="width: 25%;text-align: center;">Action</th>
    </tr>
  </thead>
			@foreach ($data as $item)
  <tbody>
    <tr>
      <td>{{ $item['name'] }}</td>
      <td><button class="btn btn-primary" data-nameunit="{{$item->name}}" data-mydes="{{$item->description}}" data-unitid="{{$item->id}}" data-toggle="modal" data-target="#edit"><i class="fas fa-edit"></i> Edit</button></td>
	  <td><button class="btn btn-danger" data-unitid="{{$item->id}}" data-toggle="modal" data-target="#delete"><i class="fas fa-trash-alt"></i> Delete</button></td>
    </tr>
    
  </tbody>

			@endforeach
		</table>
	@endif
	<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Thêm đơn vị tính</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <form action="{{ route('unit.store')}}" method="POST">
        	@csrf
      <div class="modal-body">
		  <div class="form-group">
		    <label for="unit">Đơn vị tính:</label>
		    <input type="text" class="form-control" id="unit" name='name'>
		  </div>
		  <div class="form-group">
		    <label for="des">Mô tả</label>
		    <input type="text" class="form-control" id="des" name='description'>
		  </div>
		  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Thêm</button>
      </div>
    </div>
		</form>
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
        <form action="{{ route('unit.update','test')}}" method="POST">
        	@method('PUT')
        	@csrf
		      <div class="modal-body">
				  <div class="form-group">
				  	<input type="hidden" name="unit_id" id="unitid" value="">
				    <div class="form-group">
					    <label for="unit">Đơn vị tính:</label>
					    <input type="text" class="form-control" id="unit" name='name'>
					  </div>
					  <div class="form-group">
					    <label for="des">Mô tả</label>
					    <input type="text" class="form-control" id="des" name='description'>
					  </div>
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
<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Xoá danh mục</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <form action="{{ route('unit.destroy','test')}}" method="POST">
        	@method('DELETE')
        	@csrf
		      <div class="modal-body">
		      	<p class="text-center">
		      		Bạn có chắc chắn muốn xoá danh mục này?
		      	</p>
				  	<input type="hidden" name="unit_id" id="unitid" value="">
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