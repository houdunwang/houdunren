<template>
    <div>
        <tab :tabs="tabs" />
        <ul role="alert" class="alert alert-info text-sm text-gray-500 text-light leading-relaxed">
            <li>链接优先级高于文章编号</li>
        </ul>
        <el-form :model="form" ref="form" label-width="100px" :inline="false" size="normal">
            <el-card shadow="nerver" :body-style="{ padding: '20px' }" class="mb-3">
                <div slot="header">
                    幻灯片配置
                </div>
                <div class="grid grid-cols-4 gap-3">
                    <el-form-item label="标题">
                        <el-input v-model="form.title" placeholder="请输入幻灯片的描述"></el-input>
                        <hd-form-error name="title" />
                    </el-form-item>
                    <el-form-item label="宽度">
                        <el-input v-model="form.width" placeholder="请输入幻灯片宽度"></el-input>
                        <hd-form-error name="width" />
                    </el-form-item>
                    <el-form-item label="高度">
                        <el-input v-model="form.height" placeholder="请输入幻灯片高度"></el-input>
                        <hd-form-error name="height" />
                    </el-form-item>
                    <el-form-item label="过渡时间">
                        <el-input v-model="form.delay" placeholder="请输入幻灯片过渡时间"></el-input>
                        <hd-form-error name="delay" />
                    </el-form-item>
                </div>
            </el-card>

            <el-card shadow="nerver" :body-style="{ padding: '20px' }">
                <div slot="header">
                    轮换图片
                </div>
                <div class="grid grid-cols-3 gap-5 mt-5">
                    <div v-for="(item, index) in form.items" :key="index" class="relative shadow-md p-3 box-border flex rounded-sm border border-gray-100">
                        <hd-upload-image v-model="item.img" :sid="site.id" class="w-1/2" />
                        <div class="w-1/2">
                            <!-- <el-form-item label="标题" label-width="50px">
                                <el-input v-model="item.title" placeholder="幻灯片文字"></el-input>
                            </el-form-item> -->
                            <el-form-item label="链接" label-width="50px">
                                <el-input v-model="item.url" placeholder="点击后的跳转链接"></el-input>
                            </el-form-item>
                            <el-form-item label="文章" label-width="50px">
                                <el-input v-model="item.id" placeholder="请输入文章编号"></el-input>
                            </el-form-item>
                            <el-form-item label="显示" label-width="50px">
                                <el-radio v-model="item.show" :label="true">显示</el-radio>
                                <el-radio v-model="item.show" :label="false">隐藏</el-radio>
                            </el-form-item>
                        </div>
                        <i
                            class="fas fa-times-circle absolute -top-3 -right-2 text-lg text-gray-500 hover:text-gray-800 duration-300 cursor-pointer"
                            @click="del(index)"
                        ></i>
                    </div>
                </div>
            </el-card>
            <div class="mt-3">
                <el-button-group>
                    <el-button size="default" @click="add">添加图片</el-button>
                    <el-button type="danger" size="default" @click="onSubmit">保存提交</el-button>
                </el-button-group>
            </div>
        </el-form>
    </div>
</template>

<script>
const form = { title: '', width: '100%', height: 'auto', delay: 3000, items: [] }
import tabs from './tabs'
export default {
    props: ['id'],
    data() {
        return { form: Object.assign({}, form), tabs }
    },

    async created() {
        if (this.id) {
            this.form = await axios.get(`swiper/${this.id}`)
        }
    },
    // watch:{
    //     $route(route){
    //         if(route.name =='admin.swiper.create'){
    //             this.form =  Object.assign({}, form)
    //         }
    //     }
    // },
    methods: {
        add() {
            this.form.items.push({ img: '', title: '', url: '', show: true })
        },
        del(index) {
            this.$confirm(`确定删除吗？`, '温馨提示').then(_ => {
                this.form.items.splice(index, 1)
            })
        },
        async onSubmit() {
            const url = this.id ? `swiper/${this.id}` : 'swiper'
            await axios[this.id ? 'put' : 'post'](url, this.form)
            this.form = Object.assign({}, form)
            this.router('admin.swiper.index')
        }
    }
}
</script>

<style></style>
