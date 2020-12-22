<template>
    <div class="bg-white border shadow-md px-15 py-2 fixed top-0 notice">
        <i
            class="fa "
            aria-hidden="true"
            :class="{
                'fa-home': type == 'success',
                'fa-times': type == 'error'
            }"
        ></i>
        {{ message }}
    </div>
</template>

<script>
export default {
    props: ["type", "message"],
    computed: {
        // icon() {
        //     return "fa-home";
        // }
    }
};
</script>

<style scoped>
.notice {
    left: 50%;
    transform: translateX(-50%);
}
</style>
