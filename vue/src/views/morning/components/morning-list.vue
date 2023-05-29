<script setup lang="ts">
import dayjs from 'dayjs'
const route = useRoute()

const { collection, findAll } = useMorning()
const page = ref(route.query.page || 1)
await findAll(page.value, { state: 1 })

//播放开箱视频
const videoDialog = ref(false)
const videoSrc = ref('')
const playVideo = (src: string) => {
  videoDialog.value = true
  videoSrc.value = src
}

const player = ref()
const stopPlay = () => {
  player.value.player.pause()
  videoDialog.value = false
}
</script>

<template>
  <main v-if="collection.data.length">
    <HdCard class="mt-5 hidden md:block">
      <template #header> 历史活动 </template>
      <el-dialog title="开箱视频" v-model="videoDialog" append-to-body :before-close="stopPlay">
        <HdVideoPlayer :url="videoSrc" ref="player" class="mx-auto" :key="videoSrc" />
      </el-dialog>
      <section class="">
        <el-table :data="collection.data" border stripe width="100%">
          <el-table-column label="活动" :width="80" #default="{ row }" align="center">
            第{{ row.id }}期
          </el-table-column>
          <el-table-column label="开箱视频" :width="150" #default="{ row }" align="center">
            <div class="flex justify-center cursor-pointer" v-if="row.video">
              <icon-video-two theme="outline" size="48" fill="#16a085" @click="playVideo(row.video_cdn)" />
            </div>
          </el-table-column>
          <el-table-column label="状态" :width="150" #default="{ row }" align="center">
            <el-tag type="success" size="small" effect="plain" v-if="row.state"> 已经结束</el-tag>
            <el-tag type="danger" size="small" effect="dark" v-else> 进行中...</el-tag>
          </el-table-column>
          <el-table-column label="获得礼品的朋友" #default="{ row }">
            <div class="flex items-center" v-if="row.user">
              <UserAvatar :user="row.user" />
              <div
                @click="$router.push({ name: 'sign.space', query: { uid: row.user.id } })"
                class="cursor-pointer ml-2">
                {{ row.user.nickname }}
              </div>
            </div>
          </el-table-column>
          <el-table-column label="给朋友的礼品" :width="150" #default="{ row }" align="center">
            <a :href="row.url" target="_blank">
              <el-image :src="row.image" fit="cover" :lazy="true" class="w-20 h-20 cursor-pointer" />
            </a>
          </el-table-column>
          <el-table-column label="活动结束时间" :width="200" #default="{ row }">
            {{ dayjs(row.end_time).format('YYYY-MM-DD') }}
          </el-table-column>
        </el-table>
      </section>
    </HdCard>
    <HdCard class="mt-5 block md:hidden">
      <template #header> 历史活动 </template>
      <section class="p-5">
        <el-table :data="collection.data" border stripe>
          <el-table-column label="得奖朋友" :width="90" #default="{ row }" align="center" fixed>
            {{ row.user?.name }}
          </el-table-column>
          <el-table-column label="给朋友的礼品" :width="150" #default="{ row }" align="center">
            <a :href="row.url" target="_blank">
              <el-image :src="row.image" fit="cover" :lazy="true" class="w-20 h-20" />
            </a>
          </el-table-column>
          <el-table-column label="活动结束时间" :width="120" #default="{ row }">
            {{ dayjs(row.end_time).format('YYYY-MM-DD') }}
          </el-table-column>
        </el-table>
      </section>
    </HdCard>

    <Pagination
      v-if="collection"
      :per_page="collection.meta.per_page"
      :total="collection.meta.total"
      @current-change="$router.push({ name: 'morning', query: { page: $event } })" />
  </main>
</template>
