<script setup lang="ts">
const { lesson } = useConfigStore()
const { isAdministrator } = useUser()
const { findOne, model } = useSystem()
const route = useRoute()
await findOne(route.params.id)
</script>

<template>
  <main class="relative z-1 !w-full !p-0 !-mt-1">
    <section class="bg-[#34495e] p-3 md:py-12 text-white">
      <div class="2xl:w-page 2xl:mx-auto">
        <h1 class="font-bold text-3xl flex items-start gap-2">
          {{ model.title }}
          <el-tag type="danger" effect="dark" class="mr-2">系统课程</el-tag>
        </h1>
        <p class="mt-5 opacity-80 text-base">
          {{ model.description }}
        </p>
        <div class="mt-3 flex items-center gap-2">
          <DownloadLesson :id="model.id" type="system" />
          <router-link :to="{ name: 'system.edit', params: { id: model?.id } }" v-if="isAdministrator()">
            <el-button type="info" size="default"> 编辑 </el-button>
          </router-link>
        </div>
      </div>
    </section>
    <section
      class="2xl:w-page 2xl:mx-auto mt-10 p-2 grid grid-flow-row grid-cols-1 md:grid-cols-2 lg:grid-cols-3 2xl:grid-cols-4 gap-3 bg-white rounded-md shadow-lg">
      <LessonItem v-for="item of model.lessons" :key="item.id" :item="item" :showType="lesson.lessonShowType" />
    </section>
  </main>
</template>
