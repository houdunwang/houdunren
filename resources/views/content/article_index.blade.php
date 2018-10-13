@extends('layouts.admin')
@section('menu')
    @include('content.layouts.menu')
@endsection
@section('content')
    <div class="row">
        <div class="card col-12">
            <div class="card-body">
                <ul class="nav nav-tabs nav-tabs-sm">
                    <li class="nav-item">
                        <a href="{{route('content.article.index')}}" class="nav-link mr-3 active">
                            文章列表
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('content.select_category')}}" class="nav-link mr-3">
                            发表文章
                        </a>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-nowrap table-sm">
                        <thead>
                        <tr>
                            <th scope="col" width="80">编号</th>
                            <th scope="col">文章标题</th>
                            <th scope="col">作者</th>
                            <th scope="col">所属栏目</th>
                            <th scope="col">内容模型</th>
                            <th scope="col">创建时间</th>
                            <th scope="col" width="80"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($articles as $article)
                            <tr>
                                <td>{{$article['id']}}</td>
                                <td>{{$article['title']}}</td>
                                <td>
                                    <a href="{{route('member.user.show',$article->user)}}">{{$article->user->name}}</a>
                                </td>
                                <td>{{$article->category->title}}</td>
                                <td>{{$article->category->model->title}}</td>
                                <td>{{$article['created_at']->format('Y/m/d')}}</td>
                                <td>
                                    <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                                        <a class="btn btn-white"
                                           href="{{route('content.article.edit',$article)}}">编辑文章</a>
                                        <button type="button" class="btn btn-light" onclick="del(this)">删除文章</button>
                                        <form action="{{route('content.article.destroy',$article)}}" method="post">
                                            @method('DELETE') @csrf
                                        </form>
                                        <a class="btn btn-white"
                                           href="{{route('content.article.edit',$article)}}">预览文章</a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        {{$articles->links()}}
    </div>
@endsection
@push('js')
    <script>
        function del(button) {
            require(['hdjs'], function (hdjs) {
                hdjs.confirm('确定删除吗?', function () {
                    $(button).next('form').submit();
                })
            })
        }
    </script>
@endpush