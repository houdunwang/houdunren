<template>
    <div>
        <hd-tab :tabs="tabs" />
        <lesson :lessons.sync="lessons.data" #default="{lesson}">
            <el-button-group>
                <el-button type="primary" size="mini" @click="$router.push({ name: 'admin.lesson.edit', params: { id: lesson.id } })">编辑</el-button>
                <el-button type="danger" size="mini" @click="del(lesson)">删除</el-button>
            </el-button-group>
        </lesson>
        <el-pagination class="mt-3" @current-change="currentChange" :page-size="12" :total="lessons.meta.total" background> </el-pagination>
    </div>
</template>

<script>
import tabs from './tabs'
export default {
    data() {
        return {
            lessons: [],
            tabs
        }
    },
    async created() {
        this.lessons = this.currentChange()
    },
    methods: {
        async currentChange(page = 1) {
            this.lessons = await this.axios.get(`lesson?page=${page}`)
        },
        del(lesson) {
            this.$confirm('确定删除吗', '温馨提示').then(() => {
                this.axios.delete('lesson/destroy', lesson)
            })
        }
    }
}
</script>

<style></style>
