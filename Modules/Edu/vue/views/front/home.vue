<template>
    <div class="container-xl mt-16 md:flex">
        <div class="card md:w-9/12 md:mr-5 mb-5">
            <div class="card-header flex justify-between h-14">
                社区动态
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
            <community-tip />
        </div>
    </div>
</template>

<script>
import CommunityTip from '../../components/CommunityTip.vue'
export default {
    components: { CommunityTip },
    route: { path: '//' }
}
</script>

<style></style>
