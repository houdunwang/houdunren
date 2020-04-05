<template>
  <a-locale-provider :locale="locale">
    <router-view></router-view>
  </a-locale-provider>
</template>
<script>
import zhCN from 'ant-design-vue/lib/locale-provider/zh_CN'

export default {
  data() {
    return {
      locale: zhCN
    }
  }
}
</script>

<style></style>
