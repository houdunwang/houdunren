<script setup lang="ts">
import Layout from './layout.vue'
const { getLiveList } = useShot()
const lives = ref(await getLiveList())
</script>

<template>
  <Layout>
    <section class="lg:grid xl:grid-cols-2 grid-flow-row-dense rounded-xl px-3">
      <div v-for="(item, index) of lives" :key="index">
        <el-image :src="item" fit="cover" :lazy="true" class="w-full rounded-3xl" />
      </div>
    </section>
  </Layout>
</template>
