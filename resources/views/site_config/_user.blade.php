<div class="card">
    <div class="card-header">
        用户相关
    </div>
    <div class="card-body col-6">
        <x-form theme="checkbox" title="用户必须绑定" name="user[bind][]" :options="['email'=>'邮箱','mobile'=>'手机号']"
            :value="config('site.user.bind')"></x-form>

        <x-form theme="radio" title="必须设置头像" name="user[avatar]" :options="[1=>'是',0=>'否']"
            :value="config('site.user.avatar')"></x-form>

        {{-- <x-form theme="group" title="验证码间隔时间" name="user[timeout]" text="分" value="{{ config('site.user.timeout',2) }}">
        </x-form> --}}
    </div>
</div>

<div class="card mt-3">
    <div class="card-header">
        微信桌面登录
    </div>
    <div class="card-body col-6">
        <x-form theme="radio" title="微信登录" name="user[wechatweb_login]" :options="[1=>'开启',0=>'关闭']"
            :value="config('site.user.wechatweb_login')"></x-form>
        <x-form title="AppID" name="user[wechatweb_client_id]" value="{{ config('site.user.wechatweb_client_id') }}"
            value="{{ config('site.user.wechatweb_client_id') }}" placeholder="开放平台网站应用的APPID">
        </x-form>
        <x-form title="AppSecret" name="user[wechatweb_client_secret]"
            value="{{ config('site.user.wechatweb_client_secret') }}"
            value="{{ config('site.user.wechatweb_client_secret') }}" placeholder="开放平台网站应用的AppSecret">
        </x-form>
    </div>
</div>
