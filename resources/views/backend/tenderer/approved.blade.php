@extends('layouts.admin',['count_tenderer'=>$count_tenderer,'count_contractor'=>$count_contractor])

@section('page_title')
	Danh sách phê duyệt nhà thầu 
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
      <h6 class="m-0 font-weight-bold text-primary">Danh sách phê duyệt nhà thầu</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr align="center">
              <th>Tên công ty</th>
              <th>Email</th>
              <th>Đăng ký lúc</th>
              <th>Phê duyệt</th>
              <th>Không Phê duyệt</th>
            </tr>
          </thead>
          <tbody>
          	@isset($tenderers)
          	@foreach($tenderers as $item)
            <tr align="center">
              <td>{{$item->name}}</td>
              <td>{{$item->email}}</td>
              <td>{{$item->created_at}}</td>
              <td>
                <a href="{{ route('tenderer.approved', $item->id) }}" class="btn btn-primary btn-sm">Approve</a>
              </td>
              <td><button class="btn btn-danger">Không đồng ý</button></td>
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
