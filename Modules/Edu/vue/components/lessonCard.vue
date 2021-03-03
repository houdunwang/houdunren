<template>
    <router-link
        :to="{ name: 'front.lesson.show', params: { id: lesson.id } }"
        class="border border-gray-100 d-block rounded-md shadow-sm transform hover:scale-105 hover:shadow-xl duration-300 bg-white"
    >
        <div class="text-center">
            <img :src="lesson.thumb" class="h-36 w-full object-cover rounded-t-md " />
            <span class="badge bg-orange absolute -top-2 -right-2" v-if="lesson.price <= 0">免费</span>
            <span class="badge bg-teal absolute -top-2 -right-2" v-else>会员</span>
        </div>
        <div class="card-body border-0">
            <div class="mb-1 text-gray-600">
                {{ lesson.title | titleSubstr(15) }}
            </div>
            <div class="text-sm flex justify-start items-center ">
                <img :src="lesson.user.icon" class="w-6 h-6 rounded-full mr-2" />
                <span class="font-light">共有{{ lesson.video_num }}个视频</span>
            </div>
        </div>
    </router-link>
</template>

<script>
export default {
    props: ['lesson']
}
</script>

<style></style>
