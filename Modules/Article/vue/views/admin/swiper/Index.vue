<template>
    <div>
        <tab :tabs="tabs" />
        <div class="grid md:grid-cols-4 gap-5" v-if="swipers.length">
            <el-card shadow="nerver" :body-style="{ padding: '0px' }" v-for="swiper in swipers" :key="swiper.id">
                <div class="py-3 text-center">{{ swiper.title }} / 编号:{{ swiper.id }}</div>
                <div class="swiper-container relative h-24" :id="`swiper${swiper.id}`">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide" v-for="(item, index) in swiper.items" :key="index" v-show="item.show">
                            <a :href="item.url">
                                <img :src="item.img" class="object-cover" />
                            </a>
                        </div>
                    </div>
                    <div class="swiper-pagination"></div>
                    <!-- Add Arrows -->
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
                <div class="flex justify-center py-2 bg-gray-100">
                    <el-button-group>
                        <el-button type="success" size="mini" @click="router('admin.swiper.edit', { id: swiper.id })">编辑</el-button>
                        <el-button type="danger" size="mini" @click="del(swiper)">删除</el-button>
                    </el-button-group>
                </div>
            </el-card>
        </div>
        <div v-else class="text-center py-3 text-gray-600 text-sm">
            <span>暂无幻灯片</span>
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
                        },
                        navigation: {
                            nextEl: '.swiper-button-next',
                            prevEl: '.swiper-button-prev'
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
