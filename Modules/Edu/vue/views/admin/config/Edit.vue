<template>
    <div>
        <hd-tab :tabs="tabs" />
        <el-form :model="form" ref="form" label-width="100px" :inline="false" size="normal">
            <el-card shadow="always" :body-style="{ padding: '20px' }">
                <el-form-item label="直播公告">
                    <el-input type="textarea" v-model="form.live.notice"></el-input>
                </el-form-item>
                <el-form-item label="直播公告">
                    <el-radio-group v-model="form.live.site_live" size="mini">
                        <el-radio-button :label="true">
                            站内推流
                        </el-radio-button>
                        <el-radio-button :label="false">
                            站外推流
                        </el-radio-button>
                    </el-radio-group>
                </el-form-item>

                <el-card shadow="never" :body-style="{ padding: '20px' }" v-if="form.live.site_live == true">
                    <div slot="header">
                        推流设置
                    </div>
                    <el-form-item label="推流地址" size="normal">
                        <el-input v-model="form.live.aliyun.push_url" placeholder="" size="normal" clearable></el-input>
                    </el-form-item>
                    <el-form-item label="推流鉴权KEY" size="normal">
                        <el-input v-model="form.live.aliyun.push_key" placeholder="" size="normal" clearable></el-input>
                    </el-form-item>
                    <el-form-item label="播流地址" size="normal">
                        <el-input v-model="form.live.aliyun.play_url" placeholder="" size="normal" clearable></el-input>
                    </el-form-item>
                    <el-form-item label="播流鉴权KEY" size="normal">
                        <el-input v-model="form.live.aliyun.play_key" placeholder="" size="normal" clearable></el-input>
                    </el-form-item>
                </el-card>

                <el-card shadow="never" :body-style="{ padding: '20px' }" v-if="form.live.site_live == false">
                    <div slot="header">
                        推流设置
                    </div>
                    <el-form-item label="播放地址" size="normal">
                        <el-input type="textarea" v-model="form.live.other_path" placeholder="" size="normal" clearable></el-input>
                        <hd-tip>
                            斗鱼等第三方播放地址
                        </hd-tip>
                    </el-form-item>
                </el-card>
            </el-card>
            <el-button type="primary" @click="onSubmit" class="mt-3 block">保存提交</el-button>
        </el-form>
    </div>
</template>

<script>
import tabs from './tabs'
import _ from 'lodash'
const form = {
    live: {
        notice: '',
        site_live: true,
        other_path: '',
        show_chat: true,
        aliyun: {
            push_url: '',
            push_key: '',
            play_url: '',
            play_key: ''
        }
    }
}
export default {
    route: { path: `/Edu/site/${window.site.id}/admin` },
    data() {
        return {
            tabs,
            form
        }
    },
    async created() {
        this.form = _.merge(form, await axios.get(`/api/module/config/site/${this.site.id}/module/${this.module.id}`))
    },
    methods: {
        onSubmit() {
            this.axios.put(`/api/module/config/site/${this.site.id}/module/${this.module.id}`, this.form)
        }
    }
}
</script>

<style></style>
