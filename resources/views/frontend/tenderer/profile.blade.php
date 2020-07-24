@extends('layouts.master')

@section('page_title')
Thông tin bên mời thầu
@endsection

@section('content')
<div class="container">
	<div class="sidebar col-md-3">
		<div class="border-binding"><span>THÔNG TIN</span></div>
		<ul>
			<li><a href="">Thông tin</a></li>
			<li><a href="">Thông tin</a></li>
			<li><a href="">Thông tin</a></li>
		</ul>
		<div class="border-binding"><span>DỰ ÁN</span></div>
		<ul>
			<li><a href="">Thông tin</a></li>
			<li><a href="">Thông tin</a></li>
			<li><a href="">Thông tin</a></li>
		</ul>
	</div>
	<div id="profile-tenderer"  class="col-md-9 profile-tenderer">
	    <div class="card">
	    	<div class="border-binding"><span>THÔNG TIN</span></div>
	    	<div class="card-body">
	    		<div class="row">
	    			<div class="col-md-4">
	    			@if(empty($image))
	    			<form class="m-2" method="post" action="{{ route('upload.image') }}" enctype="multipart/form-data">
			            @csrf
			            <div class="form-group">
							<img src="/images/File_Add.png" alt="" width="150px" height="auto">
			            </div>
			            <div class="form-group">
			
			                <input type="text" class="form-control" id="name" placeholder="Enter file Name" name="name">
			            </div>
			            <div class="form-group">
			                <input id="image" type="file" name="image">
			            </div>
			            <button type="submit" class="btn btn-dark d-block w-75 mx-auto">Upload</button>
			        </form>
			     	@else

			     	<img src="{{$image->path}}" width="150px" height="auto" alt="">
	    			@endif
	    			</div>
	    			
	    			<div class="col-md-8">
	    				<ul>
	    					<li>Tên doanh nghiệp:{{$tenderer->name}}</li>
	    					<li>Địa chỉ của nhà thầu:{{$tenderer->address}}</li>
	    					<li>Email:{{$tenderer->email}}</li>
	    					<li>Số điện thoại liên lạc:{{$tenderer->phone}}</li>
	    					<li>Địa chỉ website: <a href="">{{$tenderer->website}}</a></li>
	    				</ul>
	    			</div>
	    		</div>
	    	</div>
	    </div>

	    <div class="card recent-project">
	    	<div class="border-binding">
	    		<span>CÁC DỰ ÁN GẦN ĐÂY</span>
	    	</div>
	    	<div class="card-body">
	    		
	    	</div>
	    </div>
	</div>
</div>
<style>
	.avatar-pic {
		width: 150px;
		}
#carouselExampleIndicators {
	display: none;
}
#search-form
{
	display: none;
}
.row ul li
{
	list-style: none;
}
.sidebar{
	float: left;
	
	padding: 0px;
}
.sidebar ul{
	padding: 0px;

}
.sidebar ul li{
	list-style: none;
}
.sidebar ul li:hover{
	cursor: pointer;
}
.sidebar ul li a{
	text-decoration: none;
	text-align: center;
	display: block;
}

.profile-tenderer{
	float: right;
}
.card{
	margin-bottom: 10px;
	border: none;
}
/* css button upload */
.upload-btn-wrapper {
  position: relative;
  overflow: hidden;
  display: inline-block;
}
.upload-btn-wrapper:hover{
	cursor: pointer;
}
.row .btn {
  border: 2px solid gray;
  color: gray;
  background-color: white;
  padding: 8px 20px;
  border-radius: 8px;
  font-size: 20px;
  font-weight: bold;
}

.upload-btn-wrapper input[type=file] {
  font-size: 100px;
  position: absolute;
  left: 0;
  top: 0;
  opacity: 0;
}
</style>
@endsection