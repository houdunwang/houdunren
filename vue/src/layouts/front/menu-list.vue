<script setup lang="ts">
import config from '@/config'
import router from '@/plugins/router'
const route = useRoute()

const active = ref('')
const width = ref(document.documentElement.clientWidth)
window.addEventListener('resize', () => {
  width.value = document.documentElement.clientWidth
})
const showLinkNumber = computed(() => {
  return width.value >= 1536 ? 10 : width.value >= 1280 ? 9 : width.value >= 1024 ? 6 : width.value >= 768 ? 3 : 1
})
</script>

<template>
  <main>
    <template v-for="(menu, index) of config.topMenu">
      <template v-if="index <= showLinkNumber">
        <router-link
          :to="menu.route"
          class="flex items-center gap-1"
          :class="{ active: active == menu.route.name }"
          :style="menu.color ? `color:${menu.color}` : ''"
          @click="active = menu.route.name"
          v-if="menu.route">
          <component :is="menu.icon" size="18" fill="#555" />
          {{ menu.title }}
          <el-tag type="success" size="small" effect="dark" v-if="menu.tag">{{ menu.tag.title }}</el-tag>
        </router-link>
        <a :href="menu.url" target="_blank" class="flex items-center" v-else>
          <component :is="menu.icon" size="18" fill="#555" />
          {{ menu.title }}
        </a>
      </template>
    </template>
    <el-dropdown trigger="click" size="medium">
      <a href="javascript:void(0)" class="text-base"> 更多功能 </a>
      <template #dropdown>
        <el-dropdown-menu>
          <template v-for="(menu, index) of config.topMenu">
            <el-dropdown-item v-if="index > showLinkNumber">
              <router-link
                v-if="menu.route"
                :to="menu.route"
                @click="active = menu.route.name"
                class="flex gap-2 items-center text-base text-gray-700">
                <component :is="menu.icon" size="18" fill="#333" />
                {{ menu.title }}
              </router-link>
              <a :href="menu.url" target="_blank" v-else class="flex gap-2 items-center text-base text-gray-700">
                <component :is="menu.icon" size="18" fill="#333" />
                {{ menu.title }}
              </a>
            </el-dropdown-item>
          </template>
        </el-dropdown-menu>
      </template>
    </el-dropdown>
  </main>
</template>
