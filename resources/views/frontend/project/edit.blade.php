@extends('layouts.master')

@section('page_title')
Cập nhật dự án
@endsection
@push('styles')
    <link href="{{ asset('css/partial.css') }}" rel="stylesheet">
@endpush
@section('content')
@if(count($errors)>0)
<div class="alert alert-danger">
<ul>
  @foreach($errors->all() as $error)
  <li>{{$error}}</li>
  @endforeach
</ul>
</div>
@endif

@if(\Session::has('success'))
  
  <div class="alert alert-success">
    <p>{{\Session::get('success')}}</p>
  </div>
@endif
<div>
  <div class="card project">
    <div class="card-body">
    <div class="card-header bg-primary">Thông tin dự án</div>
      <form action="{{ route('project.update',['id'=>$project->id]) }}" id="updateproject" method="POST">
        @method('POST')
        @csrf
        <div class="form-group row">
          <label for="tenderername" class="col-md-3">Tên nhà mời thầu</label>
          <label>{{Auth::guard('tenderer')->user()->name}}</label>
        </div>
        <input type="hidden" name="project_id" id="idproject" value="{{$project->id}}">
        
        <div class="form-group row">
          <label for="projectName" class="col-md-3">Tên dự án:</label>
          <input type="text" class="form-control col-md-5" name="projectName" id="projectName" placeholder="Nhập vào tên dự án" value="{{$project->name,old('name')}}">
        </div>
        <div class="form-group row">
          <label for="category" class="col-md-3">Loại hàng vận chuyển:</label>
          <select class="form-control col-md-5" name="category" id="category">
            @isset($categories)
              @foreach($categories as $category)
                <option value="{{$category->id}}" {{ $project->category->id == $category->id ? 'selected="selected"' : '' }}>{{$category->name}}
                </option>
              @endforeach
            @endisset
          </select>
        </div>
        <div class="form-group row">
          <label for="datepicker" class="col-md-3">Thời gian bắt đầu:</label><input id="datepicker" name="timeStart" width="276" value="{{$project->timeStart}}" />
        </div>
        <div class="form-group row">
          <label for="datepicker2" class="col-md-3">Thời gian kết thúc:</label><input id="datepicker2" name="timeEnd" width="276" value="{{$project->timeEnd}}" />
        </div>
        
    <div class="card-header bg-primary">Danh sách sản phẩm</div>
      <div class="form-group">
        <table class="table table-bordered" name="addproduct" id="addproduct">
          <thead>
            <tr>
              <th scope="col">Tên sản phẩm</th>
              <th scope="col">Đơn vị tính</th>
              <th scope="col">Số lượng</th>
              <th scope="col">Yêu cầu thêm</th>
            </tr>
          </thead>
          @if($products || !empty($products))
          <tbody>
          @foreach($products as $product)
            <tr>
              <td>
                <input class="form-control" type="text" id="nameProduct" name="nameProduct[]" placeholder="Nhập vào tên sản phẩm" value="{{$product->name}}">
                <input type="hidden" name="product_id[]" value="{{$product->id}}">
              </td>
              <td>
                <select class="form-control" name="unit[]" id="unit">
                  @isset($units)
                  @foreach($units as $unit)"
                    <option value="{{$unit->id}}" {{ $product->unit->id == $unit->id ? 'selected="selected"' : '' }}>{{$unit->name}}</option>
                  @endforeach
                  @endif
                </select>
              </td>
              <td><input type="number" class="form-control" name="quantity[]" placeholder="Nhập vào số lượng sản phẩm" value="{{$product->quantity}}"></td>
              <td><input type="text" class="form-control" name="description[]" placeholder="Yêu cầu thêm" value="{{$product->description}}"></td>
            </tr>
          @endforeach
          </tbody>
          @endif
          
        </table>
      </div>
        
        <div class="d-flex justify-content-center">
          <button type="submit" id="save" name="save" class="btn btn-primary">Lưu</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
  // Linked date and time picker 
  // start date date and time picker 
  $('#datepicker').datepicker({
    format: 'dd/mm/yyyy',
  });

  // End date date and time picker 
  $('#datepicker2').datepicker({
    format: 'dd/mm/yyyy',
    useCurrent: false 
  });
  
  $(function () {
        $('#datepicker').datepicker();
        $('#datepicker2').datepicker({
            useCurrent: false //Important! See issue #1075
        });
        $("#datepicker").on("dp.change", function (e) {
            $('#datepicker2').data("DatePicker").minDate(e.date);
        });
        $("#datepicker2").on("dp.change", function (e) {
            $('#datepicker').data("DatePicker").maxDate(e.date);
        });
    });


