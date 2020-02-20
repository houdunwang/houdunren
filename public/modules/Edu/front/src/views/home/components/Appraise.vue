<template>
  <div id="appraise">
    <div class="container">
      <dl>
        <dt class="mb-3"><h4 class="font-weight-light">网友好评</h4></dt>
        <dd v-for="i in 87" :key="i" class="shadow-sm border p-2" v-show="i<bNum">
          <img :src="`https://houdunren-test.oss-cn-hangzhou.aliyuncs.com/images/bilibili/${i}.jpg`" alt="">
        </dd>
      </dl>
      <div>
        <div class="col-12 text-center">
          <button class="btn btn-outline-primary btn-sm cursor" @click="bNum=87">加载更多</button>
        </div>
      </div>
    </div>

    <div class="container mt-5 pt-5">
      <dl>
        <dt class="mb-3"><h4 class="font-weight-light">直播好评</h4></dt>
        <dd v-for="i in 39" :key="i" class="shadow border p-2" v-show="i<tNum">
          <img :src="`https://houdunren-test.oss-cn-hangzhou.aliyuncs.com/images/tencent/${i}.jpg`">
        </dd>
      </dl>
      <div>
        <div class="col-12 text-center">
          <button class="btn btn-outline-primary btn-sm cursor" @click="tNum=87">加载更多</button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  export default {
    data() {
      return {
        bNum: 5,
        tNum: 5
      }
    }
  }
</script>

<style lang="scss" scoped>
  #appraise {
  }
</style>
