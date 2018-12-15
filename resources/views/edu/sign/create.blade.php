@extends('layouts.web')
@section('menu')
    @include('edu.layouts._menu')
@endsection
@section('content')
    <div class="container {{route_class()}}">
        @if ($todaySign)
            <div class="card mt-5">
                <div class="card-body">
                    <h5 class="text-muted">您今天已经签到过了或者签到时间还未开始</h5>
                    <p class="small">
                        您上次签到时间: <span class="text-danger">{{$todaySign['created_at']}}</span> <br>
                        您的总签到天数: <span class="text-danger">{{$userSignInfo['total']}}</span> 天 <br>
                        您本月签到天数:: <span class="text-danger">{{$userSignInfo['month']}}</span> 天
                    </p>
                </div>
            </div>
        @else
            <form action="{{route('edu.sign.store')}}" method="post" onsubmit="return post(event)">
                @csrf
                <div class="card mt-5">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="content">我今天最想说</label>
                            <input type="text" name="content" id="content" class="form-control" required
                                   placeholder="你今天的心情或最想说的话">
                        </div>
                        <ul class="moods">
                            <li>
                                <label>
                                    <input hidden type="radio" name="mood" value="kx">
                                    <img src="/images/emot/kx.gif">
                                </label>
                            </li>
                            <li>
                                <label>
                                    <input hidden type="radio" name="mood" value="ng">
                                    <img src="/images/emot/ng.gif">
                                </label>
                            </li>
                            <li>
                                <label>
                                    <input hidden type="radio" name="mood" value="ym">
                                    <img src="/images/emot/ym.gif">
                                </label>
                            </li>
                            <li>
                                <label>
                                    <input hidden type="radio" name="mood" value="wl">
                                    <img src="/images/emot/wl.gif">
                                </label>
                            </li>
                            <li>
                                <label>
                                    <input hidden type="radio" name="mood" value="nu">
                                    <img src="/images/emot/nu.gif">
                                </label>
                            </li>
                            <li><label>
                                    <input hidden type="radio" name="mood" value="ch">
                                    <img src="/images/emot/ch.gif">
                                </label>
                            </li>
                            <li><label>
                                    <input hidden type="radio" name="mood" value="fd">
                                    <img src="/images/emot/fd.gif">
                                </label>
                            </li>
                            <li>
                                <label>
                                    <input hidden type="radio" name="mood" value="yl">
                                    <img src="/images/emot/yl.gif">
                                </label>
                            </li>
                            <li>
                                <label>
                                    <input hidden type="radio" name="mood" value="shuai">
                                    <img src="/images/emot/shuai.gif">
                                </label>
                            </li>
                        </ul>
                    </div>
                    <div class="card-footer text-muted">
                        <button class="btn btn-success" id="signButton">开始签到</button>
                    </div>
                </div>
            </form>
        @endif

        <div class="card mt-5">
            <div class="card-body">
                <ul class="nav nav-classic">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">今日签到排行</a>
                    </li>
                </ul>
                <table class="table table-bordered text-muted mt-5" style="font-size:14px;">
                    <thead>
                    <tr>
                        <th>会员</th>
                        <th>今日签到时间</th>
                        <th>总签到天数</th>
                        <th>月签到天数</th>
                        <th>签到心情</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($signs as $sign)
                        <tr>
                            <td>
                                <a href="{{route('member.user.show',$sign->user)}}" class="text-primary">
                                    {{--<img class="u-sm-avatar rounded-circle mr-1" src="{{$sign->user->avatar}}">--}}
                                    {{$sign->user->name}}</a>
                            </td>
                            <td>{{$sign->created_at}}</td>
                            <td>{{$sign->info->total}}</td>
                            <td>{{$sign->info->month}}</td>
                            <td>
                                <img class="u-sm-avatar" src="/images/emot/{{$sign['mood']}}.gif">
                                {{$sign['content']}}
                                @can('Edu-sign')
                                    <button class="btn btn-primary btn-xs"
                                            onclick="confirm('确定删除吗?')?$(this).next().submit():'';">删除
                                    </button>
                                    <form action="{{route('edu.sign.destroy',$sign)}}" method="post" hidden>
                                        @csrf @method('DELETE')
                                    </form>
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script>
        require(['jquery'], function ($) {
            $(".moods li").click(function () {
                $(".moods li").removeClass('active');
                $(this).addClass('active');
            })
        });
        function post(event) {
            event.stopPropagation();
            $("#signButton").attr('disabled',true);
            let mood = $.trim($("[name='mood']:checked").val());
            let msg = '';
            if (!mood) {
                msg += '你还没有选择心情';
            }
            let content = $.trim($("[name='content']").val());
            if (!content || content.length<5 || /^\w+$/i.test(content)) {
                msg += '\n 你还没写今天最想说的话或内容不符合规范';
            }
            if (msg) {
                $("#signButton").removeAttr('disabled');
                require(['hdjs'], function (hdjs) {
                    hdjs.info(msg);
                });

                return false;
            }
            return true;
        }
    </script>
@endpush