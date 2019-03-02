@extends('layouts.system')
@section('content')
    @include('system.update._tab')
    @if($update['total'])
        <div class="alert alert-success rounded-0">
            本次共需要更新 <span class="badge badge-info">{{$update['total']}}</span> 个文件，请不要关闭窗口
        </div>
        <div class="card">
            <div class="card-header">
                更新日志
            </div>
            <div class="card-body" id="lists" style="max-height: 300px; overflow-y: auto">
                @foreach($update['logs'] as $log)
                    <i class="fa fa-square-o"></i> {{$log}} <br>
                @endforeach
            </div>
        </div>
        <div class="alert alert-danger mt-3 rounded-0">
            <strong>
                <i class="fa fa-exclamation-triangle"></i>
                更新时请注意备份网站数据和相关数据库文件！官方不强制要求用户跟随官方意愿进行更新尝试！
            </strong>
        </div>
        <div id="app" v-cloak="">
            <div class="card">
                <div class="card-header">
                    更新协议
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <label class="col-sm-1 text-right">当前版本</label>
                        <div class="col-sm-8">
                            <div class="form-check pl-0">
                                <i class="fa fa-square-o"></i>
                                <label class="form-check-label" for="exampleCheck1">
                                    Build {{$cloud['build']}}
                                </label>
                            </div>
                            <small>
                                系统会检测当前程序文件的变动, 如果被病毒或木马非法篡改, 会自动警报并提示恢复至默认版本, 因此可能修订日期未更新而文件有变动
                            </small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-1 text-right">更新版本</label>
                        <div class="col-sm-8">
                            <div class="form-check pl-0">
                                <i class="fa fa-square-o"></i>
                                <label class="form-check-label" for="exampleCheck1">
                                    Build {{$update['build']}}
                                </label>
                            </div>
                            <small>
                                系统会检测当前程序文件的变动, 如果被病毒或木马非法篡改, 会自动警报并提示恢复至默认版本, 因此可能修订日期未更新而文件有变动
                            </small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-1 text-right">更新协议</label>
                        <div class="col-sm-8">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" v-model="copyright1">
                                    我已经做好了相关文件的备份工作
                                </label>
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" v-model="copyright2">
                                认同官方的更新行为并自愿承担更新所存在的风险
                                </label>
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" v-model="copyright3">
                                理解官方的辛勤劳动并报以感恩的心态点击更新按钮
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <a href="{{route('cloud.update.download')}}" class="btn btn-success mt-3 rounded-0"
               v-show="canSend">开始执行更新</a>
            <button type="button" disabled class="btn btn-outline-dark mt-3 rounded-0" v-show="!canSend">请先接受所有更新协议</button>
        </div>
    @else
        <div class="card">
            <div class="card-header">
                温馨提示
            </div>
            <div class="card-body">
                <i class="fa fa-info-circle"></i> 当前系统是最新版本。
            </div>
        </div>
    @endif
@endsection
@push('js')
    <script>
        require(['vue'], function (vue) {
            new vue({
                el: "#app",
                data: {
                    copyright1: false,
                    copyright2: false,
                    copyright3: false,
                },
                computed: {
                    canSend() {
                        return this.copyright1 && this.copyright2 && this.copyright3;
                    }
                }
            })
        });
    </script>
@endpush