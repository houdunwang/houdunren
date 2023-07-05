<script lang="ts" setup>
import router from '@/plugins/router'
import { ElMessage } from 'element-plus'
import TopMenu from './topMenu.vue'
const { user } = useUserStore()
const { isLogin } = useAuth()
const isBind = user?.mobile || user?.email
if (isLogin() && !isBind) {
  ElMessage.success('请绑定邮箱或手机号')
  router.push({ name: 'member.bind' })
}
</script>
<template>
  <main>
    <TopMenu />
    <VideoLearnHistory />
    <RouterView v-slot="{ Component, route }">
      <KeepAlive v-if="route.meta.keeyAlive">
        <Suspense>
          <component :is="Component" class="w-full 2xl:w-page mx-auto px-3 mt-5 relative" :key="route.fullPath" />
        </Suspense>
      </KeepAlive>
      <Suspense v-else>
        <component :is="Component" class="w-full 2xl:w-page mx-auto px-3 mt-5 relative" />
      </Suspense>
    </RouterView>
    <Footer class="mt-32" />
    <FooterMenu />
  </main>
</template>
