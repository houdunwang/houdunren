<template>
  <div>
    <div class="form-group">
      <label>帐号</label>
      <input
        type="text"
        class="form-control"
        :name="name"
        :class="{ 'is-invalid': errors[name] }"
        @focus="errors[name] = ''"
        @keyup="$emit('update:'+name,value)"
        v-model="value"
        :placeholder="placeholder"
      />
      <strong class="form-text text-danger invalid-feedback" v-if="errors[name]">{{ errors[name] }}</strong>
    </div>

    <captcha :captcha.sync="captcha" ref="captcha"></captcha>

    <div class="form-group send-form">
      <label>验证码</label>
      <div class="input-group" :class="{ 'is-invalid': errors.code }" @click="errors.code = ''">
        <input
          type="text"
          class="form-control"
          placeholder="请输入收到的验证码"
          v-model="code"
          @keyup="$emit('update:code',code)"
        />
        <a href="#" class="input-group-append" @click.prevent="send">
          <span class="input-group-text" id="basic-addon2">发送验证码</span>
        </a>
      </div>
      <strong class="form-text text-danger invalid-feedback" v-if="errors.code">{{ errors.code }}</strong>
    </div>
  </div>
</template>

<script>
import { mapState } from 'vuex'
export default {
    props:{
        action:{type:String},
        placeholder:{required:true,type:String},
        name:{required:true,type:String},
    },
  data() {
    return {
      value:"",
      code: '',
      captcha: '',
    }
  },
  computed: {
    ...mapState(['errors']),
    url(){
       if(this.action)return this.action

       return '/common/code/'+this.name;
    }
  },
  methods: {
      updateCaptcha(){
this.$refs['captcha'].updateCaptcha();
      },
    send() {
      this.updateCaptcha();
      this.axios.post(this.action, {
          [this.name]:this.value,
          captcha:this.captcha,
          code:this.code
      })
      this.updateCaptcha()
    }
  }
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
