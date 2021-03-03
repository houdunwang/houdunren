<template>
    <div>
        <div :id="name"></div>
    </div>
</template>

<script>
import wangEditor from 'wangEditor'
export default {
    props: {
        name: { type: String, default: 'editor' },
        uploadImgServer: { type: String, default: `` },
        value: { type: String, default: '' }
    },

    data() {
        return {
            editor: null
        }
    },
    watch: {
        value: {
            handler(n) {
                this.value = n
                if (this.editor) this.editor.txt.html(n)
            },
            immediate: true
        }
    },
    mounted() {
        this.editor = new wangEditor('#' + this.name)
        this.editor.config.uploadImgServer = this.uploadImgServer
        this.editor.config.uploadImgMaxSize = 3 * 1024 * 1024
        this.editor.config.uploadImgMaxLength = 5
        this.editor.config.uploadFileName = 'file'
        this.editor.config.uploadImgHooks = this.uploadHandle
        this.editor.config.showLinkImg = false
        this.editor.config.debug = true
        this.editor.config.onchange = this.updateContent
        this.editor.config.zIndex = 100
        this.editor.config.uploadImgHeaders = {
            'X-CSRF-TOKEN': document.querySelector("meta[name='csrf-token']").content,
            Accept: 'application/json'
        }
        this.editor.config.menus = [
            'head', // 标题
            'bold', // 粗体
            'fontSize', // 字号
            'fontName', // 字体
            'italic', // 斜体
            'underline', // 下划线
            'strikeThrough', // 删除线
            'foreColor', // 文字颜色
            'backColor', // 背景颜色
            'link', // 插入链接
            'list', // 列表
            'justify', // 对齐方式
            'quote', // 引用
            //'emoticon', // 表情
            'image', // 插入图片
            'table', // 表格
            'video', // 插入视频
            'code', // 插入代码
            'undo', // 撤销
            'redo' // 重复
        ]
        this.editor.create()
        this.editor.txt.html(this.value)
    },
    methods: {
        updateContent(html) {
            this.$emit('input', this.editor.txt.html())
        },
        uploadHandle() {
            return {
                before: function(xhr, editor, files) {},
                success: function(xhr, editor, result) {},
                fail: function(xhr, editor, result) {},
                error: function(xhr, editor) {},
                timeout: function(xhr, editor) {},
                customInsert: function(insertImg, result, editor) {}
            }
        }
    }
}
</script>

<style lang="scss"></style>
