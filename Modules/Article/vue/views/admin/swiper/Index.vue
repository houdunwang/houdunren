<template>
    <div>
        <hd-tab :tabs="tabs" />
        <div class="grid grid-cols-3 gap-5">
            <div v-for="swiper in swipers" :key="swiper.id" class="shadow-md bg-gray-600">
                <div class="text-white text-center text-base py-3 text-bold">{{ swiper.title }} / 编号:{{ swiper.id }}</div>
                <div class="swiper-container relative h-40" :id="`swiper${swiper.id}`">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide" v-for="(item, index) in swiper.items" :key="index" v-show="item.show">
                            <a :href="item.url">
                                <img :src="item.img" class="object-cover" />
                                <div class="absolute top-28 text-center w-full text-white text-base" style="text-shadow:0 0 5px #000">
                                    {{ item.title }}
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
                <div class="flex justify-center my-3">
                    <el-button-group>
                        <el-button type="success" size="mini" @click="router('admin.swiper.edit', { id: swiper.id })">编辑</el-button>
                        <el-button type="danger" size="mini" @click="del(swiper)">删除</el-button>
                    </el-button-group>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import tabs from './tabs'
export default {
    data() {
        return { tabs, swipers: [] }
    },
    async created() {
        this.load()
    },
    methods: {
        async load() {
            this.swipers = await axios.get(`swiper`)
            this.renderSwiper()
        },
        //渲染Swiper
        renderSwiper() {
            setTimeout(() => {
                this.swipers.forEach(swiper => {
                    var swiper = new Swiper(`#swiper${swiper.id}`, {
                        autoplay: {
                            delay: 2000
                        },
                        pagination: {
                            el: '.swiper-pagination'
                        }
                    })
                })
            })
        },
        async del(swiper) {
            this.$confirm(`确定删除【${swiper.title}】吗？`, '温馨提示').then(async _ => {
                await axios.delete(`swiper/${swiper.id}`)
                this.swipers.splice(this.swipers.indexOf(swiper), 1)
            })
        }
    }
}
</script>

<style></style>
