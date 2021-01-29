<template>
    <div style="background-image: url(/images/admin2.jpg)" class="min-h-screen bg-cover">
        <top-menu />
        <quick-menu />
        <div class="bg-white mx-3 px-5 py-4 shadow-md rounded-sm">
            <router-view />
        </div>
        <div class="mt-5 flex justify-center py-8 text-sm text-gray-900 text-center font-bold"></div>
    </div>
</template>
<script>
import TopMenu from './components/TopMenu'
import QuickMenu from './components/QuickMenu'
export default {
    route: { meta: { auth: true } },
    components: { TopMenu, QuickMenu }
}
</script>

<style></style>
