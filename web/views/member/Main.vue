<template>
  <div class="member">
    <error />
    <div class="member-top shadow-sm">
      <div class="container">
        <nav class="navbar navbar-expand-sm navbar-light bg-light">
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
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
              <li class="nav-item">
                <a class="nav-link" href="/">
                  <i class="fa fa-home" aria-hidden="true"></i>
                  网站首页
                </a>
              </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
              <div class="nav-item dropdown">
                <a
                  class="nav-link dropdown-toggle"
                  href="#"
                  id="dropdownId"
                  data-toggle="dropdown"
                  aria-haspopup="true"
                  aria-expanded="false"
                >向军大叔</a>
                <div class="dropdown-menu" aria-labelledby="dropdownId" style="min-width:0px;">
                  <router-link class="dropdown-item mb-2 mt-2" :to="{name:'member.password'}">密码修改</router-link>
                  <router-link class="dropdown-item mb-2 mt-2" :to="{name:'member.email'}">邮箱绑定</router-link>
                  <router-link class="dropdown-item mb-2 mt-2" :to="{name:'member.base'}">基本信息</router-link>
                  <router-link class="dropdown-item mb-2 mt-2" :to="{name:'member.mobile'}">手机验证</router-link>
                  <router-link class="dropdown-item mb-2 mt-2" :to="{name:'member.avatar'}">修改头像</router-link>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item mb-2" @click.prevent="logout">退出登录</a>
                </div>
              </div>
            </form>
          </div>
        </nav>
      </div>
    </div>
    <div class="container d-flex flex-column flex-md-row mt-3 mb-3 justify-content-between">
      <div class="menu">
        <div class="icon bg-white shadow-sm border">
          <a href="#">
            <img :src="user.avatar" />
          </a>
          <div class="pt-0 p-3">
            <h6 class="text-muted">{{user.name}}</h6>
            <hr />
            <div class="d-flex justify-content-between text-muted">
              <i class="fa fa-envelope" :class="{'text-info':user.email}" aria-hidden="true"></i>
              <i class="fa fa-phone" :class="{'text-info':user.mobile}" aria-hidden="true"></i>
              <i class="fa fa-weibo" :class="{'text-info':user.weibo}" aria-hidden="true"></i>
              <i class="fa fa-weixin" :class="{'text-info':user.wechat}" aria-hidden="true"></i>
              <i class="fa fa-github" :class="{'text-info':user.github}" aria-hidden="true"></i>
              <i class="fa fa-qq" :class="{'text-info':user.qq}" aria-hidden="true"></i>
            </div>
          </div>
        </div>
        <div class="list mt-2 shadow-sm border">
          <div class="list-group list-group-flush menus">
            <a class="list-group-item disabled bg-light">资料修改</a>
            <router-link
              class="list-group-item"
              :class="{active:$route.name =='member.base'}"
              :to="{name:'member.base'}"
            >基本信息</router-link>
            <router-link
              class="list-group-item"
              :class="{active:$route.name =='member.password'}"
              :to="{name:'member.password'}"
            >密码修改</router-link>
            <router-link
              class="list-group-item"
              :class="{active:$route.name =='member.email'}"
              :to="{name:'member.email'}"
            >邮箱绑定</router-link>
            <router-link
              class="list-group-item"
              :class="{active:$route.name =='member.mobile'}"
              :to="{name:'member.mobile'}"
            >手机验证</router-link>
            <router-link
              class="list-group-item"
              :class="{active:$route.name =='member.avatar'}"
              :to="{name:'member.avatar'}"
            >修改头像</router-link>
          </div>
        </div>
      </div>
      <div class="flex-fill ml-md-3 mt-2 mt-md-0">
        <router-view></router-view>
      </div>
    </div>
  </div>
</template>

<script>
import { mapState, mapActions } from 'vuex'
import Error from '@/components/Error'
import store from '@/store'
export default {
  components: { Error },
  computed: {
    ...mapState('user', { user: 'data' })
  },
  methods: {
    ...mapActions('user', ['logout'])
  }
}
</script>

<style lang="scss" scoped>
.member {
  background: #fefefe;
  .member-top {
    // border-bottom: solid 4px #f15a57;
    background: #f7f8f9;
    &::after {
      content: '';
      height: 4px;
      display: block;
      background-image: linear-gradient(45deg, #60b5b3, #43a8a6);
    }
  }
  .menu {
    .icon {
      img {
        width: 200px;
        @media screen and (max-width: 768px) {
          width: 100%;
        }
      }
    }
  }
  .list-group-item.active {
    z-index: 2;
    color: #fff;
    background-color: #78afc7;
    border-color: #78afc7;
  }
}
</style>
