@extends('layouts.master')
@section('page_title')
Danh sách các dự án
@endsection
@push('style')
<link rel="stylesheet" href="{{ asset('css/detail.css') }}">
@endpush
@section('content')
<style>
.detail-table a {
  text-decoration: none;
}
#carouselExampleIndicators{
  display: none;
}
</style>
<div class="container">
  <div class="border-binding"><span>Các dự án mới nhất</span></div>
        <div style="margin-top: 10px;">
          <table class="table detail-table">
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
              @isset($projects)
                @foreach ($projects as $key =>$project)
              <tr>
                <th scope="row">{{ $key + 1 }}</th>
                <td><a href="{{route('project.show',['id' =>$project->id])}}">{{$project->name}}</a></td>
                <td><a href="{{route('tenderer.show',['id' =>$project->tenderer->id])}}">{{$project->tenderer->name}}</a></td>
                <td>{{ \Carbon\Carbon::parse($project->timeStart)->format('d/m/Y')}}</td>
                <td>{{\Carbon\Carbon::parse($project->timeEnd)->format('d/m/Y')}}</td>
              </tr>
              @endforeach
              @endisset
            </tbody>
          </table>
          {{$projects->links()}}
  </div>
</div>

@endsection

