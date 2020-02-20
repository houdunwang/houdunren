<template>
  <div id="knowledge">
    <div class="container">
      <h3 class="text-dark text-center mb-5">适应主流应用平台</h3>
      <div class="row">
        <div class="col-sm-3 col-sm-12 col-md-3 mb-3 pl-0 pr-1" v-for="(app,index) in apps" :key="index">
          <div class="card shadow">
            <div class="card-body">
              <div class="icon mt-2">
                <span class="iconfont" v-html="app.icon" :style="{color:app.color}"></span>
                <!--<i class="fa fa-3x text-primary" :class="app.icon" aria-hidden="true"></i>-->
              </div>
              <h5 class="pt-3">{{app.title}}</h5>
              <p class="p-2 font-weight-lighter">
                {{app.desc}}
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  export default {
    data() {
      return {
        apps: [
          {
            icon: '&#xe633;', title: '小程序员', color: '#16a085',
            desc: `小程序可以在微信内被便捷地获取和传播，同时具有出色的使用体验。是企业开发中不可缺少的一项`
          },
          {
            icon: '&#xe606;', title: '公众号', color: '#e67e22',
            desc: `微信公众号是开发者或商家在微信公众平台，大部分企业都需要对公众号开发了如指掌的工程师`
          },
          {
            icon: '&#xe745;', title: 'H5页面', color: '#2980b9',
            desc: `移动端是企业应用大舞台，能够独立开发企业需要的H5页面会非常受欢迎`
          },
          {
            icon: '&#xe501;', title: 'APP', color: '#9b59b6',
            desc: '做为开发者如果能够开发手机APP，你的行业竞争力会更上一层'
          },
        ]
      }
    }
  }
</script>

<style lang="scss" scoped>
  #knowledge {
    padding-top: 5em;
    padding-bottom: 5em;
    background: #F7F8F9;

    .iconfont {
      font-size: 40px;
    }

    .card {
      h5 + p {
        height: 7rem;
      }
    }
  }
</style>
