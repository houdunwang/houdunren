<template>
  <div>
    <div class="container mt-5 mb-5" v-if="!isLoad">
      <a-skeleton active v-for="k in 3" :key="k" />
    </div>
    <div class="container mt-5 mb-5" v-if="isLoad">
      <div class="card shadow-sm" v-if="isLogin && !todayIsCheck">
        <div class="card-header bg-white">每日签到</div>
        <div class="card-body">
          <div>
            <input type="text" class="form-control" v-model="form.content" placeholder="你今天的心情或最想说的话" />
            <div class="mood mt-3">
              <a href v-for="(icon, index) in icons" :key="index" @click.prevent="form.mood = icon">
                <img :src="`/modules/Edu/web/assets/icon/${icon}.gif`" :class="{ active: icon == form.mood }" />
              </a>
            </div>
          </div>
        </div>
        <div class="card-footer text-muted">
          <button type="button" class="btn btn-success" @click="submit">开始签到</button>
        </div>
      </div>
      <div class="card shadow-sm" v-if="isLogin && todayIsCheck">
        <div class="card-header bg-white">签到快乐，再接再厉</div>
        <div class="card-body h6 font-weight-normal" style="line-height:1.5em;">
          您上次签到时间: <span class="text-danger">{{ current.updated_at }}</span> <br />
          您的总签到天数: <span class="text-danger">{{ current.total }}</span> 天 <br />
          您本月签到天数:: <span class="text-danger">{{ current.month }}</span> 天
        </div>
      </div>
      <div class="card" v-if="!isLogin">
        <div class="card-header">每日签到</div>
        <div class="card-body text-center">
          <h5 class="text-secondary text-center mt-3 mb-3">天天签到，天天进步</h5>
          <a href="/login?redirect=/edu/sign" class="btn btn-success">马上登录过行签到</a>
        </div>
      </div>
      <div class="card mt-3 shadow-sm">
        <div class="card-header bg-white">今日签到排行</div>
        <div class="card-body">
          <table class="table table-bordered text-secondary">
            <thead>
              <tr>
                <th>会员</th>
                <th>今日签到时间</th>
                <th>总签到天数</th>
                <th>月签到天数</th>
                <th>签到心情</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="sign in signs" :key="sign.id" class="sign">
                <td width="150">
                  <img :src="sign.user.avatar" class="rounded mt-1 align-middle" />
                  {{ sign.user.name }}
                </td>
                <td width="120">{{ sign.created_at | dateFormat('time') }}</td>
                <td width="120">{{ sign.total.total }}</td>
                <td width="120">{{ sign.total.month }}</td>
                <td>
                  <img :src="`/modules/Edu/web/assets/icon/${sign.mood}.gif`" />
                  {{ sign.content }}
                  <button
                    class="btn btn-sm btn-outline-secondary"
                    v-if="isLogin && user.id == sign.user_id"
                    @click="del(sign)"
                  >
                    删除
                  </button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import _ from 'lodash'
import { mapGetters, mapState } from 'vuex'
export default {
  data() {
    return {
      form: {
        content: '',
        mood: ''
      },
      isLoad: false,
      signs: [],
      icons: ['ch', 'fd', 'kx', 'ng', 'nu', 'shuai', 'wl', 'yl', 'ym']
    }
  },
  created() {
    this.load()
  },
  computed: {
    ...mapState('user', ['user']),
    ...mapGetters('user', ['isLogin']),
    todayIsCheck() {
      return this.signs.some(sign => sign.user_id === this.user.id)
    },
    current() {
      return this.signs.filter(sign => sign.user_id === this.user.id)[0].total
    }
  },
  methods: {
    async load() {
      let response = await this.axios.get(`edu/front/sign`)
      this.$set(this, 'signs', response.data.data)
      this.isLoad = true
    },
    async submit() {
      if (_.trim(this.form.content) == '') {
        this.$message.error('还没写最想说的话')
        return
      }
      if (!this.form.mood) {
        this.$message.error('请选择签到表情')
        return
      }
      await this.axios.post(`edu/front/sign`, this.form)
      this.$message.success('签到成功')
      this.load()
    },
    async del(sign) {
      this.$confirm({
        content: '确定删除吗？',
        onOk: async () => {
          await this.axios.delete(`edu/front/sign/${sign.id}`)
          this.$message.success('签到删除成功')
          this.load()
        }
      })
    }
  }
}
</script>

<style lang="scss" scoped>
.mood {
  img {
    float: left;
    border: solid 5px #eae8e8;
    margin-right: 10px;
    padding: 5px 6px 2px;
    cursor: pointer;
    border-radius: 10px;
    background-color: #f3f3f3;
    transition: 0.5s;
    &.active {
      border: solid 5px #f15a57;
    }
  }
}
tr.sign {
  img {
    width: 30px;
    height: 30px;
  }
}
</style>
