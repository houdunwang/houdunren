<template>
  <div class>
    <div class="alert alert-info alert-dismissible fade show" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
      <i class="fa fa-info-circle" aria-hidden="true"></i>
      需要先保存菜单后，再进行微信菜单推送
    </div>

    <div class="card">
      <div class="card-header">微信菜单</div>
      <div class="card-body wechat-menu">
        <div class="view">
          <header>
            <img src="/images/wechat-header.jpg" />
          </header>
          <footer>
            <dl v-for="(menu, index) in button" :key="index">
              <dt @click="edit(menu)">
                {{ menu.name }}
                <i
                  class="fa fa-times-circle text-secondary ml-1"
                  @click="del(button, index)"
                ></i>
              </dt>

              <dd @click="add(menu.sub_button, 2)" v-if="menu.sub_button.length<5">
                <i class="fa fa-plus fa-1x" aria-hidden="true"></i>
              </dd>

              <dd v-for="(smenu, i) in menu.sub_button" :key="i" @click="edit(smenu)">
                {{ smenu.name }}
                <i
                  class="fa fa-times-circle text-secondary ml-1"
                  @click="del(menu.sub_button, i)"
                ></i>
              </dd>
            </dl>
            <dl v-if="button.length<3">
              <dt @click="add(button, 1)">
                <i class="fa fa-plus fa-2x" aria-hidden="true"></i>
              </dt>
            </dl>
          </footer>
        </div>

        <div class="card edit shadow-sm ml-3" v-if="menu.name">
          <div class="card-header">菜单设置</div>
          <div class="card-body">
            <div class="form-group">
              <label for>菜单名称</label>
              <input type="text" class="form-control" v-model="menu.name" />
            </div>
            <div class="form-group">
              <label for="exampleFormControlSelect1">类型</label>
              <select class="form-control" id="exampleFormControlSelect1" v-model="menu.type">
                <option value="click">关键词</option>
                <option value="view">链接</option>
              </select>
            </div>
            <div class="form-group" v-if="menu.type == 'click'">
              <label>关键词</label>
              <input type="text" class="form-control" v-model="menu.key" />
            </div>
            <div class="form-group" v-if="menu.type == 'view'">
              <label>链接</label>
              <input type="text" class="form-control" v-model="menu.url" />
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="btn-group" role="group" aria-label="Basic example">
      <button class="btn btn-primary mt-3" @click="submit">保存菜单</button>
      <button class="btn btn-outline-success mt-3" @click="push">推送菜单到微信公众号</button>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    siteid: { required: true },
    wechatid: { required: true },
    menus: { type: Array, required: true },
  },
  data() {
    return {
      button: this.menus,
      menu: {},
    }
  },
  mounted() {
    if (this.button.length > 0) this.menu = this.button[0]
  },
  methods: {
    edit(menu) {
      this.menu = menu
    },
    del(menus, index) {
      menus.splice(index, 1)
    },
    add(menus, level) {
      if (level == 1) {
        if (menus.length == 3) {
          this.$message.error('一级菜单只能添加三个')
          return
        }
      }

      if (level == 2) {
        if (menus.length == 5) {
          this.$message.error('二级菜单只能添加五个')
          return
        }
      }
      menus.push({
        type: 'view',
        name: '菜单名称',
        url: 'https://',
        key: '',
        sub_button: [],
      })
    },
    async submit() {
      let url = `wechat/${this.siteid}/wechat/menu/${this.wechatid}`
      await this.axios.put(url, { button: this.button })
    },
    async push() {
      let url = `wechat/${this.siteid}/wechat/menu/push/${this.wechatid}`
      await this.axios.get(url)
    },
  },
}
</script>

<style lang="scss">
.wechat-menu {
  display: flex;
  .view {
    width: 350px;
    height: 550px;
    border: solid 1px #ccc;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    header {
      img {
        width: 100%;
      }
    }
    footer {
      display: flex;
      justify-content: space-between;
      dl {
        flex-grow: 1;
        display: flex;
        flex-direction: column-reverse;
        padding: 0;
        margin: 0;
        dt,
        dd {
          padding: 15px 0px;
          margin: 0;
          background: #fafafa;
          display: flex;
          justify-content: center;
          align-items: center;
          height: 35px;
          border-top: solid 1px #ddd;
          border-right: solid 1px #ccc;
          border-left: solid 1px #ccc;
          color: #969696;
          font-weight: normal;
          height: 50px;
        }
        dd {
          background: #fff;
        }
      }
    }
  }
  .edit {
    flex-grow: 1;
  }
}
</style>
