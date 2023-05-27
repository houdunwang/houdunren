<script setup lang="ts">
const imgUrl = new URL('../../public/wechat/xj-wechat-qr.jpg', import.meta.url).href
</script>

<template>
  <HdCard>
    <template #header> 微信群 </template>
    <template #default>
      <div class="font-normal text-base">如果你喜欢微信群里交流，加大叔微信</div>
      <div class="text-center">
        <el-image :src="imgUrl" fit="cover" :lazy="true"></el-image>
      </div>
    </template>
  </HdCard>
</template>
