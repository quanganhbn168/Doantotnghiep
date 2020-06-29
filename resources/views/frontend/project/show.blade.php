@extends('layouts.master')


@section('page_title')
	Thông tin dự án
@endsection
@section('content')
	<div class="container">
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
		<!-- Thông tin của nhà thầu -->
		<div class="card">
		  <div class="card-header bg-primary text-white">Thông tin dự án</div>
		  <div class="card-body">
		  	<div class="row">
		  	<label class="col-md-3">Tên bên mời thầu:</label>
		  	<span class="col-md-9">{{$project->tenderer->name}}</span>
		  	</div>
		  	<div class="row">
		  	<label class="col-md-3">Tên dự án:</label>
		  	<span class="col-md-9">{{$project->name}}</span>
		  	</div>
		  	<div class="row">
		  	<label class="col-md-3">Thời gian bắt đầu:</label>
		  	<span class="col-md-9">{{\Carbon\Carbon::parse($project->timeStart)->format('d/m/Y')}}</span>
		  	</div>
		  	<div class="row">
		  	<label class="col-md-3">Thời gian kết thúc:</label>
		  	<span class="col-md-9">{{\Carbon\Carbon::parse($project->timeEnd)->format('d/m/Y')}}</span>
		  	</div>
		  	<div class="row">
		  	<label class="col-md-3">Loại dự án:</label>
		  	<span class="col-md-9">{{$project->category->name}}</span>
		  	</div>
		  </div>
		</div>
		<!-- Danh sách các sản phẩm -->
		<div class="card">
		  <div class="card-header bg-primary text-white">Danh sách các sản phẩm</div>
		  <div class="card-body">
		  	<table class="table">
		  		<tr>
		  			<td>Stt</td>
		  			<td>Tên sản phẩm</td>
		  			<td>Đơn vị tính</td>
		  			<td>Số lượng</td>
		  			<td>Yêu cầu thêm</td>
		  		</tr>
		  		@foreach($products as $index => $product)
		  		<tr>
		  			<td>{{ $index+1 }}</td>
		  			<td>{{ $product->name }}</td>
		  			<td>{{ $product->unit->name }}</td>
		  			<td>{{ $product->quantity }}</td>
		  			<td>{{ $product->description }}</td>
		  		</tr>
		  		@endforeach
		  	</table>
		  	@if(Auth::guard('contractor')->check())
		  	<div style="position: absolute;left: 50%;margin-left: -50px; margin-bottom: 50px;">
		  		<button type="button" class="btn btn-primary"data-toggle="modal" data-projectid="{{$project->id}}" data-contracid="{{Auth::guard('contractor')->user()->id}}" data-target="#joinModal" >
		  		Đăng ký dự thầu
		  		</button>
		  	</div>
		  	@endif
		</div>
	</div>
<div class="card" id="contractor" style="margin-top: 50px">
			<div class="card-header bg-primary">Danh sách các nhà thầu tham gia dự thầu</div>
			<div class="card-body">
				<table class="table table-bordered">
					<thead align="center">
						<td>Stt</td>
						<td>Tên Nhà thầu</td>
						<td colspan="2" width="30%">Tuỳ chọn</td>
					</thead>

					@foreach($project->contractors as $key => $row)
					<tbody>
						<td align="center">{{$key+1}}</td>
						<td><a href="">{{$row->name}}</a></td>
						<td>
							<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#projectdetail" data-contractorid="{{$row->pivot->contractor_id}}" data-contractorname="{{$row->name}}" data-price="{{$row->pivot->price}}" data-service="{{$row->pivot->service}}">Xem chi tiết
							</button>
						</td>
						@if(Auth::guard('tenderer')->check())
						@if(Auth::guard('tenderer')->user()->id== $project->tenderer->id )
						<td>
							<button type="button" class="btn btn-success" data-toggle="modal" data-target="#createorder" data-contractorid="{{$row->pivot->contractor_id}}" data-projectid="{{$row->pivot->project_id}}" data-contractorname="{{$row->name}}" data-price="{{$row->pivot->price}}" data-service="{{$row->pivot->service}}">Chọn nhà thầu
							</button>
						</td>
						@endif
						@endif
					</tbody>
					@endforeach
				</table>
			</div>
		</div>
