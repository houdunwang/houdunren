<script setup lang="ts">
const { user } = defineProps<{ user: UserModel }>()
const { isAdministrator } = useUser()
const { removeAvatar, lockUser, removeAllData } = useUser()
</script>

<template>
  <div class="text-3xl flex items-center gap-3 mt-3 icon">
    <el-popover placement="top" :width="300" trigger="hover" :content="`${user.github}`" v-if="user.github">
      <template #reference>
        <icon-github theme="outline" />
      </template>
    </el-popover>
    <el-popover placement="top" :width="300" trigger="hover" :content="`${user.email}`" v-if="user.email">
      <template #reference>
        <icon-email-successfully theme="outline" />
      </template>
    </el-popover>
    <el-popover placement="top" :width="300" trigger="hover" :content="`${user.home}`" v-if="user.home">
      <template #reference>
        <icon-home-two theme="outline" />
      </template>
    </el-popover>
    <el-popover placement="top" :width="300" trigger="hover" :content="`${user.weibo}`" v-if="user.weibo">
      <template #reference>
        <icon-weibo theme="outline" />
      </template>
    </el-popover>
    <el-popover placement="top" :width="300" trigger="hover" :content="`${user.wechat}`" v-if="user.wechat">
      <template #reference>
        <icon-wechat theme="outline" />
      </template>
    </el-popover>
    <el-popover
      placement="top"
      :width="300"
      trigger="hover"
      :content="`Wakttime: ${user.wakatime}`"
      v-if="user.wakatime">
      <template #reference>
        <icon-waterfalls-v theme="outline" />
      </template>
    </el-popover>
    <el-dropdown trigger="click" size="default" type="primary" v-if="isAdministrator()">
      <icon-all-application theme="outline" size="26" />
      <template #dropdown>
        <el-dropdown-menu>
          <el-dropdown-item @click="removeAvatar(user.id)"> 移除头像 </el-dropdown-item>
          <el-dropdown-item @click="lockUser(user.id)"> 锁定用户 </el-dropdown-item>
          <el-dropdown-item @click="removeAllData(user.id)"> 清空用户数据 </el-dropdown-item>
        </el-dropdown-menu>
      </template>
    </el-dropdown>
  </div>
</template>

<style lang="scss" scoped>
.icon {
  .i-icon {
    @apply text-yellow-600 hover:text-yellow-300 cursor-pointer duration-300;
  }
}
</style>
