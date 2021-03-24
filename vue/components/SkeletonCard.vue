<template>
    <div class="w-full">
        <div class="card" v-for="i in num" :key="i">
            <div class="ratio ratio-21x9 card-img-top">
                <div class="skeleton-image"></div>
            </div>
            <div class="card-body">
                <div class="skeleton-heading"></div>
                <div class="skeleton-line"></div>
                <div class="skeleton-line"></div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        num: { default: 6 }
    }
}
</script>

<style></style>
