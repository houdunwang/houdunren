<send-code inline-template action="{{ $attributes['action'] }}">
    <div>
        <div class="form-group">
            <label for="account">帐号</label>
            <input type="text" class="form-control @error('account')is-invalid @enderror" name="account" id="account"
                placeholder="请输入邮箱或手机" v-model="account">
            @error( 'account' )
            <strong class="form-text text-danger invalid-feedback">{{ $message }}</strong>
            @enderror
        </div>

        <div class="form-group ">
            <label for="code">验证码</label>
            <div class="input-group @error('code') is-invalid @enderror" style="cursor: pointer">
                <input type="text" name="code" class="form-control" id="code" placeholder="请输入收到的验证码"
                    autocomplete="code" v-model="code">
                <a class="input-group-append ">
                    <span class="input-group-text" id="basic-addon2" @click="send">发送验证码</span>
                </a>
            </div>
            @error('code')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>


        <div class="form-group ">
            <label for="captcha">图形验证码</label>

            <div class="input-group @error('captcha') is-invalid @enderror" style="cursor: pointer">
                <input type="text" name="captcha" class="form-control" id="captcha" placeholder="请填写验证码"
                    v-model="captcha">
                <div class="input-group-append border">
                    <img src="/captcha" onclick="this.src='/captcha?'+Math.random()" />
                </div>
            </div>
            @error('captcha')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

    </div>
</send-code>
