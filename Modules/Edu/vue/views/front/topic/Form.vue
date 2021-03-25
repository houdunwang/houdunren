<template>
    <div class="container-xl mt-10">
        <div class="card">
            <div class="card-header h-14">
                {{ id ? '编辑贴子' : '发表贴子' }}
            </div>
            <div class="card-body">
                <el-input v-model="form.title" placeholder="请输入贴子标题" size="normal" clearable></el-input>
                <hd-form-error name="title" />
                <tags v-model="form.tags" class="mt-3" />
                <hd-form-error name="tags" />
                <hd-tui-editor v-model="form.content" class="border mt-3" :sid="site.id" />
                <hd-form-error name="content" />
            </div>
            <div class="card-footer text-muted">
                <button class="btn btn-azure" @click="onSubmit">保存提交</button>
            </div>
        </div>
    </div>
</template>

<script>
const form = { title: '', content: '', tags: [] }
export default {
    route: false,
    props: ['id'],
    data() {
        return {
            form
        }
    },
    async created() {
        if (this.id) {
            const topic = await axios.get(`topic/${this.id}`)
            topic.tags = topic.tags.map(t => t.id)
            this.form = topic
        }
    },
    methods: {
        async onSubmit() {
            if (this.form.tags.length == 0) {
                return this.$message('选择一个标签吧')
            }
            const url = this.id ? `topic/${this.id}` : `topic`
            const { data: form } = await axios[this.id ? 'put' : 'post'](url, this.form)
            this.router('front.topic.show', { id: form.id })
        }
    }
}
</script>

<style></style>
