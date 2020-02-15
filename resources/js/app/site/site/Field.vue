<template>
    <div>
        <el-breadcrumb separator-class="el-icon-arrow-right" class="pt-3 pb-2 pl-1">
            <el-breadcrumb-item :to="{ path: '/admin' }">
                <i class="fa fa-home" aria-hidden="true"></i>
                首页
            </el-breadcrumb-item>
            <el-breadcrumb-item :to="{ name:'site.index' }">站点管理</el-breadcrumb-item>
            <el-breadcrumb-item>设置站点信息</el-breadcrumb-item>
        </el-breadcrumb>

        <el-form ref="form" label-width="100px" :rules="rules" :model="field" label-position="right">
            <el-card class="box-card mt-3">
                <div slot="header" class="clearfix">
                    <span>设置站点信息</span>
                </div>
                <div class="text item">
                    <el-row :gutter="180">
                        <el-col :xs="24" :md="16">
                            <el-form-item label="站点名称" prop="name">
                                <el-input v-model="field.name"></el-input>
                            </el-form-item>

                            <el-form-item label="网站域名" prop="domain">
                                <el-input v-model="field.domain" placeholder="如: https://www.github.com"></el-input>
                            </el-form-item>

                            <el-form-item label="网站描述" prop="description">
                                <el-input type="textarea" rows="3" v-model="field.description"></el-input>
                            </el-form-item>

                            <el-form-item label="关键词">
                                <el-input v-model="field.keyword"></el-input>
                            </el-form-item>

                            <el-form-item label="站点标志">
                                <el-upload
                                    class="avatar-uploader"
                                    action="/api/system/upload"
                                    accept="image/jpeg, image/png"
                                    :show-file-list="false"
                                    :on-success="logoUpload"
                                    :headers="headers"
                                >
                                    <img v-if="field.logo" :src="field.logo" class="avatar"/>
                                    <i v-else class="el-icon-plus avatar-uploader-icon"></i>
                                </el-upload>
                            </el-form-item>

                            <el-form-item label="ICP备案号">
                                <el-input v-model="field.icp"></el-input>
                            </el-form-item>

                            <el-form-item label="电话">
                                <el-input v-model="field.tel"></el-input>
                            </el-form-item>

                            <el-form-item label="邮箱">
                                <el-input v-model="field.email"></el-input>
                            </el-form-item>

                            <el-form-item label="统计代码">
                                <el-input type="textarea" :rows="4" v-model="field.counter" placeholder></el-input>
                            </el-form-item>
                        </el-col>
                    </el-row>
                </div>
                <el-divider>
                    <i class="el-icon-arrow-up"></i>
                </el-divider>
                <el-form-item>
                    <el-button type="primary" @click="submit('form')">保存提交</el-button>
                </el-form-item>
            </el-card>
        </el-form>
    </div>
</template>

<script>
    import {mapActions} from "vuex";
    import Token from "../../../services/Token";

    export default {
        props: ["data", "action"],
        data() {
            return {
                field: {
                    activeName: "base",
                    name: "",
                    keyword: "",
                    description: "",
                    logo: "",
                    icp: "",
                    domain: "",
                    tel: "",
                    email: "",
                    counter: ""
                },
                rules: {
                    name: [
                        {required: true, message: "站点名称不能为空", trigger: "blur"},
                        {min: 3, max: 25, message: "长度在 3 到 5 个字符", trigger: "blur"}
                    ],
                    domain: [
                        {required: true, message: "域名不能为空", trigger: "blur"},
                    ]
                }
            };
        },
        async created() {
            if (this.action === "edit") {
                let site = await this.find(this.$route.params.id);
                this.$set(this, "field", site);
            }
        },
        computed: {
            //文件上传头信息
            headers() {
                return {
                    Authorization: `Bearer ${Token.get()}`
                };
            }
        },
        methods: {
            ...mapActions("site", ["edit", "find", "add"]),
            //上传标志
            logoUpload(res, file) {
                this.field.logo = res;
            },
            submit(ref) {
                this.$refs[ref].validate(async valid => {
                    if (valid) {
                        switch (this.action) {
                            case "add":
                                await this.add(this.field);
                                this.$message.success("添加成功");
                                this.$router.push({name: "site.index"});
                                break;
                            case "edit":
                                let response = await this.edit(this.field);
                                this.$message.success("更新成功");
                                this.$router.push({name: "site.index"});
                                break;
                        }
                    } else {
                        return false;
                    }
                });
            }
        }
    };
</script>

<style>
</style>
