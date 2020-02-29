<template>
    <master>
        <template v-slot:header>会员注册 </template>
        <template v-slot:body>
            <div class="form-group">
                <label for="name">用户名</label>
                <input
                    type="text"
                    class="form-control"
                    name=""
                    id="name"
                    aria-describedby="helpId"
                    placeholder="用户名"
                />
            </div>
            <div class="form-group">
                <label for="">密码</label>
                <input
                    type="password"
                    class="form-control"
                    name=""
                    id=""
                    aria-describedby="helpId"
                    placeholder="登录密码"
                />
            </div>
            <div class="form-group">
                <label for="">确认密码</label>
                <input
                    type="password"
                    class="form-control"
                    name=""
                    id=""
                    aria-describedby="helpId"
                    placeholder="请输入确认密码"
                />
            </div>
            <div class="input-group mb-3">
                <input
                    type="text"
                    class="form-control"
                    placeholder="请输入验证码"
                    aria-label="Recipient's username"
                    aria-describedby="basic-addon2"
                />
                <div class="input-group-append">
                    <button href="" class="input-group-text" id="basic-addon2">
                        发送验证码
                    </button>
                </div>
            </div>
            <button type="button" class="btn btn-primary">注册</button>
        </template>
        <template v-slot:footer>
            <a href="" class="mr-2 text-secondary">
                <i class="fa fa-home "> </i> 访问首页
            </a>
            <router-link to="login" class="text-secondary">
                <i class="fa fa-user  "></i>
                登录帐号
            </router-link>
        </template>
    </master>
</template>

<script>
import Master from "./components/Master";
export default {
    components: {
        Master
    }
};
</script>

<style lang="scss" scoped></style>
