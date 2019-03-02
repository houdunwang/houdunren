@extends('layouts.module')
@section('content')
    @include('module.text._tab')
    <div class="card">
        <div class="card-header">
            微信文本回复列表
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>#编号</th>
                    <th>描述</th>
                    <th>关键词</th>
                    <th>回复内容</th>
                    <th>更新时间</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($texts as $text)
                    <tr>
                        <td>{{$text['id']}}</td>
                        <td>{{$text->keyword['title']}}</td>
                        <td>
                            <span class="badge badge-primary">{{$text->keyword->key??''}}</span>
                        </td>
                        <td>{{$text->updated_at->format('Y-m-d')}}</td>
                        <td class="text-right">
                            <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                                <a class="btn btn-outline-success"
                                   href="{{module_link('module.text.edit',$text)}}">编辑文本消息</a>
                                <button type="button" class="btn btn-outline-secondary" onclick="destroy(this,'确定删除吗')">
                                    删除文本消息
                                </button>
                                <form action="{{module_link('module.text.destroy',$text)}}" method="post">
                                    @csrf @method('DELETE')
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="mt-3">
        {{$texts->appends(['sid'=>\site()['id'],'mid'=>\module()['id']])->links()}}
    </div>
@endsection