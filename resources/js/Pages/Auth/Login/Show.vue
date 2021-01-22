<template>
    <el-form :model="form" ref="form" label-width="80px" :inline="false" size="normal" label-position="top">
        <div class="bg-blue-400 h-screen w-screen">
            <div class="flex flex-col items-center flex-1 h-full justify-center px-4 sm:px-0">
                <div class="flex rounded-lg shadow-lg w-full sm:w-3/4 lg:w-1/2 bg-white sm:mx-0" style="height: 500px">
                    <div class="flex flex-col w-full md:w-1/2 p-4">
                        <div class="flex flex-col flex-1 justify-center mb-8">
                            <h1 class="text-4xl text-center font-thin">会员登录</h1>
                            <div class="w-full mt-4">
                                <form class="form-horizontal w-3/4 mx-auto" method="POST" action="#">
                                    <div class="flex flex-col mt-4">
                                        <el-input v-model="form.account" placeholder="邮箱或手机号"></el-input>
                                        <hd-error :message="errors('account')" />
                                    </div>
                                    <div class="flex flex-col mt-4">
                                        <el-input v-model="form.password" placeholder="请输入登录密码" type="password"></el-input>
                                        <hd-error :message="errors('password')" />
                                    </div>
                                    <div class="flex flex-col mt-4">
                                        <hd-captcha v-model="form.captcha" ref="captcha" />
                                        <hd-error :message="errors('captcha')" />
                                    </div>
                                    <div class="flex items-center mt-4">
                                        <input type="checkbox" name="remember" id="remember" class="mr-2" v-model="form.remember" />
                                        <label for="remember" class="text-sm text-grey-dark">记住我</label>
                                    </div>
                                    <div class="flex flex-col mt-8">
                                        <el-button
                                            type="primary"
                                            size="default"
                                            class="bg-blue-500 hover:bg-blue-700 text-white text-sm font-semibold py-2 px-4 rounded"
                                            @click="onSubmit"
                                        >
                                            登录
                                        </el-button>
                                    </div>
                                </form>
                                <hd-footer> </hd-footer>
                            </div>
                        </div>
                    </div>
                    <div
                        class="hidden md:block md:w-1/2 rounded-r-lg"
                        style="background: url('https://images.unsplash.com/photo-1515965885361-f1e0095517ea?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=3300&q=80'); background-size: cover; background-position: center center;"
                    ></div>
                </div>
            </div>
        </div>
    </el-form>
</template>

<script>
import Layout from '@/Layouts/AuthLayout'
import HdFooter from '../Footer'
import { mapGetters } from 'vuex'
export default {
    layout: Layout,
    components: {
        HdFooter
    },
    data() {
        return {
            form: { account: '', password: '', captcha: '', remember: false }
        }
    },
    computed: {
        ...mapGetters(['errors'])
    },
    methods: {
        async onSubmit() {
            this.axios.post(`/api/auth/login`, this.form).then(_ => {
                location.reload()
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
