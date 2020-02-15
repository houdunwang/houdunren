<template>
  <el-form ref="form" label-width="100px" :model="setting">
    <el-tabs v-model="activeName">
      <el-tab-pane label="基本设置" name="base">
        <el-row :gutter="20">
          <el-col :xs="24" :md="12" v-if="setting.base">

            <el-form-item label="后台名称">
              <el-input placeholder="用于在浏览器标签中显示的名称" v-model="setting.base.name.value"></el-input>
            </el-form-item>

            <el-form-item label="后台标志">
              <el-upload
                class="avatar-uploader"
                :action="uploadUrl"
                accept="image/jpeg, image/png"
                :show-file-list="false"
                :on-success="logoUpload"
                :headers="headers"
              >
                <img v-if="setting.base.logo.value" :src="setting.base.logo.value" class="avatar"/>
                <i v-else class="el-icon-plus avatar-uploader-icon"></i>
              </el-upload>
            </el-form-item>

            <el-form-item label="后台页脚">
              <el-input
                type="textarea"
                :rows="4"
                v-model="setting.base.footer.value"
                placeholder="在后面底部显示的内容"
              ></el-input>
            </el-form-item>
          </el-col>
        </el-row>
      </el-tab-pane>

      <el-tab-pane label="注册设置" name="register">
        <el-row :gutter="20">
          <el-col :xs="24" :md="12" v-if="setting.register">
            <el-form-item label="体验天数">
              <el-input placeholder="可使用后台管理权限的天数" v-model="setting.register.days.value">
                <template slot="append">天</template>
              </el-input>
            </el-form-item>

            <el-form-item label="默认会员组">
              <el-select v-model="setting.register.group_id.value" placeholder="请选择">
                <el-option
                  v-for="item in groups"
                  :key="item.id"
                  :label="item.name"
                  :value="item.id"
                ></el-option>
              </el-select>
            </el-form-item>
          </el-col>
        </el-row>
      </el-tab-pane>
    </el-tabs>
    <el-divider>
      <i class="el-icon-arrow-up"></i>
    </el-divider>
    <el-form-item>
      <el-button type="primary" @click="update">保存提交</el-button>
    </el-form-item>
  </el-form>
</template>

<script>
  import Token from "@/services/token";

  export default {
    data() {
      return {
        activeName: "base",
        setting: {base: null, register: null},
        groups: []
      };
    },
    async created() {
      let response = await Promise.all([
        this.axios.get('/system/group'),
        this.axios.get('/system/config/1')
      ]);
      this.groups = response[0].data.data;
      this.setting = response[1].data.data
    },
    computed: {
      uploadUrl() {
        return `${window.api}/system/upload`
      },
      headers() {
        return {
          //文件上传头信息
          Authorization: `Bearer ${Token.get()}`
        };
      }
    },
    methods: {
      logoUpload(res, file) {
        //上传标志
        this.setting.base.logo.value = res;
      },
      async update() {
        await this.axios.post('/system/config', {data: this.setting});
        await this.$store.dispatch('systemConfig/get')
        this.$message.success('更新成功');
      }
    },

  };
</script>
