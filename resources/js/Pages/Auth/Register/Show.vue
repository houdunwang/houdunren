<template>
    <el-form :model="form" ref="form" label-width="80px" :inline="false" size="normal" label-position="top">
        <div class="min-w-screen min-h-screen bg-gray-900 flex items-center justify-center px-5 py-5">
            <div class="bg-gray-100 text-gray-500 rounded-3xl shadow-xl w-full overflow-hidden" style="max-width:1000px">
                <div class="md:flex w-full">
                    <div
                        class="hidden md:block w-1/2 bg-indigo-500 py-10 px-10 bg-cover"
                        style="background-image:url('https://images.unsplash.com/photo-1546514714-df0ccc50d7bf?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=667&q=80')"
                    ></div>
                    <div class="w-full md:w-1/2 py-10 px-5 md:px-10">
                        <div class="text-center mb-10">
                            <h1 class="font-bold text-3xl text-gray-900">注册</h1>
                            <p>为了美好的生活，一起努力</p>
                        </div>
                        <div>
                            <div class="flex -mx-3">
                                <div class="w-full px-3 mb-5">
                                    <label for="" class="text-xs font-semibold px-1">帐号</label>
                                    <div class="flex flex-col">
                                        <hd-code v-model="form.account" class="flex-1 mb-2" placeholder="请输入手机号或邮箱" action="/auth/register/code" />
                                    </div>
                                </div>
                            </div>
                            <div class="flex -mx-3">
                                <div class="w-full px-3 mb-5">
                                    <label class="text-xs font-semibold px-1">验证码</label>
                                    <div class="flex flex-col">
                                        <el-input placeholder="请输入收到的验证码" class="mr-1" v-model="form.code"> </el-input>
                                        <hd-error :message="form.errors.code" />
                                    </div>
                                </div>
                            </div>
                            <div class="grid grid-cols-2 gap-3">
                                <el-form-item label="密码" class="flex-1">
                                    <el-input type="password" v-model="form.password" placeholder="请输入新密码"></el-input>
                                    <hd-error :message="form.errors.password" />
                                </el-form-item>
                                <el-form-item label="确认密码" class="flex-1">
                                    <el-input type="password" v-model="form.password_confirmation" placeholder="请再输一次密码"></el-input>
                                </el-form-item>
                            </div>
                            <div class="flex -mx-3">
                                <div class="w-full px-3 mb-5">
                                    <button
                                        class="block w-full max-w-xs mx-auto bg-indigo-500 hover:bg-indigo-700 focus:bg-indigo-700 text-white rounded-lg px-3 py-3 font-semibold"
                                        @click.prevent="onSubmit"
                                    >
                                        注册
                                    </button>
                                </div>
                            </div>
                            <hd-footer> </hd-footer>
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
    props: ['user'],
    data() {
        return {
            form: this.$inertia.form({ account: '', code: '', password: '', password_confirmation: '', captcha: '', remember: false })
        }
    },
    methods: {
        onSubmit() {
            this.form.post(route('auth.register'))
        }
    }
}
</script>

<style>
.auth .el-input-group__append {
    padding: 0 !important;
}
</style>
