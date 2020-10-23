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
          <label>提示信息</label>
          <input type="text" class="form-control" v-model="field.placeholder" />
        </div>
        <div class="form-group">
          <label>必须输入</label>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" v-model="field.required" value="1" id="required1" />
            <label class="form-check-label" for="required1">是</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" v-model="field.required" value="0" id="required0" />
            <label class="form-check-label" for="required0">否</label>
          </div>
        </div>
      </div>
    </div>
    <div class="card mt-3">
      <div class="card-header">字段选项</div>
      <div class="card-body">
        <component :is="optionComponent" :data="field.options"></component>
      </div>
    </div>
    <button class="btn btn-primary mt-3">保存提交</button>
  </form>
</template>

<script>
const types = [
  { title: '文本框', name: 'input' },
  { title: '多行文本', name: 'textarea' },
  { title: '单选框', name: 'radio' },
  { title: '复文本编辑器', name: 'editor' },
]

const field = { title: '', name: '', placeholder: '', required: false, type: 'input', options: {} }
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
        this.field = await this.axios.get(`article/field/${this.id}`)
        if (this.field.options instanceof Array) {
          this.field.options = {}
        }
      }
    },
    async onSubmit() {
      if (this.id) {
        const api = `/article/field/${this.id}`
        await this.axios.put(api, this.field)
      } else {
        const api = `article/model/${this.model_id}/field`
        await this.axios.post(api, this.field)
      }
      location.href = `/article/model/${this.model_id}/field`
    },
  },
}
</script>

<style lang="scss">
</style>
