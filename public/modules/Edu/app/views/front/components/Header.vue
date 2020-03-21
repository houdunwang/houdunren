<template>
  <div class="header shadow border-bottom bg-light">
    <div class="container">
      <nav class="navbar navbar-expand-sm navbar-light bg-light pt-3 pb-3 pl-md-0 pr-md-0">
        <router-link class="navbar-brand text-muted font-weight-bold" to="/">
          <i class="fa fa-code text-info font-weight-bolder" aria-hidden="true"></i>
          houdunren.com
        </router-link>
        <button
          class="navbar-toggler d-lg-none"
          type="button"
          data-toggle="collapse"
          data-target="#collapsibleNavId"
          aria-controls="collapsibleNavId"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
          <ul class="navbar-nav mr-auto mt-2 mt-lg-0 font-weight-bold">
            <li class="nav-item pr-2">
              <a class="nav-link" href="#">系统学习</a>
            </li>
            <li class="nav-item pr-2">
              <router-link :to="{ name: 'lesson' }" class="nav-link">实战课程</router-link>
            </li>
            <li class="nav-item pr-2">
              <router-link :to="{name:'video.index'}" class="nav-link">最近更新</router-link>
            </li>
            <li class="nav-item pr-2">
              <a class="nav-link" href="#">话题讨论</a>
            </li>
            <li class="nav-item pr-2">
              <a class="nav-link" href="#">签到打卡</a>
            </li>
            <li class="nav-item pr-2">
              <a class="nav-link" href="http://doc.houdunren.com">在线文档</a>
            </li>
            <li class="nav-item pr-2">
              <a class="nav-link" href="http://doc.houdunren.com">订阅会员</a>
            </li>
          </ul>
          <div class="form-inline my-2 my-lg-0" v-if="!user">
            <a href="/login" type="button" class="btn btn-success mr-1 btn-sm">登录</a>
            <a href="/register" type="button" class="btn btn-outline-info btn-sm">注册</a>
          </div>
          <div class="form-inline my-2 my-lg-0" v-if="user">
            <div class="nav-item pr-2 dropdown">
              <a
                class="nav-link dropdown-toggle d-flex align-items-center"
                href="#"
                id="dropdownId"
                data-toggle="dropdown"
                aria-haspopup="true"
                aria-expanded="false"
              >
                <img :src="user.avatar" class="icon rounded mr-1" />
                {{ user.nickname }}
              </a>
              <div class="dropdown-menu" aria-labelledby="dropdownId">
                <a class="dropdown-item mb-2 mt-2" href="/member/info/base">修改资料</a>
                <a class="dropdown-item mb-2" href="/member/info/phone">绑定手机</a>
                <a class="dropdown-item mb-2" href="/member/info/avatar">头像设置</a>
                <a class="dropdown-item mb-2" href="/member/info/base">修改密码</a>
                <a class="dropdown-item mb-2" href="/member/info/email">绑定邮箱</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item mb-2" href="/logout">退出登录</a>
              </div>
            </div>
          </div>
        </div>
      </nav>
    </div>
  </div>
</template>

<script>
import { mapState } from 'vuex'
export default {
  computed: {
    ...mapState('user', { user: 'data' })
  }
}
</script>

<style lang="scss" scoped>
.header {
  &::after {
    content: '';
    background-image: linear-gradient(45deg, #60b5b3, #43a8a6);
    height: 4px;
    width: 100%;
    display: block;
  }
}
.dropdown-menu {
  min-width: 0;
}
.icon {
  width: 20px;
  height: 20px;
}
</style>
