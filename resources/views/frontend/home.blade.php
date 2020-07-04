@extends('layouts.master')


@section('page_title')
  Trang chủ
@endsection

@section('content')
<div id="content-left" class="col-md-3" style="float: right;">
  @if(Auth::guard('tenderer')->check())
  <div class="list-group" style="margin-bottom: 15px">
    <a href="#" class="list-group-item list-group-item-action active">Dự Án</a>
    <a href="{{route('project.create')}}" class="list-group-item list-group-item-action">Tạo dự án mới</a>
    <a href="{{ route('project.list',['id'=>Auth::guard('tenderer')->user()->id]) }}" class="list-group-item list-group-item-action">Danh sách dự án</a>
    <a href="{{ route('order.list',['id'=>Auth::guard('tenderer')->user()->id]) }}" class="list-group-item list-group-item-action">Danh sách đơn hàng</a>
  </div>
  @endif
  <div class="list-group">
    <a href="#" class="list-group-item list-group-item-action active">
      Loại hàng vận chuyển
    </a>
    @foreach($categories as $key=>$category)
    <a href="#" class="list-group-item list-group-item-action">{{$category->name}}</a>
    @endforeach
  </div>
</div>

<div id="content-main" class="col-md-9" style="float: left;">
	<div>
		<div>
          <span style="border-bottom: 4px #0685d6 solid;
    text-transform: uppercase;
    font-size: 18px;
    color: #0685d6;
    padding-bottom: 0px;
    font-weight: 500;">CÁC DỰ ÁN MỚI NHẤT</span>
    </div>
        <div style="margin-top: 10px;">
        	<table class="table table-bordered">
          <tr>
            <th scope="col">Stt</th>
            <th scope="col">Tên dự án</th>
            <th scope="col">Bên mời thầu</th>
            <th scope="col">Thời gian bắt đầu</th>
            <th scope="col">Thời gian đóng thầu</th>
          </tr>
        
        <tbody>
            @foreach ($projects as $key =>$project)
          <tr>
            <th scope="row">{{ $key + 1 }}</th>
            <td><a href="{{route('project.show',['id' =>$project->id])}}">{{$project->name}}</a></td>
            <td><a href="{{route('tenderer.show',['id' =>$project->tenderer->id])}}">{{$project->tenderer->name}}</a></td>
            <td>{{ \Carbon\Carbon::parse($project->timeStart)->format('d/m/Y')}}</td>
            <td>{{\Carbon\Carbon::parse($project->timeEnd)->format('d/m/Y')}}</td>
          </tr>
          @endforeach
        </tbody>
          </table>
        </div>
	<div ><a href=""><button class="btn btn-info" style="margin-left: 50%">Xem thêm</button></a></div>
  </div>
<div class="news">
  <div class="border-binding" style="border-bottom: 1px #0685d6 solid;
    padding-bottom: 0px;">
    <span style="border-bottom: 4px #0685d6 solid;
    text-transform: uppercase;
    font-size: 18px;
    color: #0685d6;
    padding-bottom: 0px;
    font-weight: 500;">Tin Tức</span>
  </div>
    <div class="list-new">
      @include('frontend.news.index',['data'=>$news ?? null])
    </div>
</div>

@endsection