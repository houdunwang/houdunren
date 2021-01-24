<template>
    <hd-layout :tabs="tabs" home="Edu.admin.index">
        <el-form :model="form" ref="form" label-width="100px" label-position="right" :inline="false" size="normal">
            <el-card shadow="always" :body-style="{ padding: '20px' }">
                <div slot="header">
                    基本资料
                </div>
                <el-form-item label="课程名称">
                    <el-input v-model="form.title"></el-input>
                    <hd-error :message="form.errors.title" />
                </el-form-item>
                <el-form-item label="课程介绍" size="normal">
                    <el-input v-model="form.description" placeholder="" type="textarea" learable></el-input>
                    <hd-error :message="form.errors.description" />
                </el-form-item>
                <el-form-item label="预览图片" size="normal">
                    <hd-image v-model="form.preview" />
                    <hd-error :message="form.errors.preview" />
                </el-form-item>
            </el-card>

            <el-card shadow="always" :body-style="{ padding: '20px' }" class="mt-3">
                <div slot="header">
                    课程列表
                </div>
                <lesson v-model="form.lessons" :width="100" #default="{lesson}">
                    <el-button-group>
                        <el-button type="danger" size="mini" @click="delLesson(lesson)">删除</el-button>
                    </el-button-group>
                </lesson>
                <lesson-select @select="addLesson" class="mt-3" />
            </el-card>
            <el-button type="primary" @click="onSubmit" class="block mt-3">保存提交</el-button>
        </el-form>
    </hd-layout>
</template>

<script>
import LessonSelect from '@/components/LessonSelect.vue'
import tabs from './tabs'
const form = {
    title: '',
    description: '',
    preview: '',
    lessons: []
}
export default {
    components: { LessonSelect },
    props: ['systemLesson'],
    data() {
        return {
            tabs,
            form: this.$inertia.form(this.systemLesson || form)
        }
    },
    methods: {
        //提交表单
        onSubmit() {
            if (this.systemLesson) {
                this.form.put(route('Edu.admin.system.update', this.systemLesson))
            } else {
                this.form.post(route('Edu.admin.system.store'))
            }
        },
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
                this.$message('课程已经存在')
            } else {
                this.form.lessons.push(lesson)
                this.$message({ message: '课程添加成功', type: 'success' })
            }
        }
    }
}
</script>

<style></style>
