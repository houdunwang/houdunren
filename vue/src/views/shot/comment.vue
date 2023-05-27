<script setup lang="ts">
import Layout from './layout.vue'
const { getCommentList } = useShot()

const comments = ref(await getCommentList())
</script>

<template>
  <Layout>
    <section class="lg:grid xl:grid-cols-2 grid-flow-row-dense rounded-xl">
      <div v-for="(comment, index) of comments" :key="index">
        <el-image :src="comment" fit="cover" :lazy="true" class="w-screen xl:w-auto"></el-image>
      </div>
    </section>
  </Layout>
</template>

<style lang="scss"></style>
