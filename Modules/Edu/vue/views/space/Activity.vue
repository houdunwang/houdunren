<template>
    <div>
        <!-- <hd-skeleton-list:num="15" /> -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">TA的贴子</h3>
            </div>
            <activity-list :action="`activity/user/${$route.params.id}`" />
        </div>
    </div>
</template>

<script>
export default {
    route: { path: `:id/activity` },
    data() {
        return {}
    }
}
</script>

<style></style>
