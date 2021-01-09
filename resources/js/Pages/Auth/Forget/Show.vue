<template>
    <el-form :model="form" ref="form" label-width="80px" :inline="false" size="normal" label-position="top">
        <div class="min-w-screen min-h-screen bg-gray-900 flex items-center justify-center px-5 py-5">
            <div class="bg-gray-100 text-gray-500 rounded-3xl shadow-xl w-full overflow-hidden" style="max-width:1000px">
                <div class="md:flex w-full">
                    <div
                        class="hidden md:block w-1/2 bg-indigo-500 py-10 px-10 bg-cover bg-center"
                        style="background-image:url('https://images.unsplash.com/photo-1584433144859-1fc3ab64a957?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1488&q=80')"
                    ></div>
                    <div class="w-full md:w-1/2 py-10 px-5 md:px-10">
                        <div class="text-center mb-10">
                            <h1 class="font-bold text-3xl text-gray-900">找回密码</h1>
                        </div>
                        <div>
                            <div class="grid grid-cols-1 gap-3">
                                <el-form-item label="登录帐号" class="flex-1">
                                    <el-input v-model="form.mobile" placeholder="请输入登录帐号"></el-input>
                                </el-form-item>
                            </div>
                            <div class="flex -mx-3">
                                <div class="w-full px-3 mb-5">
                                    <label for="" class="text-xs font-semibold px-1">图形验证码</label>
                                    <div class="flex">
                                        <hd-captcha v-model="form.captcha" class="flex-1" />
                                    </div>
                                </div>
                            </div>
                            <div class="flex -mx-3">
                                <div class="w-full px-3 mb-5">
                                    <label for="" class="text-xs font-semibold px-1">手机验证码</label>
                                    <div class="flex">
                                        <hd-code :mobile="form.mobile" v-model="form.code" class="flex-1" />
                                    </div>
                                </div>
                            </div>
                            <div class="grid grid-cols-2 gap-3">
                                <el-form-item label="新密码" class="flex-1">
                                    <el-input v-model="form.password" placeholder="请输入手机号"></el-input>
                                </el-form-item>
                                <el-form-item label="确认密码" class="flex-1">
                                    <el-input v-model="form.confirm_password" placeholder="你的个性昵称"></el-input>
                                </el-form-item>
                            </div>
                            <div class="flex -mx-3">
                                <div class="w-full px-3 mb-5">
                                    <button
                                        class="block w-full max-w-xs mx-auto bg-indigo-500 hover:bg-indigo-700 focus:bg-indigo-700 text-white rounded-lg px-3 py-3 font-semibold"
                                    >
                                        注册
                                    </button>
                                </div>
                            </div>
                            <hd-footer />

                            </hd-footer>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </el-form>
</template>

<script>
import Layout from '@/Layouts/AuthLayout'
import HdFooter from '../Footer'
export default {
    layout: Layout,
    components: {
        HdFooter
    },
    data() {
        return {
            form: this.$inertia.form({ mobile: '', code: '', password: '', captcha: '', remember: false }),
            captcha: `/captcha`
        }
    },
    methods: {
        onSubmit() {
            this.form.post(route('auth.login.store'), {
                onFinish: () => {
                    this.captcha = `/captcha?` + Math.random()
                }
            })
        }
    }
}
</script>

<style>
.auth .el-input-group__append {
    padding: 0 !important;
}
</style>
