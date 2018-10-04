@extends('layouts.admin')
@section('menu')
    @include('chat.layouts.menu')
@endsection
@section('content')
    <form action="">
        @csrf
        @include('chat.layouts._keywords')
        <div class="card" id="base">
            <div class="card-header">
                回复内容
            </div>
            <div class="card-body">
                <div class="card" v-for="(v,i) in contents">
                    <div class="card-body">
                        <div class="form-group">
                            <textarea class="form-control" rows="3" v-model="v.content" required></textarea>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-white btn-sm" @click.prevent="del(i)">删除</button>
                    </div>
                </div>
            </div>
            <div class="card-footer text-muted">
                <button class="btn btn-white btn-sm" @click.prevent="add()">添加回复</button>
                <button class="btn btn-primary btn-sm">保存数据</button>
            </div>
            <textarea name="contents" cols="30" rows="10" hidden>@{{ contents }}</textarea>
        </div>
    </form>
@endsection
@push('js')
    <script>
        require(['vue', 'hdjs'], function (Vue, hdjs) {
            new Vue({
                el: "#base",
                data: {
                    contents: []
                },
                methods: {
                    add() {
                        this.contents.push({content: ''})
                    },
                    del(i) {
                        this.contents.splice(i, 1)
                    }
                }
            })
        })
    </script>
@endpush
