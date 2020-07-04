<div class="form-group row">
          <label for="category" class="col-md-3">Loại hàng vận chuyển:</label>
          <select class="form-control col-md-5" name="category" id="category">
            @isset($categories)
              @foreach($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
              @endforeach
            @endisset
          </select>
        </div>
  <div class="form-group row">
    <label for="datepicker" class="col-md-3">Thời gian công bố:</label><input class="form-control col-md-5" id="datepicker" name="timeStart" />
  </div>
  <div class="form-group row">
    <label for="keyword" class="col-md-3">Từ khoá tìm kiếm</label>
    <div class="input-group mb-3 col-md-5" style="padding: 0">
    <input type="text" class="form-control" placeholder="Nhập vào thông tin tìm kiếm">
    <div class="input-group-append">
      <button type="submit" class="btn btn-primary">Tìm kiếm</button>
    </div>
    </div>
  </div>