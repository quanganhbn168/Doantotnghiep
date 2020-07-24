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
<div class="container" id="#tag_container">
  <div class="border-binding"><span>Các dự án mới nhất</span></div>
        @include('frontend.project.data_detail',['projects'=>$projects ?? null])
</div>

@endsection

