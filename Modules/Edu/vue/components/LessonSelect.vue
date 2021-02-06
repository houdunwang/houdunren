<template>
    <div>
        <el-dialog title="课程选择" :visible.sync="dialogTableVisible" width="60%">
            <div class="flex mb-3">
                <el-input v-model="keyword" placeholder="" size="normal" clearable class="mr-2"></el-input>
                <el-button type="primary" size="default" @click="search">搜索</el-button>
            </div>
            <lesson :lessons="lessons" :width="80" #default="{lesson}">
                <el-button-group>
                    <el-button type="danger" size="mini" @click="$emit('select', lesson)">选择</el-button>
                </el-button-group>
            </lesson>
        </el-dialog>
        <el-button type="success" size="mini" @click="dialogTableVisible = true">选择课程</el-button>
    </div>
</template>

<script>
export default {
    data() {
        return {
            dialogTableVisible: false,
            lessons: [],
            keyword: ''
        }
    },
    methods: {
        async search() {
            this.lessons = await this.axios.get(`lesson/search?keyword=${this.keyword}`)
        }
    }
}
</script>

<style></style>
