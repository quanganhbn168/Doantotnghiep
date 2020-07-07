@extends('layouts.admin')

@section('page_title')
	 Quản lý Tin tức
@endsection

@section('content')
<h2>Tin tức</h2>

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
<a href="{{ route('news.create') }}"><button type="button" style="float: right;margin-bottom: 2px;" class="btn btn-primary"><i class="fas fa-plus"></i> Thêm
</button>
</a>
	<table border="1" width="600">
		<table class="table">
		  <thead class="thead-dark">
		    <tr>
		      <th scope="col">Tên sản phẩm</th>
		      <th scope="col" colspan="2" style="width: 25%;text-align: center;">Action</th>
		    </tr>
		  </thead>
					
		  <tbody>
			@if (!empty ($data))
		      @foreach ($data as $item)
		    <tr>
		      <td><a href="{{ route('news.show',[$item->id]) }}">{{ $item['title'] }}</a></td>
		      <td><a href="{{ route('news.edit',[$item->id]) }}">
		      	<button type="button" class="btn btn-info"><i class="fas fa-edit"></i>Edit
		      	</button></a>
		      </td>
			  <td><button type="button" class="btn btn-danger" data-newsId="{{$item->id}}" data-toggle="modal" data-target="#delete"><i class="fas fa-trash-alt"></i>Delete</button></td>
		    </tr>
			  @endforeach
			@endif
		    
		  </tbody>
	</table>
	{{$data->links()}}
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
        <form action="{{ route('news.destroy','test')}}" method="POST">
        	@method('DELETE')
        	@csrf
		      <div class="modal-body">
		      	<p class="text-center">
		      		Bạn có chắc chắn muốn xoá tin tức này?
		      	</p>
				  	<input type="hidden" name="news_id" id="newsid" value="">
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Không</button>
		        <button type="submit" class="btn btn-danger">Có</button>
		      </div>
		</form>
    </div>
	   </div>
</div>
<style>
	.table tbody a{
		text-decoration: none;
	}
</style>
@endsection
