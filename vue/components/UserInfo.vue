<template>
    <div class="object-cover border border-gray-300 shadow-sm">
        <img :src="user.avatar" class="object-cover w-full" />
        <div class="text-gray-700 font-bold border-b border-gray-200 py-3 mx-3">
            {{ user.name }}
        </div>
        <div class="mt-3 text-gray-500 px-4 flex justify-between pb-3">
            <i aria-hidden="true" class="fa fa-envelope text-info"></i>
            <i aria-hidden="true" class="fab fa-weibo text-info"></i>
            <i aria-hidden="true" class="fab fa-weixin text-info"></i>
            <i aria-hidden="true" class="fab fa-github text-info"></i>
            <i aria-hidden="true" class="fab fa-qq text-info"></i>
        </div>
    </div>
</template>

<script>
export default {
    props: ['user']
}
</script>

<style></style>
