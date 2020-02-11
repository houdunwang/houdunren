<template>
    <el-form ref="form" label-width="100px" :model="data">
        <el-tabs v-model="activeName">
            <el-tab-pane label="基本设置" name="base">
                <el-row :gutter="20">
                    <el-col :xs="24" :md="12">
                        <el-form-item label="后台名称">
                            <el-input
                                placeholder="用于在浏览器标签中显示的名称"
                                v-model="data.base.name.value"
                            ></el-input>
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
                                <img
                                    v-if="data.base.logo.value"
                                    :src="data.base.logo.value"
                                    class="avatar"
                                />
                                <i
                                    v-else
                                    class="el-icon-plus avatar-uploader-icon"
                                ></i>
                            </el-upload>
                        </el-form-item>

                        <el-form-item label="后台页脚">
                            <el-input
                                type="textarea"
                                :rows="4"
                                v-model="data.base.footer.value"
                                placeholder="在后面底部显示的内容"
                            ></el-input>
                        </el-form-item>
                        <el-form-item label="明文显示">
                            <el-radio-group v-model="data.base.plaintext.value">
                                <el-radio :label="true">开启</el-radio>
                                <el-radio :label="false">关闭</el-radio>
                            </el-radio-group>
                            <div class="el-upload__tip">
                                开启支付宝、阿里云表单的明文显示
                            </div>
                        </el-form-item>
                    </el-col>
                </el-row>
            </el-tab-pane>

            <el-tab-pane label="注册设置" name="register">
                <el-row :gutter="20">
                    <el-col :xs="24" :md="12">
                        <el-form-item label="体验天数">
                            <el-input
                                placeholder="可使用后台管理权限的天数"
                                v-model="data.register.days.value"
                            >
                                <template slot="append">天</template>
                            </el-input>
                        </el-form-item>

                        <el-form-item label="默认会员组">
                            <el-select
                                v-model="data.register.group_id.value"
                                placeholder="请选择"
                            >
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
import { mapActions, mapState } from "vuex";
import AccessToken from "../../services/AccessToken";
export default {
    data() {
        return {
            activeName: "base"
        };
    },
    computed: {
        ...mapState("setting", ["data"]),
        ...mapState("group", {
            groups: state => state.data
        }),
        //文件上传头信息
        headers() {
            return {
                Authorization: `Bearer ${AccessToken.get()}`
            };
        }
    },
    methods: {
        ...mapActions("setting", ["update", "update"]),
        ...mapActions("group", { getGroups: "get" }),
        logoUpload(res, file) {
            // this.data.base.logo.value = URL.createObjectURL(file.raw);
            // console.log(res, file);
            this.data.base.logo.value = res;
        }
    },
    mounted() {
        this.getGroups();
    }
};
</script>

<style>
.avatar-uploader .el-upload {
    background: #f3f3f3 !important;
    border: 1px dashed #d9d9d9;
    border-radius: 6px;
    cursor: pointer;
    position: relative;
    overflow: hidden;
}
.avatar-uploader .el-upload:hover {
    border-color: #409eff;
}
.avatar-uploader-icon {
    font-size: 28px;
    color: #8c939d;
    width: 178px;
    height: 178px;
    line-height: 178px;
    text-align: center;
}
.avatar {
    display: block;
}
</style>
