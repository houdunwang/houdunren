@extends('layouts.admin')
@section('content')
    <form action="{{route('edu.tag.store')}}" method="post">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <ul class="nav nav-tabs nav-tabs-line nav-tabs-line-success nav-tabs-bold" role="tablist">
                            <li class="nav-item">
                                <a href="{{route('edu.tag.index')}}"
                                   class="nav-link {{active_class(if_route('edu.tag.index'))}}">
                                    标签列表
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('edu.tag.create')}}"
                                   class="nav-link {{active_class(if_route('edu.tag.create'))}}">
                                    新增标签
                                </a>
                            </li>
                        </ul>
                        @include('edu.tag.layouts._tag')
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-primary btn-sm" type="submit">保存提交</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
