<script setup lang="ts">
import config from '@/config'

const active = ref('')
</script>

<template>
  <main>
    <template v-for="(menu, index) of config.topMenu">
      <template v-if="index < 11">
        <router-link
          :to="menu.route"
          class="flex items-center gap-1"
          :class="{ active: active == menu.route.name }"
          :style="menu.color ? `color:${menu.color}` : ''"
          @click="active = menu.route.name"
          v-if="menu.route">
          {{ menu.title }}
          <el-tag type="success" size="small" effect="dark" v-if="menu.tag">{{ menu.tag.title }}</el-tag>
        </router-link>
        <a :href="menu.url" target="_blank" class="flex items-center" v-else>
          {{ menu.title }}
          <component :is="menu.icon" size="18" fill="#555" />
        </a>
      </template>
    </template>
    <el-dropdown trigger="click" size="medium" v-if="config.topMenu.length > 10">
      <a href="javascript:void(0)" class="text-base"> 更多功能 </a>
      <template #dropdown>
        <el-dropdown-menu>
          <template v-for="(menu, index) of config.topMenu">
            <el-dropdown-item v-if="index >= 11">
              <router-link
                :to="menu.route"
                @click="active = menu.route.name"
                v-if="menu.route"
                class="flex gap-2 items-center text-base">
                <component :is="menu.icon" size="18" fill="#333" />
                {{ menu.title }}
              </router-link>
            </el-dropdown-item>
          </template>
        </el-dropdown-menu>
      </template>
    </el-dropdown>
  </main>
</template>
