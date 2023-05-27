<script setup lang="ts">
import Layout from './layout.vue'
const { getLiveList } = useShot()
const lives = ref(await getLiveList())
</script>

<template>
  <Layout>
    <section class="grid md:grid-cols-3 gap-10 grid-flow-dense rounded-xl">
      <div v-for="(item, index) of lives" :key="index">
        <el-image :src="item" fit="cover" :lazy="true" class="overflow-hidden rounded-3xl"></el-image>
      </div>
    </section>
  </Layout>
</template>
