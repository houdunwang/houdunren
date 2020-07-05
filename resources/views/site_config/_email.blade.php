<div class="card">
    <div class="card-header">
        基本信息
    </div>
    <div class="card-body col-6">
        <x-form title="邮箱驱动" name="email[transport]" value="{{ config('site.email.transport','smtp') }}"
            placeholder="smtp、sendmail、mailgun、mandrill、ses、sparkpost、log"></x-form>

        <x-form title="服务器地址" name="email[host]" value="{{ config('site.email.host','smtpdm.aliyun.com') }}"
            placeholder="指定SMTP服务器的地址 阿里邮箱 腾讯邮箱"></x-form>

        <x-form title="端口" name="email[port]" value="{{ config('site.email.port','465') }}"
            placeholder="指定SMTP服务器的地址, 如: 126邮箱为25"></x-form>

        <x-form title="邮箱帐号" name="email[username]" value="{{ config('site.email.username') }}" placeholder="发送邮箱帐号">
        </x-form>

        <x-form type="password" title="邮箱密码" name="email[password]" value="{{ config('site.email.password') }}"
            placeholder=""></x-form>

        <x-form title="加密方式" name="email[encryption]" value="{{ config('site.email.encryption','ssl') }}"
            placeholder=""></x-form>

    </div>
</div>
