@extends('layouts.admin')

@section('page_title')Thêm tin tức
@endsection

@section('content')
<h2>Thêm tin mới</h2>
	<div>
		<form action="{{ route('news.store') }}" method="POST">
			@csrf
			<div class="form-group">
				<label for="title-news">Tiêu đề</label>
				<input type="text" class="form-control" name="title-news" id="title-news" required>
			</div>
			<div class="form-group">
				<label for="description">Mô tả</label>
				<input type="text" class="form-control" name="description" id="description" required>
			</div>
			<textarea name="summary-ckeditor" id="summaryckeditor" cols="30" rows="15" required> </textarea>
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