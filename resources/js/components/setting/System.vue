<template>
    <el-form ref="form" label-width="100px" :model="setting">
        <el-tabs v-model="activeName">
            <el-tab-pane label="基本设置" name="base">
                <el-row :gutter="20">
                    <el-col :xs="24" :md="12">
                        <el-form-item label="后台名称">
                            <el-input placeholder="用于在浏览器标签中显示的名称" v-model="setting.base.name.value"></el-input>
                        </el-form-item>

                        <el-form-item label="后台标志">
                            <el-upload
                                class="avatar-uploader"
                                action="/api/system/upload"
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
                    <el-col :xs="24" :md="12">
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
    import {mapActions, mapState} from "vuex";
    import AccessToken from "../../services/AccessToken";
    import store from "../../store/index";
    import {Message} from "element-ui";

    export default {
        data() {
            return {
                activeName: "base"
            };
        },
        computed: {
            ...mapState("setting", {setting: 'data'}),
            ...mapState("group", {groups: 'data'}),
            //文件上传头信息
            headers() {
                return {
                    Authorization: `Bearer ${AccessToken.get()}`
                };
            }
        },
        methods: {
            ...mapActions("setting", ["edit"]),
            ...mapActions("group", {getGroups: "all"}),

            //上传标志
            logoUpload(res, file) {
                this.setting.base.logo.value = res;
            },
            async update() {
                let response = await this.$store.dispatch("setting/update");
                this.$message.success(response.data.message);
            }
        },
        created() {
            this.getGroups();
        }
    };
</script>
