@extends('layouts.admin')

@section('page_title')
	 Quản lý Tin tức
@endsection

@section('content')
<h2><a href="{{ route('news.index') }}">Tin tức</a></h2>
<div class="show-news">
	<h6>{{$news->title}}</h6>
	<span>{{$news->description}}</span>
	<span>{!!$news->content!!}</span>
</div>
@endsection