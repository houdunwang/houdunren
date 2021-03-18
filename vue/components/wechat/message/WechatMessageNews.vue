<template>
    <el-dialog title="图文素材设置" :visible.sync="dialogShow" width="70%" top="1rem" :append-to-body="true" :close-on-click-modal="false">
        <el-form :model="form" ref="form" label-width="100px" :inline="false" size="normal">
            <el-card shadow="nerver" :body-style="{ padding: '20px' }">
                <hd-wechat-message-rule :form="form" />
                <div class="flex">
                    <div class="w-60 preview">
                        <draggable v-model="form.content">
                            <div
                                v-for="(art, index) in form.content"
                                :key="index"
                                class="border border-gray-200 mb-1 cursor-pointer flex"
                                :class="{ 'p-2 items-start': index, 'border-green-600': article == art, 'flex-col': !index }"
                                @click="edit(art)"
                            >
                                <el-image
                                    :src="art.picurl || `/images/nopic480x310.jpg`"
                                    fit="cover"
                                    :class="{ 'w-1/3 order-2': index }"
                                    class="border"
                                ></el-image>
                                <div :class="{ 'w-2/3 flex-1 pr-2': index }">
                                    <div class="bg-gray-500 font-light p-1 text-white flex justify-center items-center text-sm" v-if="!index">
                                        {{ art.title }}
                                    </div>
                                    <div class="text-gray-500 font-light text-xs leading-snug" v-else>
                                        {{ art.description | truncate(30) }}
                                    </div>
                                </div>
                            </div>
                        </draggable>
                        <el-button type="primary" size="mini" @click="add">添加图文</el-button>
                    </div>
                    <div class="flex-1 pl-3">
                        <el-card shadow="nerver" :body-style="{ padding: '20px' }">
                            <el-form-item label="文章标题">
                                <el-input v-model="article.title"></el-input>
                            </el-form-item>
                            <el-form-item label="文章简介">
                                <el-input v-model="article.description"></el-input>
                            </el-form-item>
                            <el-form-item label="缩略图">
                                <div class="flex flex-col">
                                    <hd-image v-model="article.picurl" fit="fill" class="w-36 h-auto"></hd-image>
                                </div>
                            </el-form-item>
                            <el-form-item label="跳转链接">
                                <el-input v-model="article.url"></el-input>
                            </el-form-item>
                        </el-card>
                    </div>
                </div>
            </el-card>
        </el-form>
        <span slot="footer">
            <el-button @click="dialogShow = false">关闭</el-button>
            <el-button type="primary" @click="onSubmit" :disabled="isSubmit" v-loading="isSubmit">保存提交</el-button>
        </span>
    </el-dialog>
</template>

<script>
const article = {
    title: '',
    picurl: '',
    url: '',
    description: ''
}
const form = {
    title: '',
    type: 'news',
    keyword_type: 'all',
    keyword: '',
    content: [{ ...article }]
}
import Mixin from './Mixin'
import draggable from 'vuedraggable'
export default {
    mixins: [Mixin(form)],
    components: { draggable },
    data() {
        return {
            isSubmit: false,
            form: _.merge({}, this.message || form),
            dialogShow: this.show,
            //当前编辑的文章
            article: ''
        }
    },
    //编辑数据
    watch: {
        message: {
            handler(message) {
                this.form = _.merge({}, message || form)
                this.article = this.form.content[0]
            },
            immediate: true
        }
    },
    methods: {
        edit(article) {
            this.article = article
        },
        add() {
            if (this.form.content.length >= 5) {
                return this.$message('图文消息只能添加5个')
            }
            this.form.content.push((this.article = _.merge({}, article)))
        }
    }
}
</script>

<style></style>
