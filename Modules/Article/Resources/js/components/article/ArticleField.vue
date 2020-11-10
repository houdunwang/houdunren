<template>
  <form @submit.prevent="onSubmit">
    <div class="card">
      <div class="card-header">基本信息</div>
      <div class="card-body">
        <div class="form-group">
          <label>表单类型</label>
          <select v-model="field.type" class="form-control">
            <option :value="type.name" v-for="(type, index) in types" :key="index">{{ type.title }}</option>
          </select>
          <span class="form-text text-muted">编辑时不允许修改表单类型，所以请慎重选择</span>
        </div>
        <div class="form-group">
          <label>字段名称</label>
          <input type="text" class="form-control" :class="{ 'is-invalid': errors.title }" @focus="errors.title = ''" v-model="field.title" required placeholder="字段的中文标题" />
          <strong class="form-text text-danger invalid-feedback" v-if="errors.title">{{ errors.title }}</strong>
        </div>
        <div class="form-group">
          <label>字段标识</label>
          <input type="text" class="form-control" :class="{ 'is-invalid': errors.name }" @focus="errors.name = ''" v-model="field.name" required placeholder="字段的英文标识" pattern="[a-z|_]{2,}" title="请输入英文字母" />
          <strong class="form-text text-danger invalid-feedback" v-if="errors.name">{{ errors.name }}</strong>
        </div>
        <div class="form-group">
          <label>默认值</label>
          <input type="text" class="form-control" :class="{ 'is-invalid': errors.value }" @focus="errors.value = ''" v-model="field.value" placeholder="表单默认值" />
          <strong class="form-text text-danger invalid-feedback" v-if="errors.value">{{ errors.value }}</strong>
        </div>
        <div class="form-group">
          <label>提示信息</label>
          <input type="text" class="form-control" v-model="field.placeholder" />
        </div>

        <div class="form-group">
          <label>显示字段</label>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" v-model="field.show" :value="true" id="show1" />
            <label class="form-check-label" for="show1">是</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" v-model="field.show" :value="false" id="show0" />
            <label class="form-check-label" for="show0">否</label>
          </div>
        </div>
        <div class="form-group">
          <label>必须输入</label>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" v-model="field.required" :value="true" id="required1" />
            <label class="form-check-label" for="required1">是</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" v-model="field.required" :value="false" id="required0" />
            <label class="form-check-label" for="required0">否</label>
          </div>
        </div>
      </div>
    </div>

    <div class="card mt-3">
      <div class="card-header">表单验证</div>
      <div class="card-body">
        <div class="alert alert-secondary small" role="alert">
          验证规则兼容Laravel表单验证规则
          <br />
          不设置验证消息时系统将自动生成消息
        </div>
        <div class="form-group">
          <label>验证规则</label>
          <input type="text" class="form-control" :class="{ 'is-invalid': errors.rules }" @focus="errors.rules = ''" v-model="field.rules" placeholder="字段的英文标识" title="请输入正则表达式" />
          <strong class="form-text text-danger invalid-feedback" v-if="errors.rules">{{ errors.rules }}</strong>
        </div>
        <div class="form-group">
          <label>错误信息</label>
          <input type="text" class="form-control" :class="{ 'is-invalid': errors.errors }" @focus="errors.errors = ''" v-model="field.errors" placeholder="验证失败时的错误信息" />
          <strong class="form-text text-danger invalid-feedback" v-if="errors.errors">{{ errors.errors }}</strong>
        </div>
      </div>
    </div>

    <div class="mt-3">
      <component :is="optionComponent" :field="field" />
    </div>

    <button class="btn btn-primary mt-3">保存提交</button>
  </form>
</template>

<script>
const types = [
  { title: '文本框', name: 'input' },
  { title: '多行文本', name: 'textarea' },
  { title: '单选框', name: 'radio' },
  { title: '复文本编辑器', name: 'wangEditor' },
]

const field = { title: '', name: '', placeholder: '', value: '', required: false, type: 'input', options: '', rules: '', errors: '', show: true, ext: {} }

import { mapState } from 'vuex'

export default {
  props: {
    model_id: { type: Number },
    id: { type: Number },
  },
  data() {
    return {
      types,
      field: Object.assign({}, field),
    }
  },
  mounted() {
    this.get()
  },
  computed: {
    ...mapState(['errors']),
    optionComponent() {
      let name = [...this.field.type].reduce((s, v, i) => (s += i == 0 ? v.toUpperCase() : v), '')

      return `Article${name}Option`
    },
  },
  methods: {
    async get() {
      if (this.id) {
        this.field = await this.axios.get(`Article/admin/field/${this.id}`)
      }
    },
    async onSubmit() {
      if (this.id) {
        const api = `/Article/admin/field/${this.id}`
        await this.axios.put(api, this.field)
      } else {
        const api = `Article/admin/model/${this.model_id}/field`
        await this.axios.post(api, this.field)
      }
      location.href = `/Article/admin/model/${this.model_id}/field`
    },
  },
}
</script>

<style lang="scss">
</style>
