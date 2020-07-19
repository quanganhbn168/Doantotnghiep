@isset($data)
  <h4>Hiện tại đang có</h4>
  <ul>
    <li>{{$data->count()}} dự án đang đợi nhà thầu</li>
    <li>{{$data->whereMonth('created_at', '=', date('m'))->count()}} dự án được đăng trong 15 ngày qua</li> 
    <li>{{$data->whereDay('created_at', '=', date('d'))->count()}} dự án được đăng trong 24h qua</li> 
  </ul>
@endisset