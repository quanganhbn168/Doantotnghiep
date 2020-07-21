@extends('layouts.master')


@section('page_title')
  Trang chủ
@endsection

@section('content')
<div id="content-left" class="col-md-3" style="float: right;">
  @if(Auth::guard('tenderer')->check())
  <div style="margin-bottom: 15px">
    <div class="border-binding"><span>quản lý dự án</span></div>
    <div class="quick-menu">
      <ul>
      <li><a href="{{route('project.create')}}">Tạo dự án mới</a></li>
      <li>
        <a href="{{ route('project.list',['id'=>Auth::guard('tenderer')->user()->id]) }}">Danh sách dự án
        </a>
      </li>
      <li>
        <a href="{{ route('order.list',['id'=>Auth::guard('tenderer')->user()->id]) }}">Danh sách đơn hàng
        </a>
      </li>
    </ul>
    </div>
    
  </div>
  @endif
  <div class="border-binding"><span>Thông báo</span></div>
  <div id="notifi" class="notifi">
    <div id=title-notifi>Nội dung thông báo</div>
    <div id="content-notifi">
      <ol>
        <li><a href="">Thông báo đóng tiền</a></li>
        <li><a href="">Thông báo nâng cấp dịch vụ</a></li>
        <li><a href="">Thông tin dịch vụ mới</a></li>
        <li><a href="">Bảo trì website</a></li>
      </ol>
    </div>
  </div>
  <div class="border-binding"><span>Quảng cáo</span></div>
  <div id="adv">
    <div class="adv">
      <h3>Liên hệ quảng cáo</h3>
      <ul>
        <li><a href=""><i class="fas fa-phone-alt"></i>096-562-5210</a></li>
        <li><a href=""><i class="fas fa-envelope"></i>Dauthauvanchuyen@gmail.com</a></li>
        <li></li>
      </ul>
    </div>  
  </div>
  <div class="border-binding"><span>Khảo sát nhanh</span></div>
  <div id="survey">
    <div class="survey">
      <p>Theo bạn, website cần triển khai thêm những dịch vụ gì?</p>
    <ul>
      <li>
        <input type="radio" id="caithien" name="binhchon" value="cải thiện dịch vụ hiện tại">
        <label for="caithien">Cải thiện dịch vụ hiện tại</label>
      </li>
      <li>
        <input type="radio" id="dichvurieng" name="binhchon" value="Có dịch vụ riêng">
        <label for="dichvurieng">Thêm dịch vụ khác</label>
      </li>
      <li>
        <input type="radio" id="ykienkhac" name="binhchon"><a href="#">Ý kiến khác(chuyển đến trang góp ý)</a>
      </li>
    </ul>
    
      <button type="submit" class="btn btn-primary">Bình chọn</button>
      <button class="btn btn-default">Bỏ qua</button>
   
    </div>
  </div>
</div>

<div id="content-main" class="col-md-9">
		<div class="border-binding"><span>Các dự án mới nhất</span></div>
        <div style="margin-top: 10px;">
        	<table class="table">
            <thead>
              <tr>
              <th scope="col">Stt</th>
              <th scope="col">Tên dự án</th>
              <th scope="col">Bên mời thầu</th>
              <th scope="col">Thời gian bắt đầu</th>
              <th scope="col">Thời gian đóng thầu</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($data_projects as $key =>$project)
              <tr>
                <th scope="row">{{ $key + 1 }}</th>
                <td><a href="{{route('project.show',['id' =>$project->id])}}">{{$project->name}}</a></td>
                <td><a href="{{route('tenderer.show',['id' =>$project->tenderer->id])}}">{{$project->tenderer->name}}</a></td>
                <td>{{date('d/m/Y',strtotime($project->timeStart))}}</td>
                <td>{{date('d/m/Y',strtotime($project->timeEnd))}}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
	<div>
    <a href="{{ route('project.detail') }}"><button class="btn btn-primary" style="margin-left: 50%">Xem thêm</button></a>
  </div>

<div class="news">
  <div class="border-binding">
    <span>Tin Tức</span>
  </div>
    <div class="list-news">
      @include('frontend.news.index',['data'=>$data_news ?? null])
    </div>
    <div style="margin-bottom: 10px;">
    <a href=""><button class="btn btn-primary" style="margin-left: 50%">Xem thêm</button></a>
    </div>
</div>
</div>
@endsection