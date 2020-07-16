<template>
  <button type="button" :class="className" @click.prevent="del">
    <slot>删除</slot>
  </button>
</template>

<script>
export default {
  props: {
    action: { type: String, required: true },
    className: { type: String, default: 'btn btn-secondary' },
    redirect:{type:String,default:''}
  },
  methods: {
    del() {
      this.$confirm('确定删除吗？', '提示', { type: 'warning' })
        .then(async () => {
          await this.axios.delete(this.action)
          if(this.redirect===''){
              location.reload()
          }else if(this.redirect==='back'){
              window.history.go(-1);
          }else{
              location.href=this.redirect;
          }
        })
        .catch(() => {})
    },
  },
}
</script>

<style></style>
