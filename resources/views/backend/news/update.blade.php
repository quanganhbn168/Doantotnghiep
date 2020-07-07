@extends('layouts.admin')

@section('page_title')Cập nhật tin tức
@endsection

@section('content')
<h2>Cập nhật tin tức</h2>
	<div>
		<form action="{{ route('news.update',[$news->id]) }}" method="POST">
			@csrf
			@method('PUT')
			<div class="form-group">
				<label for="title-news">Tiêu đề</label>
				<input type="text" class="form-control" name="title" id="title-news" value="{{!empty(old('title')) ? old('title') : $news->title}}" required>
			</div>
			<div class="form-group">
				<label for="description">Mô tả</label>
				<input type="text" class="form-control" name="description" id="description"value="{{!empty(old('description')) ? old('description') : $news->description}}"  required>
			</div>
			<textarea name="content" id="summaryckeditor" cols="30" rows="15" required>{{ !empty(old('content')) ? old('content') : $news->content }}</textarea>
			<button type="submit" class=" btn btn-primary">Lưu</button>
		</form>
	</div>
<!-- javascript -->
<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script>
CKEDITOR.replace( 'summaryckeditor', {
    filebrowserUploadUrl: "{{route('upload', ['_token' => csrf_token() ])}}",
    filebrowserUploadMethod: 'form'
});
</script>
<style>
	button{
		margin-top: 5px;
		margin-left: 50%;
	}
</style>
@endsection