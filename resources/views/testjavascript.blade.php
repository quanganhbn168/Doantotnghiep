<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>ajax test</title>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
</head>
<body>
<div class="card">
	<div class="card-head bg-primary">Thông tin dự án</div>
	<div class="card-body">
		<form action="" method="POST">
			{{csrf_field()}}
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<div class="form-group">
			    <label for="category">Loại hàng vận chuyển</label>
			    <select class="form-control col-md-5" id="category" data-dependent="subcategory">
			    	@isset($categories)
			    		@foreach($categories as $category)
							<option value="{{$category->id}}">{{$category->name}}</option>
						@endforeach
					@endisset
			    </select>
		  </div>
		  <div class="form-group">
			    <label for="category">Loại hàng vận chuyển</label>
			    <select class="form-control" id="subcategory" name="subcategory">
			    	
			    		
							<option value=""></option>
						
					
			    </select>
		  </div>
		  
		</form>
	</div>
</div>
</body>
</html>




	
<script type="text/javascript">
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $(document).ready(function () {
             
                $('#category').on('change',function(e) {
                 
                 var cat_id = e.target.value;

                 $.ajax({
                       
                       url:"{{ route('testajax') }}",
                       type:"POST",
                       data: {
                           cat_id: cat_id
                        },
                      
                       success:function (data) {

                        $('#subcategory').empty();

                        $.each(data.subcategories[0].subcategories,function(index,subcategory){
                            
                            $('#subcategory').append('<option value="'+subcategory.id+'">'+subcategory.name+'</option>');
                        })

                       }
                   })
                });

            });
        </script>

