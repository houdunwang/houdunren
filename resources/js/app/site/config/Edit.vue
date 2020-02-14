<template>
    <div>
        <el-form ref="form" label-width="100px">
            <el-tabs v-model="activeName">
                <el-tab-pane label="邮箱配置" name="email">

                    <email/>

                </el-tab-pane>
                <el-tab-pane label="阿里云" name="aliYun">
                    <el-row>
                        <el-col :span="16">
                            <ali-yun/>
                        </el-col>
                    </el-row>
                </el-tab-pane>
                <el-tab-pane label="支付宝" name="aliPay">
                    <el-row>
                        <el-col :span="16">
                            <ali-pay/>
                        </el-col>
                    </el-row>
                </el-tab-pane>
                <el-tab-pane label="上传配置" name="upload">
                    <el-row>
                        <el-col :span="16">
                            <upload/>
                        </el-col>
                    </el-row>
                </el-tab-pane>
                <el-tab-pane label="用户相关" name="user">
                    <el-row>
                        <el-col :span="16">
                            <user/>
                        </el-col>
                    </el-row>
                </el-tab-pane>
                <el-tab-pane label="通知设置" name="notification">
                    <notification/>
                </el-tab-pane>
                <el-tab-pane label="临时维护" name="maintain">
                    <maintain/>
                </el-tab-pane>
            </el-tabs>

            <el-form-item class="mt-3">
                <el-button type="primary" @click="submit">保存提交</el-button>
            </el-form-item>
        </el-form>
    </div>
</template>

<script>
    import Email from './components/Email'
    import AliYun from './components/AliYun'
    import AliPay from './components/AliPay'
    import Upload from './components/Upload'
    import User from './components/User'
    import Notification from './components/Notification'
    import Maintain from './components/Maintain'
    import {mapActions} from 'vuex'
    import store from '../../../store'

    export default {
        async beforeRouteEnter(to, from, next) {
            await store.dispatch('site/getConfig', to.params.id);
            next();
        },
        data() {
            return {
                activeName: 'email'
            }
        },
        components: {
            Email, AliYun, AliPay, Upload, User, Notification, Maintain
        },
        methods: {
            ...mapActions('site', ['updateConfig', 'getConfig']),
            async submit() {
                await this.updateConfig(this.$route.params.id);
                this.$message.success('更新成功');
            }
        }
    }
</script>
<style>

</style>