</script>
{{-- <script type="text/javascript">
    //add new collum
$(document).ready(function(){
  var count = 1;
  dynami_field(count);
  function dynami_field(number)
  {
    var html = '<tr>';
    html += '<td><input class="form-control" type="text" name="nameProduct[]" placeholder="Nhập vào tên sản phẩm" ></td>';
    html += '<td><select class="form-control" name="unit[]" id="unit">"@isset($units)""@foreach($units as $unit)"<option value="{{$unit->id}}">{{$unit->name}}</option>"@endforeach""@endisset"</select></td>';
    html +='<td><input type="number" class="form-control" name="quantity[]" placeholder="Nhập vào số lượng sản phẩm"></td>';
    html +='<td><input type="text" class="form-control" name="description[]" placeholder="Yêu cầu thêm"></td>';
    if(number > 1){
      html += '<td><button type="button" name="remove" id="remove" class="btn btn-danger">Xoá</button></td></tr>';
      $('tbody').append(html);
    }
    else
    {
      html += '<td><button type="button" name="add" id="add" class="btn btn-success">thêm</button></td></tr>';
      $('tbody').html(html);
    }
  }

  $('#add').click(function()
  {
    count++;
    dynami_field(count);

  });

  $(document).on('click','#remove',function(){
    count--;
    $(this).closest("tr").remove();
  });
  
  
});
</script> --}}
<!-- <script type="text/javascript">
  $(document).ready(function(){      
      var postURL = "<?php echo url('addmore'); ?>";
      var i=1;  


      $('#add').click(function(){  
           i++;  
           $('#addproduct').append('<tr id="row'+i+'" class="dynamic-added"><td><input type="text" name="name[]" placeholder="Enter your Name" class="form-control name_list" /></td><td><select class="form-control" id="sel1"><option>1</option><option>2</option><option>3</option><option>4</option></select></td><td><input type="number" name="quantities[]" placeholder="Nhập vào số lượng" class="form-control name_list" width="50px" /></td><td><input type="select" name="requests[]" placeholder="Nhập vào yêu cầu thêm" class="form-control name_list" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  
      });  


      $(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id");   
           $('#row'+button_id+'').remove();  
      });  


      $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });


      $('#submit').click(function(){            
           $.ajax({  
                url:postURL,  
                method:"POST",  
                data:$('#add_name').serialize(),
                type:'json',
                success:function(data)  
                {
                    if(data.error){
                        printErrorMsg(data.error);
                    }else{
                        i=1;
                        $('.dynamic-added').remove();
                        $('#add_name')[0].reset();
                        $(".print-success-msg").find("ul").html('');
                        $(".print-success-msg").css('display','block');
                        $(".print-error-msg").css('display','none');
                        $(".print-success-msg").find("ul").append('<li>Record Inserted Successfully.</li>');
                    }
                }  
           });  
      });  


      function printErrorMsg (msg) {
         $(".print-error-msg").find("ul").html('');
         $(".print-error-msg").css('display','block');
         $(".print-success-msg").css('display','none');
         $.each( msg, function( key, value ) {
            $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
         });
      }
    });  




</script> -->
@endsection
