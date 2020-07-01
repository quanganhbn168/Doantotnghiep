
<ul>
	@isset($data)
	@foreach($data as $item)
	<li>
		<div class="news clearfix">
			<div class="" style="float: left;">
			<a href="#"><img src="https://picsum.photos/200/300.jpg" alt=""></a>
			</div>
			<div class="title" style="float: right;">
			<h6><a href="#">{{$item->title}}</a></h6>
			<span class="description">{{$item->description}}</span>
			</div>
		</div>
	</li>
	
	@endforeach
	@endisset
</ul>
<style>
	.news {
		margin: 10px;
	}
	.news ul li{
		list-style: none;
	}
	.news img{
		width: 170px;
		height: 120px;
	}
	.news a{
		text-decoration: none;
		color: #000;
	}
	h6{
		margin-left: 10px; 
	}
</style>
