<template>
    <div>
        <el-breadcrumb separator-class="el-icon-arrow-right" class="pt-3 pb-2 pl-1">
            <el-breadcrumb-item :to="{ path: '/admin' }">
                <i class="fa fa-home" aria-hidden="true"></i> 首页
            </el-breadcrumb-item>
            <el-breadcrumb-item>站点管理</el-breadcrumb-item>
            <el-breadcrumb-item>设置站点信息</el-breadcrumb-item>
        </el-breadcrumb>

        <el-form ref="form" label-width="100px" :model="field" label-position="right">
            <el-card class="box-card mt-3">
                <div slot="header" class="clearfix">
                    <span>设置站点信息</span>
                </div>
                <div class="text item">
                    <el-row :gutter="180">
                        <el-col :xs="24" :md="16">
                            <el-form-item label="站点名称">
                                <el-input
                                    v-model="field.name"
                                ></el-input>
                            </el-form-item>
                            <el-form-item label="站点介绍">
                                <el-input
                                    type="textarea"
                                    :rows="4"
                                    v-model="field.description"
                                    placeholder=""
                                ></el-input>
                            </el-form-item>
                            <el-form-item label="关键词">
                                <el-input
                                    v-model="field.keyword"
                                ></el-input>
                            </el-form-item>
                            <el-form-item label="ICP备案号">
                                <el-input
                                    v-model="field.icp"
                                ></el-input>
                            </el-form-item>
                            <el-form-item label="电话">
                                <el-input
                                    v-model="field.tel"
                                ></el-input>
                            </el-form-item>
                            <el-form-item label="邮箱">
                                <el-input
                                    v-model="field.email"
                                ></el-input>
                            </el-form-item>
                            <el-form-item label="统计代码">
                                <el-input
                                    type="textarea"
                                    :rows="4"
                                    v-model="field.counter"
                                    placeholder=""
                                ></el-input>
                            </el-form-item>
                        </el-col>
                    </el-row>
                </div>
                <el-divider>
                    <i class="el-icon-arrow-up"></i>
                </el-divider>
                <el-form-item>
                    <el-button type="primary" @click="add">保存提交</el-button>
                </el-form-item>
            </el-card>
        </el-form>
    </div>
</template>

<script>
    import {mapActions, mapState} from "vuex";
    import AccessToken from "../../services/AccessToken";
    import store from "../../store/index";
    import {Message} from "element-ui";

    export default {
        data() {
            return {
                field:{
                    activeName: "base",
                    name: "",
                    keyword: "",
                    description: "",
                    logo: "",
                    icp: '',
                    tel: '',
                    email: '',
                    counter: ''
                }
            };
        },
        computed: {
            //文件上传头信息
            headers() {
                return {
                    Authorization: `Bearer ${AccessToken.get()}`
                };
            }
        },
        methods: {
            ...mapActions("site", ['update']),
            //上传标志
            logoUpload(res, file) {
                // this.setting.base.logo.value = res;
            },
            async add() {
               try{
                   await this.$store.dispatch("site/add",this.field);
                   this.$message.success("添加成功");
               }catch(error){

               }
            }
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
