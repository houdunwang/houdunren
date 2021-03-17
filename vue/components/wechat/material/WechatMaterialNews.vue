<template>
    <el-dialog title="图文素材设置" :visible.sync="dialogShow" width="95%" top="1rem" :close-on-click-modal="false" @close="$emit('update:show', false)">
        <el-form :model="form" ref="form" label-width="100px" :inline="false" size="normal">
            <el-card shadow="nerver" :body-style="{ padding: '20px' }">
                <el-form-item label="素材描述">
                    <el-input v-model="form.title"></el-input>
                    <hd-error name="form.title" />
                </el-form-item>
                <el-form-item label="素材类型">
                    <el-radio-group v-model="form.duration" :disabled="form.id">
                        <el-radio label="short">临时素材</el-radio>
                        <el-radio label="long">永久素材</el-radio>
                    </el-radio-group>
                </el-form-item>
                <div class="flex">
                    <div class="w-60 preview">
                        <draggable v-model="form.content.articles">
                            <div
                                v-for="(art, index) in form.content.articles"
                                :key="index"
                                class="border border-gray-200 mb-1 cursor-pointer flex"
                                :class="{ ' p-2 items-start': index, 'border-green-600': article == art, 'flex-col': !index }"
                                @click="edit(art)"
                            >
                                <el-image :src="art.pic" fit="cover" :class="{ 'w-1/3 order-2': index }" class="border"></el-image>
                                <div :class="{ 'w-2/3 flex-1 pr-2': index }">
                                    <div class="bg-gray-500 font-light p-1 text-white flex justify-center items-center text-sm" v-if="!index">
                                        {{ art.title }}
                                    </div>
                                    <div class="text-gray-500 font-light text-xs leading-snug" v-else>
                                        {{ art.digest | truncate(30) }}
                                    </div>
                                </div>
                            </div>
                        </draggable>
                        <el-button type="primary" size="mini" @click="add">添加图文</el-button>
                    </div>
                    <div class="flex-1 pl-3" v-if="article.hd">
                        <el-card shadow="nerver" :body-style="{ padding: '20px' }">
                            <el-form-item label="文章标题">
                                <el-input v-model="article.title"></el-input>
                            </el-form-item>
                            <el-form-item label="缩略图">
                                <hd-wechat-material-select :wechat="wechat" />
                                <!-- <hd-image v-model="article.pic" :sid="wechat.site_id" /> -->
                            </el-form-item>
                            <el-form-item label="作者">
                                <el-input v-model="article.author"></el-input>
                            </el-form-item>
                            <el-form-item label="内容摘要">
                                <el-input type="textarea" v-model="article.digest"></el-input>
                            </el-form-item>
                            <el-form-item label="是否显示封面">
                                <el-radio-group v-model="article.show_cover_pic">
                                    <el-radio :label="1">是</el-radio>
                                    <el-radio :label="0">否</el-radio>
                                </el-radio-group>
                            </el-form-item>
                            <el-form-item label="正文内容">
                                <hd-wang-editor v-model="article.content" :sid="wechat.site_id" />
                            </el-form-item>
                            <el-form-item label="原文链接">
                                <el-input v-model="article.content_source_url"></el-input>
                            </el-form-item>
                            <el-form-item label="打开评论">
                                <el-radio-group v-model="article.need_open_comment">
                                    <el-radio :label="1">是</el-radio>
                                    <el-radio :label="0">否</el-radio>
                                </el-radio-group>
                            </el-form-item>
                            <el-form-item label="粉丝才可评论">
                                <el-radio-group v-model="article.only_fans_can_comment">
                                    <el-radio :label="1">是</el-radio>
                                    <el-radio :label="0">否</el-radio>
                                </el-radio-group>
                            </el-form-item>
                        </el-card>
                    </div>
                </div>
            </el-card>
        </el-form>
        <span slot="footer">
            <el-button @click="dialogShow = false">关闭</el-button>
            <el-button type="primary" @click="onSubmit" :disabled="isSubmit">保存提交</el-button>
        </span>
    </el-dialog>
</template>

<script>
import draggable from 'vuedraggable'

// 文章
const article = {
    title: '',
    author: '',
    digest: '',
    show_cover_pic: 1,
    pic: '/images/nopic480x310.jpg',
    content: '',
    content_source_url: '',
    need_open_comment: 1,
    only_fans_can_comment: 1,
    hd: true
}
const form = {
    title: '',
    duration: 'short',
    type: 'news',
    content: {
        articles: []
    }
}

export default {
    props: ['wechat', 'material', 'show'],
    components: { draggable },
    data() {
        return {
            isSubmit: false,
            form: _.merge({}, this.material || form),
            dialogShow: false,
            article: {}
        }
    },
    watch: {
        //显示对话框
        show(n) {
            this.dialogShow = n
        },
        //编辑数据
        material(material) {
            if (material) {
                this.form = material
            }
            this.add()
        }
    },
    methods: {
        //添加文章
        add() {
            if (this.form.content.articles.length >= 5) {
                return this.$message('图文消息只能添加5个')
            }
            this.form.content.articles.push((this.article = _.merge({}, article)))
        },
        //编辑文章
        edit(article) {
            this.article = article
        },
        //删除
        del(material) {
            this.$confirm('确定删除吗？', '温馨提示').then(async _ => {
                await axios.delete(`wechat/${this.wechat.id}/material/${material.id}`)
                this.load()
            })
        },
        onSubmit() {
            this.isSubmit = true
            const url = `wechat/${this.wechat.id}/material` + (this.form.id ? `/${this.form.id}` : ``)
            axios[this.form.id ? 'put' : 'post'](url, this.form)
                .then(_ => this.$parent.load(1, this.form.type))
                .finally(_ => {
                    this.isSubmit = false
                    this.dialogShow = false
                })
        }
    }
}
</script>

<style></style>
