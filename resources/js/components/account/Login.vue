<template>
    <master>
        <div class="card shadow-sm mt-5">
            <div class="card-header">
                用户登录
            </div>
            <div class="card-body">
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
                    <label for="">用户名</label>
                    <input
                        type="text"
                        class="form-control"
                        name=""
                        id=""
                        aria-describedby="helpId"
                        placeholder="登录密码"
                    />
                </div>
                <button type="button" class="btn btn-primary">
                    登录
                </button>
            </div>
            <div class="card-footer text-muted small">
                <a href="" class="mr-2 text-secondary">
                    <i class="fas fa-home "> </i> 访问首页
                </a>
                <router-link
                    :to="{ name: 'register' }"
                    class="  text-secondary "
                >
                    <i class="fas fa-user"></i>
                    用户注册
                </router-link>
            </div>
        </div>
    </master>
</template>

<script>
import Master from "./Master";
export default {
    components: {
        Master
    },
    mounted() {}
};
</script>

<style lang="scss" scoped>
.account {
    background: #f3f3f3;
    width: 100vw;
    height: 100vh;
}
</style>
