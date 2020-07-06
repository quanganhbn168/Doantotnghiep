
<ul>
	@isset($data)
	@foreach($data as $item)
	<li>
		<div class="news row">
			<div class="col-md-3 image-news">
			<a href="#"><img src="https://picsum.photos/200/300.jpg" alt=""></a>
			</div>
			<div class="col-md-9">
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
		margin: 10px 0px 0px;
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
		font-weight: bold; 
	}
	.image-news{
		padding: 0px;
	}
</style>
