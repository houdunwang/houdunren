<template>
    <div class="md:flex">
        <div class="card md:w-9/12 md:mr-5 mb-5">
            <div class="card-header flex justify-between h-14">
                社区动态
                <router-link :to="{ name: 'front.topic.create' }" class="btn btn-outline-azure hover:text-white">发表</router-link>
            </div>
            <div class="card-body">
                <div class="divide-y-4">
                    <div>
                        <div class="row">
                            <div class="col-auto">
                                <span class="avatar">AA</span>
                            </div>
                            <div class="col">
                                <div class="text-truncate"><strong>Arlie Armstead</strong> sent a Review Request to <strong>Amanda Blake</strong>.</div>
                                <div class="text-muted">2 days ago</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="md:w-3/12">
            <div class="card">
                <div class="card-header h-14">
                    社区小贴
                </div>
                <div class="card-body leading-7">
                    后盾人是一个主张友好、分享、自由的技术交流社区。
                </div>
                <div class="card-footer text-muted flex justify-center">
                    <a name="" id="" class="btn btn-info mr-2" href="#" role="button">发贴交流</a>
                    <a name="" id="" class="btn btn-success" href="#" role="button">签到打卡</a>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    route: { path: '//' }
}
</script>

<style></style>
