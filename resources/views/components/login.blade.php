<div class="modal fade " id="loginModal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">会员登录</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-4">
                @include('member.login._form')
            </div>
            <div class="modal-footer justify-content-start small">
                <a href="{{route('register.index')}}" class="mr-1 pl-3">注册帐号</a>
                /
                <a href="{{route('findPassword.index')}}" class="mr-2"> 找回密码</a>
            </div>
        </div>
    </div>
</div>