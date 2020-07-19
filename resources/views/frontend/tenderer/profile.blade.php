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
	    			<img src="" class="col-md-3" alt="">
	    			<div>
	    				<ul>
	    					<li>Tên doand nghiệp:{{$tenderer->name}}</li>
	    					<li>Địa chỉ của nhà thầu:{{$tenderer->address}}</li>
	    					<li>Email:{{$tenderer->email}}</li>
	    					<li>Số điện thoại liên lạc:{{$tenderer->phone}}</li>
	    					<li>Địa chỉ website:{{$tenderer->website}}</li>
	    				</ul>
	    			</div>
	    		</div>
	    	</div>
	    </div>

	    <div class="card recent-project">
	    	<div class="border-binding"><span>CÁC DỰ ÁN GẦN ĐÂY</span></div>
	    	<div class="card-body">
	    		<div class="row">
	    			<img src="" class="col-md-3" alt="">
	    			<div>
	    				<ul>
	    					<li>Tên doand nghiệp:{{$tenderer->name}}</li>
	    					<li>Địa chỉ của nhà thầu:{{$tenderer->address}}</li>
	    					<li>Email:{{$tenderer->email}}</li>
	    					<li>Số điện thoại liên lạc:{{$tenderer->phone}}</li>
	    					<li>Địa chỉ website:{{$tenderer->website}}</li>
	    				</ul>
	    			</div>
	    		</div>
	    	</div>
	    </div>
	</div>
</div>
<style>
#carouselExampleIndicators {
	display: none;
}
#search-form
{
	display: none;
}
.sidebar{
	float: left;
	
	padding: 0px;
}
.sidebar ul{
	border-left: 1px solid #0685d6;
	padding: 0px;
	border-right: 1px solid #0685d6;
}
.sidebar ul li{
	list-style: none;
	border-bottom: 1px solid #0685d6;
}
.sidebar ul li:hover{
	cursor: pointer;
}
.sidebar ul li a{
	text-decoration: none;
	text-align: center;
}

.profile-tenderer{
	float: right;
}
.card{
	margin-bottom: 10px;
	border: none;
}
</style>
@endsection