<template>
    <div class="containear-xl">
        <iframe
            class="live-container md:absolute md:bottom-0 md:left-0 md:right-0 md:top-0 md:h-full mt-16"
            width="100%"
            frameborder="0"
            scrolling="no"
            src="https://liveshare.huya.com/iframe/19909817"
        ></iframe>
        <div class="fixed bottom-0 text-center py-5 text-white left-1/2 transform translate-x-1/2 text-xl  font-bold">
            晚八点直播
        </div>
    </div>
</template>

<script>
export default {
    route: { meta: { auth: true } },
    data() {
        return {
            player: {}
        }
    },
    created() {
        this.init()
    },
    methods: {
        init() {}
    }
}
</script>

<style>
@media screen and (min-width: 768px) {
    .live-container {
        /* height: 100vh; */
    }
}

@media screen and (max-width: 768px) {
    .live-container {
        /* min-height: 220px; */
    }
}
</style>
