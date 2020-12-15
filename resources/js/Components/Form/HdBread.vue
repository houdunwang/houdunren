<template>
    <div class="border-b mb-5 flex items-center">
        <inertia-link
            :href="home"
            v-if="home"
            class="px-5 text-gray-500 font-bold"
        >
            <i class="fa fa-home" aria-hidden="true"></i>
        </inertia-link>
        <inertia-link
            v-for="(menu, index) in menus"
            :key="index"
            :href="menu.link"
            class="font-medium text-sm border border-b-0 px-3 py-2 rounded-t-md hover:shadow-md"
            :class="{
                'bg-purple-500': menu.active,
                'text-white': menu.active,
                'text-gray-600': !menu.active
            }"
        >
            {{ menu.title }}
        </inertia-link>
    </div>
</template>

<script>
export default {
    props: ["home", "menus"]
};
</script>

<style></style>
