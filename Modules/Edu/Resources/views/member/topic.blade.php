@extends('edu::layouts.member')

@section('content')
<div class="card shadow-sm" id="app">
  <div class="card-header bg-white">
    贴子列表
  </div>
  <div class="card-body ">
    <table class="table ">
      <thead>
        <tr>
          <th>编号</th>
          <th>标题</th>
          <th>发布时间</th>
          <th width="120"></th>
        </tr>
      </thead>
      <tbody>
        @foreach ($topics as $topic)
        <tr>
          <td>{{ $topic['id'] }}</td>
          <td>{{ $topic['title'] }}</td>
          <td>
            {{ $topic->created_at }}
          </td>
          <td>
            <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
              <a href="{{ route('Edu.front.topic.edit',$topic) }}" class="btn btn-info">编辑</a>
              <hd-btn-del action="{{ route('Edu.front.topic.destroy',$topic) }}" class="btn btn-secondary">删除
                </btn-del>
            </div>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    <hr>
    {{ $topics->links() }}
  </div>

</div>
@endsection
