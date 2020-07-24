<div style="margin-top: 10px;" id="table_data">
          <table class="table detail-table">
            <thead>
              <tr>
                <th scope="col">Stt</th>
                <th scope="col">Tên dự án</th>
                <th scope="col">Bên mời thầu</th>
                <th scope="col">Thời gian bắt đầu</th>
                <th scope="col">Thời gian đóng thầu</th>
              </tr>
            </thead>
            <tbody>
              @isset($projects)
                @foreach ($projects as $key =>$project)
              <tr>
                <th scope="row">{{ $key + 1 }}</th>
                <td><a href="{{route('project.show',['id' =>$project->id])}}">{{$project->name}}</a></td>
                <td><a href="{{route('tenderer.show',['id' =>$project->tenderer->id])}}">{{$project->tenderer->name}}</a></td>
                <td>{{date('d/m/Y', strtotime($project->timeStart))}}</td>
                <td>{{date('d/m/Y', strtotime($project->timeEnd))}}</td>
              </tr>
              @endforeach
              @endisset
            </tbody>
          </table>
          {{$projects->render()}}
        </div>
<script type="text/javascript">
        $(window).on('hashchange', function() {
            if (window.location.hash) {
                var page = window.location.hash.replace('#', '');
                if (page == Number.NaN || page <= 0) {
                    return false;
                }else{
                    getData(page);
                }
            }
        });

        $(document).ready(function()
        {
            $(document).on('click', '.pagination a',function(event)
            {
                event.preventDefault();

                $('li').removeClass('active');
                $(this).parent('li').addClass('active');

                var myurl = $(this).attr('href');
                var page=$(this).attr('href').split('page=')[1];

                getData(page);
            });

        });

        function getData(page){
            $.ajax(
            {
                url: '/project/fetch_detail?page=' + page,
                success:function(data)
                {
                  $('#table_data').html(data);
                }
            });
        }
</script>