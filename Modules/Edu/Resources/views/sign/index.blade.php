@extends('edu::layouts.front')
@section('title','每日签到')
@section('content')
<div class="container mt-5">
    @auth
    <div class="card shadow-sm">
        <div class="card-header bg-white">签到快乐，再接再厉</div>
        @if (user()->todaySign())
        <div class="card-body h6 font-weight-normal" style="line-height: 1.5rem;">
            您上次签到时间:
            <span class="text-danger">
                {{ user()->todaySign()->created_at}}
            </span>
            <br>
            您的总签到天数: <span class="text-danger">{{ user()->signs->count() }}</span> 天 <br>
            您本月签到天数:: <span class="text-danger">{{ user()->signs()->whereMonth('created_at',now())->count() }}</span> 天
        </div>
        @else
        <form action="{{ route('Edu.front.sign.store') }}" method="post">
            <div class="card-body h6 font-weight-normal">
                @csrf
                <input type="text" name="content" value="{{ old('content') }}"
                    class="form-control form-control-lg @error('content')is-invalid @enderror" required
                    placeholder=" 你今天的心情或最想说的话">
                @error( 'content')
                <strong class="form-text text-danger invalid-feedback">{{ $message }}</strong>
                @enderror

                <div class="mood mt-3 @error('mood')is-invalid @enderror">
                    <label>
                        <input type="radio" hidden name="mood" value="ch" />
                        <img src="/modules/Edu/static/sign/ch.gif" class="">
                    </label>
                    <label>
                        <input type="radio" hidden name="mood" value="fd" />
                        <img src="/modules/Edu/static/sign/fd.gif" class="">
                    </label>
                    <label>
                        <input type="radio" hidden name="mood" value="kx" />
                        <img src="/modules/Edu/static/sign/kx.gif" class="">
                    </label>
                    <label>
                        <input type="radio" hidden name="mood" value="ng" />
                        <img src="/modules/Edu/static/sign/ng.gif" class="">
                    </label>
                    <label>
                        <input type="radio" hidden name="mood" value="nu" />
                        <img src="/modules/Edu/static/sign/nu.gif" class="">
                    </label>
                    <label>
                        <input type="radio" hidden name="mood" value="shuai" />
                        <img src="/modules/Edu/static/sign/shuai.gif" class="">
                    </label>
                    <label>
                        <input type="radio" hidden name="mood" value="wl" />
                        <img src="/modules/Edu/static/sign/wl.gif" class="">
                    </label>
                    <label>
                        <input type="radio" hidden name="mood" value="yl" />
                        <img src="/modules/Edu/static/sign/yl.gif" class="">
                    </label>
                    <label>
                        <input type="radio" hidden name="mood" value="ym" />
                        <img src="/modules/Edu/static/sign/ym.gif" class="">
                    </label>
                </div>
                @error( 'mood')
                <strong class="form-text text-danger invalid-feedback">{{ $message }}</strong>
                @enderror
            </div>
            <div class="card-footer text-muted">
                <button type="submit" class="btn btn-success">开始签到</button>
            </div>
        </form>
        @endif
    </div>
    @endauth
</div>

<div class="container sign-list mb-5" id="app">
    <div class="card mt-3 shadow-sm ">
        <div class="card-header bg-white">今日签到排行</div>
        <div class="card-body">
            <table class="table table-bordered text-secondary">
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
                    <tr class="sign">
                        <td width="150">
                            <img src="{{ $sign->user->avatar }}" class="w35 rounded mr-2 align-middle">
                            {{ $sign->user->name }}
                        </td>
                        <td width="120">00:08</td>
                        <td width="120">2</td>
                        <td width="120">2</td>
                        <td>
                            <img src="/modules/Edu/static/sign/{{ $sign->mood }}.gif" class="w35">
                            {{ $sign->content }}
                            @if (is_master() ||$sign->user_id == user('id'))
                            <btn-del action="{{ route('Edu.front.sign.destroy',$sign) }}"
                                class="ml-3 btn-info btn-sm small">
                            </btn-del>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
