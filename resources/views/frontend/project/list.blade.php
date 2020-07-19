@extends('layouts.master')

@section('page_title')
Danh sách các dự án
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
		<div class="card-header">Danh sách dự án</div>
		<div class="card-body">
			<table class="table">
				<thead class="bg-primary">
					<tr>
						<td width="5%">Stt</td>
						<td width="50%">Tên dự án</td>
						<td>Ngày tạo</td>
						<td colspan="2" width="10%">Tuỳ chọn</td>
					</tr>
				</thead>
						@foreach($projects as $key=>$project)
				<tbody>
					<tr>
						<td>{{$key+1}}</td>
						<td>
							<a href="{{ route('project.show',['id' =>$project->id]) }}">{{$project->name}}
							</a>
						</td>
						<td>
							{{date('d/m/Y', strtotime($project->created_at))}}
						</td>
						<td><a href="{{ route('project.edit',['id'=>$project->id]) }}" class="btn btn-primary">Cập nhật</a></td>
			  			<td><button type="button" class="btn btn-danger" data-proid="{{$project->id}}" data-toggle="modal" data-target="#delete">Xoá</button></td>
					</tr>
				</tbody>
						@endforeach
			</table>
			{{ $projects->links() }}
		</div>
	</div>
</div>
<!-- Modal delete -->
<div class="modal modal-danger fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Xoá dự án</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <form action="{{ route('project.delete','test') }}" method="POST">
        	@method('DELETE')
        	@csrf
		      <div class="modal-body">
		      	<p class="text-center">
		      		Bạn có chắc chắn muốn xoá dự án này?
		      	</p>
				  	<input type="hidden" name="project_id" id="proid" value="">
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Không</button>
		        <button type="submit" class="btn btn-danger">Có</button>
		      </div>
		</form>
    </div>
	   </div>
</div>
@section('script')

    $('#delete').on('show.bs.modal', function (event) {

      var button = $(event.relatedTarget) // Button that triggered the modal
      var projectId = button.data('proid')
      
      var modal = $(this)
    
      modal.find('.modal-body #proid').val(projectId)   
})
@endsection
@endsection