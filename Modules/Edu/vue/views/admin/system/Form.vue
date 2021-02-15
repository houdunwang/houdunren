<template>
    <div>
        <hd-tab :tabs="tabs" />
        <el-form :model="form" ref="form" label-width="100px" label-position="right" :inline="false" size="normal">
            <el-card shadow="always" :body-style="{ padding: '20px' }">
                <div slot="header">
                    基本资料
                </div>
                <el-form-item label="课程名称">
                    <el-input v-model="form.title"></el-input>
                    <hd-error name="title" />
                </el-form-item>
                <el-form-item label="课程介绍" size="normal">
                    <el-input v-model="form.description" placeholder="" type="textarea" learable></el-input>
                    <hd-error name="description" />
                </el-form-item>
                <el-form-item label="预览图片" size="normal">
                    <hd-image v-model="form.preview" />
                    <hd-error name="preview" />
                </el-form-item>
            </el-card>
            <el-card shadow="always" :body-style="{ padding: '20px' }" class="mt-3">
                <div slot="header">
                    课程列表
                </div>
                <lesson :lessons.sync="form.lessons" :width="100" #default="{lesson}">
                    <el-button-group>
                        <el-button type="danger" size="mini" @click="delLesson(lesson)">删除</el-button>
                    </el-button-group>
                </lesson>
                <lesson-select @select="addLesson" class="mt-3" />
            </el-card>
            <el-button type="primary" @click="onSubmit" class="block mt-3">保存提交</el-button>
        </el-form>
    </div>
</template>

<script>
import tabs from './tabs'
const form = {
    title: '',
    description: '',
    preview: '',
    lessons: []
}
export default {
    props: ['id'],
    data() {
        return {
            tabs,
            form,
            lessons: []
        }
    },
    async created() {
        if (this.id) this.form = await this.axios.get(`admin/system/${this.id}`)
    },
    methods: {
        //删除课程
        delLesson(lesson) {
            this.$confirm('确定删除吗？', '提示').then(() => {
                this.form.lessons.splice(this.form.lessons.indexOf(lesson), 1)
            })
        },
        //搜索课程的事件函数
        addLesson(lesson) {
            const isExits = this.form.lessons.find(l => l.id == lesson.id)
            if (Boolean(isExits)) {
                return this.$message('课程已经存在')
            }
            this.form.lessons.push(lesson)
            this.$message({ message: '课程添加成功', type: 'success' })
        },
        //提交表单
        async onSubmit() {
            const url = this.id ? `admin/system/${this.id}` : `admin/system`
            await this.axios[this.id ? 'put' : 'post'](url, this.form)
            this.$router.push({ name: 'admin.system.index' })
        }
    }
}
</script>

<style></style>
