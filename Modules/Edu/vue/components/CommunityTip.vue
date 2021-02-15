<template>
    <div class="card">
        <div class="card-header h-14">
            社区小贴
        </div>
        <div class="card-body leading-7">
            后盾人是一个主张友好、分享、自由的技术交流社区。
        </div>
        <div class="card-footer text-muted flex justify-center">
            <router-link :to="{ name: 'front.topic.create' }" class="btn btn-info mr-2">发贴交流</router-link>
            <router-link :to="{ name: 'front.sign.index' }" class="btn btn-success">签到打卡</router-link>
        </div>
    </div>
</template>

<script>
export default {}
</script>

<style></style>
