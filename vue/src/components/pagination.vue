<script setup lang="ts">
const { per_page, total } = defineProps<{
  per_page: any
  total: number
  current_page?: any
}>()
defineEmits(['currentChange'])
</script>

<template>
  <main class="bg-white rounded-md border mt-3 py-3" v-show="total / per_page > 1">
    <section class="md:hidden flex justify-center">
      <el-pagination
        @current-change="$emit('currentChange', $event)"
        layout="prev, pager"
        :current-page="+($route.query.page || 1)"
        :hide-on-single-page="true"
        :pager-count="5"
        :page-size="per_page"
        :total="total"
        background />
    </section>
    <section class="hidden md:flex px-5">
      <el-pagination
        @current-change="$emit('currentChange', $event)"
        :current-page="+($route.query.page || 1)"
        :hide-on-single-page="true"
        :pager-count="7"
        :page-size="per_page"
        layout=" prev, pager, next"
        :total="total"
        background />
    </section>
  </main>
</template>
