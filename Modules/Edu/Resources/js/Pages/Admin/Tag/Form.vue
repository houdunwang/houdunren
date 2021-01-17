<template>
    <hd-layout :tabs="tabs" home="Edu.admin.index">
        <el-form :model="form" ref="form" label-width="100px" :inline="false" size="normal" @submit.native.prevent>
            <el-card shadow="always" :body-style="{ padding: '20px' }">
                <div slot="header">
                    标签设置
                </div>

                <div>
                    <el-tag :key="index" v-for="(tag, index) in form.tags" closable :disable-transitions="false" @close="delTag(tag)" class="mr-1">
                        {{ tag.title }}
                    </el-tag>
                    <el-input
                        class="input-new-tag inline-block w-32"
                        v-if="inputVisible"
                        v-model="inputValue"
                        ref="saveTagInput"
                        size="small"
                        @keyup.enter.native="handleInputConfirm"
                        @blur="handleInputConfirm"
                    >
                    </el-input>
                    <el-button v-else class="button-new-tag" size="small" @click.prevent="showInput">+ 添加标签</el-button>
                </div>

                <el-button type="primary" @click="onSubmit" class="mt-3 block">保存提交</el-button>
            </el-card>
        </el-form>
    </hd-layout>
</template>

<script>
import tabs from './tabs'
export default {
    props: ['tags'],
    data() {
        return {
            tabs,
            inputVisible: false,
            inputValue: '',
            form: this.$inertia.form({
                tags: this.tags
            })
        }
    },
    methods: {
        delTag(tag) {
            this.form.tags.splice(this.form.tags.indexOf(tag), 1)
        },
        showInput() {
            this.inputVisible = true
            this.$nextTick(_ => {
                this.$refs.saveTagInput.$refs.input.focus()
            })
        },
        handleInputConfirm() {
            let inputValue = this.inputValue
            if (inputValue) {
                this.form.tags.push({ title: inputValue })
            }
            this.inputVisible = false
            this.inputValue = ''
        },
        addTag() {
            this.form.tags.push({ title: '' })
        },
        onSubmit() {
            this.form.put(route('Edu.admin.tag.update'))
        }
    }
}
</script>

<style></style>
