<template>
    <div>
        <tab :tabs="tabs" />
        <el-form :model="form" ref="form" label-width="100px" :inline="false" size="normal" @submit.native.prevent>
            <el-card shadow="never" :body-style="{ padding: '20px' }">
                <div>
                    <el-tag
                        :key="index"
                        v-for="(tag, index) in form.tags"
                        closable
                        :disable-transitions="false"
                        @close="delTag(tag)"
                        class="mr-1 mb-2 inline-block"
                    >
                        {{ tag.title }}
                    </el-tag>
                    <el-input
                        class="input-new-tag inline-block w-32"
                        v-if="inputVisible"
                        v-model="inputValue"
                        ref="saveTagInput"
                        size="small"
                        @keyup.enter.native="onSubmit"
                        @blur="onSubmit"
                    >
                    </el-input>
                    <el-button v-else class="button-new-tag" size="small" @click.prevent="showInput">+ 添加标签</el-button>
                </div>
            </el-card>
        </el-form>
    </div>
</template>

<script>
import tabs from './tabs'
export default {
    data() {
        return {
            tabs,
            inputVisible: false,
            inputValue: '',
            form: {
                tags: []
            }
        }
    },
    async created() {
        this.form.tags = await this.axios.get(`tag`)
    },
    methods: {
        delTag(tag) {
            this.form.tags.splice(this.form.tags.indexOf(tag), 1)
            this.form.put(route('Edu.admin.tag.update'))
        },
        showInput() {
            this.inputVisible = true
            this.$nextTick(_ => {
                this.$refs.saveTagInput.$refs.input.focus()
            })
        },
        onSubmit() {
            let inputValue = this.inputValue
            if (this.form.tags.some(t => t.title == inputValue)) {
                return this.$message('标签已经存在')
            }
            if (inputValue) {
                this.form.tags.push({ title: inputValue })
                this.axios.put(`tag`, this.form)
            }
            this.inputVisible = false
            this.inputValue = ''
        }
    }
}
</script>

<style></style>
