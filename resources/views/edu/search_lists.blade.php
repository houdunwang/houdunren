@extends('edu.layouts.master')
@section('content')
    <div class="row">
        <div class="col-12 col-xl-9">
            <div class="card" data-toggle="lists" data-lists-values="[&quot;name&quot;]">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col">
                            <h4 class="card-header-title">
                                搜索结果
                            </h4>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @include('edu.search._'.$_GET['t'])
                </div>
            </div>
            {{$data->appends(['t'=>$_GET['t'],'w'=>$_GET['w']])->links()}}
        </div>
        <div class="col-12 col-xl-3">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-header-title">
                        公告
                    </h4>
                </div>
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col">
                            <h5 class="mb-0">
                                <a href="" class="text-secondary"> 晚八点直播</a>
                            </h5>
                        </div>
                    </div>
                    <hr>
                    <div class="row align-items-center">
                        <div class="col">
                            <h5 class="mb-0">
                                <a href="" class="text-secondary">新手帮助</a>
                            </h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
