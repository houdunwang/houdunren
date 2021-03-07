<template>
    <div>
        <hd-tab :tabs="tabs" />
        <el-form :model="form" ref="form" label-width="100px" :inline="false" size="normal">
            <div>
                <el-input v-model="form.title" placeholder="请输入幻灯片的描述"></el-input>
                <hd-error name="title" />
            </div>
            <div class="grid grid-cols-3 gap-5 mt-5">
                <div v-for="(item, index) in form.items" :key="index" class="relative flex shadow-md p-8 rounded-sm border border-gray-100">
                    <hd-image v-model="item.img" :action="`/api/upload/site/${site.id}`" />
                    <div class="flex-1">
                        <el-form-item label="标题" label-width="50px">
                            <el-input v-model="item.title"></el-input>
                        </el-form-item>
                        <el-form-item label="链接" label-width="50px">
                            <el-input v-model="item.url"></el-input>
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
const form = { title: '', items: [] }
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
