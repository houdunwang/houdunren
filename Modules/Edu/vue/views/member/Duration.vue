<template>
    <div>
        <hd-skeleton-list v-if="loading" :num="2" />
        <div class="card" v-else>
            <div class="card-header">
                <h3 class="card-title">会员周期</h3>
            </div>
            <div class="card-body">你已经订阅会员，会员将在 {{ duration.end_time | format }} 到期</div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            loading: true,
            duration: {}
        }
    },
    async created() {
        this.loading = true
        this.duration = await axios.get(`member/duration`)
        this.loading = false
    }
}
</script>

<style></style>