@if(Auth::guard('contractor')->check())
<!-- The Modal joinproject -->
  <div class="modal" id="joinModal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Tham gia dự ấn</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <form action="{{ route('contractor.join') }}" method="POST">
        	@csrf
        <!-- Modal body -->
        <div class="modal-body">
          <div class="form-group row">
          	<input type="hidden" name="contractor_id" id="contractorid" value="">
          	<input type="hidden" name="project_id" id="projectid" value="">
          	<label>Tên nhà dự thầu:</label>
          	<label>{{Auth::guard('contractor')->user()->name}}</label>
          </div>
          <div class="form-group">
          	<label>Giá dự thầu:</label>
          	<input class="form-control" type="number" name="price" id="price">
          </div>
          <div class="form-group row">
          	<label>Dịch vụ thêm:</label>
          	<textarea class="form-control" name="service" id="service" cols="35" rows="5"></textarea>
          </div>
        </div>
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Để suy nghĩ tiếp đã</button>
          <button type="submit" class="btn btn-success">Tham gia</button>
        </div>
        </form>
        
      </div>
    </div>
  </div>
 @endif
<!-- Modal detail project -->
<div class="modal fade" id="projectdetail" tabindex="-1" role="dialog" aria-labelledby="projectdetailLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="projectdetailLabel">Thông tin dự thầu</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <form action="{{ route('contractor.project.update','test') }}" method="POST">
        	@csrf
        	@method('PUT')
      <div class="modal-body">
        	<div class="form-group">
        		<input type="hidden" name="contractor_id" id="conid" value="">
        		<input type="hidden" name="project_id" id="proid" value="">
        		<label>Tên nhà dự thầu:</label>
        		<input class="form-control" type="text" name="contractor_name" id="contractorName" readonly>
        		<label>Giá dự thầu:</label>
        		<input class="form-control" type="text" name="price" id="price" readonly>
        		<label>Dịch vụ thêm</label>
        		<textarea disabled class="form-control" name="service" id="service" cols="35" rows="5"></textarea >
        	</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
        </form>
    </div>
  </div>
</div>
<!-- end Modal detail project -->

<!-- create a order -->
<div class="modal fade" id="createorder" tabindex="-1" role="dialog" aria-labelledby="projectdetailLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="projectdetailLabel">Thông tin dự thầu</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <form action="{{ route('create.order') }}" method="POST">
        	@csrf	
      <div class="modal-body">
        	<div class="form-group">
        		<input type="hidden" name="contractor_id" id="conid" value="">
        		<input type="hidden" name="project_id" id="proid" value="">
        		
        		<input type="hidden" name="contractor_name" id="contractorName" readonly>
        		
        		<input type="hidden" name="price" id="price" readonly>
        		
        		<textarea hidden="" class="form-control" name="service" id="service" cols="35" rows="5"></textarea >
        		<p>Bạn chắc chắn muốn chọn nhà thầu này làm đối tác chứ???</p>
        	</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Từ từ để nghĩ đã</button>
        <button type="submit" class="btn btn-success">OK, chọn nhà thầu này</button>
      </div>
        </form>
    </div>
  </div>
</div>
<!-- end create a order -->
@endsection

@section('script')
<!-- Modal join -->
$('#joinModal').on('show.bs.modal', function (event) {

      var button = $(event.relatedTarget) // Button that triggered the modal
      var contractorId = button.data('contracid')
      var projectId = button.data('projectid');
      var modal = $(this)
    
      modal.find('.modal-body #contractorid').val(contractorId)   
      modal.find('.modal-body #projectid').val(projectId)   
})

<!-- modadl detai -->
$('#projectdetail').on('show.bs.modal', function (event) {

  var button = $(event.relatedTarget) // Button that triggered the modal
  var contractorId = button.data('contractorid')
  var contractorName = button.data('contractorname')
  var price = button.data('price')
  var service = button.data('service')

  var modal = $(this)

  modal.find('.modal-body #conid').val(contractorId)
  modal.find('.modal-body #contractorName').val(contractorName)
  modal.find('.modal-body #price').val(price)
  modal.find('.modal-body #service').val(service)
})
<!-- modal create order -->

$('#createorder').on('show.bs.modal', function (event) {

  var button = $(event.relatedTarget) // Button that triggered the modal
  var contractorId = button.data('contractorid')
  var contractorName = button.data('contractorname')
  var price = button.data('price')
  var service = button.data('service')
  var projectId = button.data('projectid')
  var modal = $(this)

  modal.find('.modal-body #conid').val(contractorId)
  modal.find('.modal-body #contractorName').val(contractorName)
  modal.find('.modal-body #price').val(price)
  modal.find('.modal-body #service').val(service)
  modal.find('.modal-body #proid').val(projectId)
})
@endsection