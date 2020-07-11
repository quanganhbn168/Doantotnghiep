<div class="form-group row">
          <label for="category" class="col-md-4">Loại hàng vận chuyển:</label>
          <select class="form-control col-md-8" name="category" id="category">
            @isset($categories)
              @foreach($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
              @endforeach
            @endisset
          </select>
        </div>
  <div class="form-group row">
          <label for="datepickerhome" class="col-md-4">Thời gian bắt đầu:</label><input id="datepickerhome" class="col-md-8" name="timeStart" width="276" />
        </div>
  <div class="form-group row">
    <label for="keyword" class="col-md-4">Từ khoá tìm kiếm</label>
    <div class="input-group mb-3 col-md-8" style="padding: 0">
    <input type="text" class="form-control" placeholder="Nhập vào thông tin tìm kiếm">
    <div class="input-group-append">
      <button type="submit" class="btn btn-primary">Tìm kiếm</button>
    </div>
    </div>
  </div>
  <script>
    $('#datepickerhome').datepicker({
    format: 'dd/mm/yyyy',
  });
</script>