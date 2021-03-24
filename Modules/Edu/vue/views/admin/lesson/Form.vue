<template>
    <div>
        <tab :tabs="tabs" />
        <el-form :model="form" ref="form" label-width="100px" label-position="right" :inline="false" size="normal">
            <el-card shadow="never" :body-style="{ padding: '20px' }">
                <div slot="header">
                    基本资料
                </div>
                <el-form-item label="课程名称">
                    <el-input v-model="form.title"></el-input>
                    <hd-error name="title" />
                </el-form-item>
                <el-form-item label="课程上架">
                    <el-radio-group v-model="form.status" size="mini">
                        <el-radio-button :label="true">
                            上架
                        </el-radio-button>
                        <el-radio-button :label="false">
                            下架
                        </el-radio-button>
                    </el-radio-group>
                </el-form-item>
                <el-form-item label="推荐课程">
                    <el-checkbox v-model="form.is_commend" :true-label="1" :false-label="0">推荐</el-checkbox>
                </el-form-item>
                <el-form-item label="课程介绍" size="normal">
                    <el-input v-model="form.description" placeholder="" type="textarea" learable></el-input>
                    <hd-error name="description" />
                </el-form-item>
                <el-form-item label="预览图片" size="normal">
                    <image-upload v-model="form.thumb" />
                    <hd-error name="thumb" />
                </el-form-item>
                <el-form-item label="高清下载地址" size="normal">
                    <el-input v-model="form.download_address" placeholder="" size="normal" clearable></el-input>
                    <hd-error name="download_address" />
                </el-form-item>
            </el-card>
            <el-card shadow="never" :body-style="{ padding: '20px' }" class="mt-3">
                <div slot="header">
                    销售
                </div>
                <el-form-item label="免费观看数量" size="normal">
                    <el-input v-model="form.free_num" placeholder="" size="normal" clearable></el-input>
                    <hd-error name="free_num" />
                </el-form-item>
                <el-form-item label="售价" size="normal">
                    <el-input v-model="form.price" placeholder="" size="normal" clearable></el-input>
                    <hd-error name="price" />
                </el-form-item>
            </el-card>

            <el-card shadow="never" :body-style="{ padding: '20px' }" class="mt-3">
                <div slot="header">
                    标签选择
                </div>
                <tags v-model="form.tags" />
            </el-card>
            <el-card shadow="never" :body-style="{ padding: '20px' }" class="mt-3">
                <div slot="header">
                    课程视频
                </div>

                <draggable v-model="form.videos" group="people" class="grid grid-cols-1 md:grid-cols-4 gap-2">
                    <el-card shadow="never" :body-style="{ padding: '20px' }" class="relative overflow-visible" v-for="(video, i) in form.videos" :key="i">
                        <i
                            @click="form.videos.splice(i, 1)"
                            class="fas fa-times-circle absolute -right-2 -top-3 cursor-pointer text-gray-300 text-xl hover:text-gray-700 duration-300"
                        ></i>
                        <el-form-item label="视频名称" size="normal">
                            <el-input placeholder="" size="normal" clearable v-model="video.title"></el-input>
                        </el-form-item>
                        <el-form-item label="播放地址" size="normal">
                            <el-input placeholder="" size="normal" v-model="video.path" clearable></el-input>
                        </el-form-item>
                        <el-form-item label="外部播放地址" size="normal">
                            <el-input placeholder="" size="normal" v-model="video.external_address" clearable></el-input>
                        </el-form-item>
                    </el-card>
                </draggable>

                <div class="mt-3 border-t border-gray-100 pt-3">
                    <el-button type="success" size="small" @click="form.videos.push({ title: '', path: '', external_address: '' })">添加视频</el-button>
                </div>
            </el-card>

            <el-button type="primary" @click="onSubmit" class="block mt-3">保存提交</el-button>
        </el-form>
    </div>
</template>

<script>
import tabs from './tabs.js'
const form = {
    title: '',
    description: '',
    thumb: '',
    type: 'project',
    status: true,
    free_num: 0,
    price: 0,
    is_commend: false,
    download_address: '',
    tags: [],
    videos: []
}
import draggable from 'vuedraggable'
export default {
    route: false,
    components: { draggable },
    props: ['id'],
    data() {
        return {
            tabs,
            form
        }
    },
    async created() {
        if (this.id) {
            this.form = Object.assign(form, await this.axios.get(`lesson/${this.id}`))
            this.form.tags = this.form.tags.map(t => t.id)
        }
    },
    methods: {
        async onSubmit() {
            const url = this.id ? `lesson/${this.id}` : 'lesson'
            await this.axios[this.id ? 'put' : 'post'](url, this.form)
            this.$router.push({ name: 'admin.lesson.index' })
        }
    }
}
</script>

<style></style>
