@extends('layouts.admin')

@section('page_title')
	Danh sách nhà thầu
@endsection
@section('style')
<link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
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

@if (session('message'))
    <div class="alert alert-success" role="alert">
        {{ session('message') }}
    </div>
@endif


<!-- Begin Page Content -->
<div class="container-fluid">
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Danh sách nhà thầu</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Tên công ty</th>
              <th>Email</th>
              <th>Phê duyệt vào lúc</th>
              <th>Trạng thái</th>
              <th>Xem thông tin</th>
              <th>Khoá</th>
            </tr>
          </thead>
          <tbody>
          	@isset($tenderers)
          	@foreach($tenderers as $item)
            <tr>
              <td>{{$item->name}}</td>
              <td>{{$item->email}}</td>
              <td>{{$item->approved_at}}</td>
              @if($item->status)
              <td>
              	<span style="background-color: #00fd00;color: #000;">
              		Đang hoạt động
              	</span>
              </td>
              @else
              <td>
              	<span style="background-color: #f8fd00;color: #000;">
              		Đang tạm khoá
              	</span>
              </td>
              @endif
              <td><button class="btn btn-primary"><i class="fas fa-edit"></i></button></td>
              <td><button class="btn btn-danger"><i class="fas fa-lock"></i></button></td>
            </tr>
          </tbody>
          @endforeach
          @endisset
        </table>
      </div>
    </div>
  </div>
</div>
        <!-- /.container-fluid -->
@section('script')
<script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
<script src=" {{asset('js/datatables-demo.js')}} "></script>
@endsection
@endsection
