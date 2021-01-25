<template>
    <div class="font-sans text-gray-800">
        <div class="border-b-4 border-dark-green shadow-md py-4 flex">
            <div class="w-1280 flex m-auto justify-between">
                <div class="flex">
                    <router-link to="/"><i class="fas fa-code"></i> {{ site.title }}</router-link>
                    <router-link :to="menu.to" v-for="(menu, index) in menus" :key="index" class="px-4">
                        {{ menu.title }}
                    </router-link>
                </div>
                <div>
                    <div v-if="user">{{ user.name }}</div>
                    <div v-else>
                        <a href="">登录</a>
                        <a href="">注册</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-1280 m-auto">
            <router-view></router-view>
        </div>
    </div>
</template>

<script>
import { mapGetters, mapState } from 'vuex'
const menus = [
    { title: '系统学习', to: '/Edu/front/topic/index' },
    { title: '实战课程', to: '/Edu/front/topic/index' },
    { title: '最近更新', to: '/Edu/front/topic/index' },
    { title: '话题讨论', to: '/Edu/front/topic/index' },
    { title: '订阅会员', to: '/Edu/front/topic/index' },
    { title: '在线文档', to: '/Edu/front/topic/index' },
    { title: '直播间', to: '/Edu/front/topic/index' }
]
export default {
    data() {
        return { menus }
    },
    computed: {
        ...mapGetters(['site', 'user'])
    }
}
</script>

<style></style>
