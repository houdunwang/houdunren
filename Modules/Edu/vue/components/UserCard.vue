<template>
    <div class="card hover:shadow-lg duration-300">
        <div class="card-body p-4 text-center flex flex-col justify-center items-center">
            <router-link :to="{ name: 'space.follower', params: { id: member.id } }">
                <img :src="member.icon" class="w-20 h-20 object-cover rounded-full shadow-md cursor-pointer" />
            </router-link>
            <h3 class="mt-2 mb-1">
                <router-link :to="{ name: 'space.follower', params: { id: member.id } }">
                    {{ member.name }}
                </router-link>
            </h3>
            <div class="flex justify-between text-gray-500 w-full text-xs md:text-base mt-3 md:w-4/5 m-auto">
                <el-popover placement="top" width="200" trigger="hover" :content="member.email">
                    <i class="fa fa-envelope" :class="{ 'text-green-600': member.email }" slot="reference"></i>
                </el-popover>
                <el-popover placement="top" width="200" trigger="hover" :content="member.weibo">
                    <i class="fab fa-weibo" :class="{ 'text-green-600': member.weibo }" slot="reference"></i>
                </el-popover>
                <el-popover placement="top" width="200" trigger="hover" :content="member.wechat">
                    <i class="fab fa-weixin" :class="{ 'text-green-600': member.wechat }" slot="reference"></i>
                </el-popover>
                <el-popover placement="top" width="200" trigger="hover" :content="member.github">
                    <i class="fab fa-github" :class="{ 'text-green-600': member.github }" slot="reference"></i>
                </el-popover>
                <el-popover placement="top" width="200" trigger="hover" :content="member.qq">
                    <i class="fab fa-qq" :class="{ 'text-green-600': member.qq }" slot="reference"></i>
                </el-popover>
                <el-popover placement="top" width="200" trigger="hover" :content="member.home">
                    <i class="fas fa-home" :class="{ 'text-green-600': member.home }" slot="reference"></i>
                </el-popover>
            </div>
        </div>
        <div class="grid grid-cols-2 border-t" v-if="isLogin">
            <a href="" class="py-2 bg-gray-100 hover:bg-gray-200 text-center border-r text-sm" v-if="member.is_following" @click.prevent="unFollow">
                已关注
            </a>
            <a href="" class="py-2 hover:bg-gray-100 text-center border-r text-sm" v-else @click.prevent="follow">
                关注TA
            </a>

            <router-link :to="{ name: 'space.topic', params: { id: member.id } }" class="py-2 hover:bg-gray-100 text-center text-sm">访问主页</router-link>
        </div>
    </div>
</template>

<script>
export default {
    props: ['member'],
    methods: {
        async follow() {
            await axios.post(`/api/site/${this.site.id}/follow/user/${this.member.id}`)
            this.member.is_following = true
        },
        async unFollow() {
            await axios.delete(`/api/site/${this.site.id}/follow/user/${this.member.id}`)
            this.member.is_following = false
        }
    }
}
</script>

<style></style>
