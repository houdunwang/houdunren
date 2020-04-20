<template>
  <a-card title="修改头像" size="small">
    <a-upload
      name="file"
      listType="picture-card"
      class="upload"
      :showUploadList="false"
      :withCredentials="true"
      :action="`/api/common/upload/site`"
      @change="upload"
    >
      <img :src="user.avatar" alt="用户头像" />
    </a-upload>
    <a-form-model>
      <a-form-model-item label></a-form-model-item>
    </a-form-model>
  </a-card>
</template>

<script>
import { mapState } from 'vuex'
export default {
  computed: {
    ...mapState('user', { user: 'data' })
  },
  methods: {
    async upload(response) {
      if (response.file.status === 'done') {
        this.$set(this.user, 'avatar', response.file.response.path)
        await this.axios.put(`member/user`, { avatar: this.user.avatar })
        this.$message.success('修改成功')
      }
    }
  }
}
</script>
<style lang="scss" scoped>
.ant-upload {
  img {
    height: 200px;
  }
}
</style>
