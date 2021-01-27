<template>
    <hd-layout :tabs="[{ label: '我的资料', name: 'edit', route: 'system.my.edit' }]" home="system.home">
        <el-form :model="form" ref="form" label-width="80px" :inline="false" size="normal">
            <el-card shadow="always" :body-style="{ padding: '20px' }">
                <div slot="header">
                    <span>基本资料</span>
                </div>
                <el-form-item label="昵称">
                    <el-input v-model="form.name"></el-input>
                    <hd-error :message="form.errors.name" />
                </el-form-item>
                <el-form-item label="邮箱">
                    <el-input v-model="form.email"></el-input>
                    <hd-error :message="form.errors.email" />
                </el-form-item>
                <el-form-item label="QQ">
                    <el-input v-model="form.qq"></el-input>
                    <hd-error :message="form.errors.qq" />
                </el-form-item>
                <el-form-item label="手机号">
                    <el-input v-model="form.mobile"></el-input>
                    <hd-error :message="form.errors.mobile" />
                </el-form-item>
                <el-form-item label="github">
                    <el-input v-model="form.github"></el-input>
                    <hd-error :message="form.errors.github" />
                </el-form-item>
                <el-form-item label="微博">
                    <el-input v-model="form.weibo"></el-input>
                    <hd-error :message="form.errors.weibo" />
                </el-form-item>
            </el-card>

            <el-card shadow="always" :body-style="{ padding: '20px' }" class="mt-3">
                <div slot="header">
                    <span>密码修改</span>
                </div>
                <el-form-item label="密码">
                    <el-input type="password" v-model="form.password"></el-input>
                    <hd-error :message="form.errors.password" />
                </el-form-item>
                <el-form-item label="确认密码">
                    <el-input type="password" v-model="form.password_confirmation"></el-input>
                </el-form-item>
            </el-card>
            <div class="mt-3">
                <el-button type="primary" @click="onSubmit">保存提交</el-button>
            </div>
        </el-form>
    </hd-layout>
</template>

<script>
export default {
    data() {
        return {
            form: this.$inertia.form({ ...this.$page.props.user, password: '', password_confirmation: '' })
        }
    },
    methods: {
        onSubmit() {
            const url = route('system.my.update')
            this.form.put(url)
        }
    }
}
</script>

<style></style>
