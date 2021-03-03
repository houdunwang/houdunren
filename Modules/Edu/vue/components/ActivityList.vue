<template>
    <div>
        <!-- <hd-skeleton-list v-if="loading" :num="15" class="md:full mt-2 border-0" /> -->
        <div>
            <div v-for="activity in activities" :key="activity.id">
                <component :is="`Activity${activity.type}`" :activity="activity"></component>
            </div>
            <div class="flex justify-center mt-3">
                <el-pagination
                    :small="true"
                    :page-size="15"
                    v-if="activities.meta"
                    @current-change="load"
                    :current-page="activities.meta.current_page"
                    :total="activities.meta.total"
                    :hide-on-single-page="true"
                    background
                    layout="prev, pager, next"
                >
                </el-pagination>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ['activities'],
    data() {
        return {
            // loading: true,
            // intervalId: null
        }
    },

    created() {
        // this.load(1)
        // const intervalId = setInterval(_ => this.load(), 30000)
        // this.$once('hook:beforeDestroy', () => {
        //     clearInterval(intervalId)
        // })
    }
}
</script>

<style></style>
