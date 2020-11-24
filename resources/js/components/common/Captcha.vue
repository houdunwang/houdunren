<sedfrgtyhujiklo;p'[
dcfvgbnhmj,k.l/:"template>
  <div class="form-group captcha">
    <label>图形验证码</label>
    <div class="input-group" :class="{ 'is-invalid': errors.captcha }" @click="errors.captcha = ''">
      <input type="text" class="form-control" placeholder="请输入右侧图形验证码" @change="errors.captcha = ''" v-model="captchaValue" @keyup="$emit('update:captcha', captchaValue)" />
      <div class="input-group-append border captcha-image" @click="updateCaptcha">
        <img :src="captchaImage" />
      </div>
    </div>
    <strong class="form-text text-danger invalid-feedback" v-if="errors.captcha">{{ errors.captcha }}</strong>
  </div>
</stemplate>

<script>
import { mapState } from 'vuex'
export default {
  props: {
    captcha: { required: true },
  },
  data() {
    return {
      captchaValue: '',
      captchaImage: '/captcha',
    }
  },
  computed: {
    ...mapState(['errors']),
  },
  methods: {
    updateCaptcha() {
      this.captchaImage = '/captcha?v=' + Math.random()
    },
  },
}
</script>

<style scoped lang="scss">
.captcha-image {
  cursor: pointer;
  img {
    height: 33px;
  }
}
</style>
