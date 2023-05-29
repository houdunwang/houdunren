<script lang="ts" setup>
import { ElMessage, ElMessageBox } from 'element-plus'
import TopMenu from './topMenu.vue'
import router from '@/plugins/router'
const { user } = useUserStore()
const { isLogin } = useAuth()
if (isLogin() && !user?.mobile) {
  ElMessage.success('请绑定手机号')
  router.push({ name: RouteName.MEMBER })
}
</script>
<template>
  <main>
    <TopMenu />
    <VideoLearnHistory />
    <RouterView v-slot="{ Component, route }">
      <template v-if="Component">
        <KeepAlive>
          <Suspense>
            <component :is="Component" :key="route.fullPath" class="w-full 2xl:w-page mx-auto px-3 mt-5 relative" />
          </Suspense>
        </KeepAlive>
      </template>
    </RouterView>
    <Footer class="mt-32" />
    <FooterMenu />
  </main>
</template>
