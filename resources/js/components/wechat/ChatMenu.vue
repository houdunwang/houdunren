<template>
  <div class>
    <div class="alert alert-info alert-dismissible fade show" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
      <i class="fa fa-info-circle" aria-hidden="true"></i>
      需要先保存菜单后，再进行微信菜单推送
    </div>

    <div class="wechat-menu">
      <div class="view">
        <header>
          <img src="/images/wechat-header.jpg" class="border-bottom shadow-sm" />
        </header>
        <footer>
          <dl v-for="(m, index) in button" :key="index">
            <dt @click="edit(m, index)" :class="{ current: menu == m }">{{ m.name }}</dt>

            <dd @click="add(m.sub_button)" v-if="m.sub_button.length < 5" v-show="pid == index">
              <i class="fa fa-plus fa-1x" aria-hidden="true"></i>
            </dd>

            <dd
              v-for="(sm, i) in m.sub_button"
              :key="i"
              @click="edit(sm, index)"
              :class="{ current: menu === sm }"
              v-show="pid == index"
            >{{ sm.name }}</dd>
          </dl>

          <dl v-if="button.length < 3">
            <dt @click="add(button)">
              <i class="fa fa-plus fa-2x" aria-hidden="true"></i>
            </dt>
          </dl>
        </footer>
      </div>

      <div class="card edit shadow-sm ml-3" v-if="menu.type">
        <div class="card-header">菜单设置</div>
        <div class="card-body">
          <div class="form-group">
            <label for>菜单名称</label>
            <input type="text" class="form-control" v-model="menu.name" />
          </div>
          <div class="d-flex">
            <label v-for="(v, k) in types" :key="k" class="d-flex align-items-center mr-2">
              <input type="radio" :value="k" v-model="menu.type" class="mr-1" />
              {{ v }}
            </label>
          </div>

          <!-- <select class="form-control" id="exampleFormControlSelect1" v-model="menu.type">
              <option value="click">关键词</option>
              <option value="view">链接</option>
          </select>-->
          <div class="form-group" v-if="menu.type == 'click'">
            <label>关键词</label>
            <input type="text" class="form-control" v-model="menu.key" />
          </div>
          <div class="form-group" v-if="menu.type == 'view'">
            <label>链接</label>
            <input type="text" class="form-control" v-model="menu.url" />
          </div>
        </div>
        <div class="card-footer text-muted">
          <button class="btn btn-outline-danger btn-sm" @click="del">删除菜单</button>
        </div>
      </div>
    </div>

    <div class="btn-group">
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
      pid: 0,
      menu: {},
      types: {
        view: '链接',
        click: '关键词',
      },
    }
  },
  mounted() {
    if (this.button.length > 0) this.menu = this.button[0]
  },
  methods: {
    edit(menu, pid) {
      this.menu = menu
      this.pid = pid
    },
    del() {
      this.$confirm('确定删除吗？', '温馨提示').then(() => {
        this.button.map((m, i) => {
          if (m === this.menu) {
            this.button.splice(i, 1)
          }

          m.sub_button.map((s, k) => {
            if (s === this.menu) {
              m.sub_button.splice(k, 1)
            }
          })
        })
      })
    },
    add(menus) {
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
          cursor: pointer;
          padding: 0px;
          margin: 0;
          background: #fafafa;
          display: flex;
          justify-content: center;
          align-items: center;
          border-top: solid 1px #ddd;
          border-right: solid 1px #ccc;
          border-left: solid 1px #ccc;
          color: #969696;
          font-weight: normal;
          height: 40px;
          box-sizing: border-box;
          &.current {
            border: 1px solid #3aa5a2;
            border-bottom: none;
            background: #3aa5a2;
            color: #fff;
          }
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
