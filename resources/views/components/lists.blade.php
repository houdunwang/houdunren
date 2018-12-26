<table class="table table-light"
       data-toggle="table"
       data-click-to-select="true"
       data-show-export="true"
       {{--data-search="true"--}}
       {{--data-show-refresh="true"--}}
       data-show-toggle="true"
       data-show-columns="true"
>
    <thead>
    <tr>
        <th scope="col" width="80" data-field="id" data-checkbox="true">编号</th>
        <th scope="col" width="80">编号</th>
        <th scope="col">文章标题</th>
        <th scope="col">作者</th>
        <th scope="col">所属栏目</th>
        <th scope="col" data-visible="false">内容模型</th>
        <th scope="col" data-visible="false">创建时间</th>
        <th scope="col"></th>
    </tr>
    </thead>
    <tbody>
    @foreach($data as $field)
        <tr>
            <td>{{$field['id']}}</td>
            <td>{{$field['id']}}</td>
            <td>{{$field['title']}}</td>
            <td>
                <a href="{{route('member.user.show',$field->user)}}">{{$field->user->name}}</a>
            </td>
            <td>{{$field->category->title}}</td>
            <td>{{$field->category->model->title}}</td>
            <td>{{$field['created_at']->format('Y/m/d')}}</td>
            <td class="text-right">
                <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                    <a class="btn btn btn-secondary"
                       href="{{route('content.article.edit',$field)}}">编辑文章</a>
                    <button type="button" class="btn btn btn-secondary" onclick="del(this)">删除文章</button>
                    <form action="{{route('content.article.destroy',$field)}}" method="post">
                        @method('DELETE') @csrf
                    </form>
                    <a class="btn btn btn-secondary"
                       href="{{route('content.article.edit',$field)}}">预览文章</a>
                </div>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@push('js')
    <script>
        require(['bootstrapTable'], function (bootstrapTable) {
        })
    </script>
@endpush
