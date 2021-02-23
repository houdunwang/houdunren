<template>
    <div class="nav-item dropdown d-none d-md-flex me-3">
        <a href="#" class="nav-link px-0" data-bs-toggle="dropdown" tabindex="-1" aria-label="Show notifications" aria-expanded="false">
            <svg
                xmlns="http://www.w3.org/2000/svg"
                class="icon"
                width="24"
                height="24"
                viewBox="0 0 24 24"
                stroke-width="2"
                stroke="currentColor"
                fill="none"
                stroke-linecap="round"
                stroke-linejoin="round"
            >
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <path d="M10 5a2 2 0 0 1 4 0a7 7 0 0 1 4 6v3a4 4 0 0 0 2 3h-16a4 4 0 0 0 2 -3v-3a7 7 0 0 1 4 -6"></path>
                <path d="M9 17v1a3 3 0 0 0 6 0v-1"></path>
            </svg>
            <span class="badge bg-red" v-show="siteMessage.data && siteMessage.data.length > 0"></span>
        </a>
        <div class="dropdown-menu dropdown-menu-end dropdown-menu-card" v-show="siteMessage.data && siteMessage.data.length > 0">
            <div class="card w-80">
                <div class="card-body">
                    <div v-for="message in siteMessage.data" :key="message.id" class="border-b border-gray-200 pb-2 mb-2">
                        <component :is="`SiteMessage${message.data.model}`" :message="message"></component>
                    </div>
                </div>
                <div class="card-footer">
                    <router-link :to="{ name: 'member.sitemessage' }">
                        查看更多...
                    </router-link>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { mapState } from 'vuex'
export default {
    data() {
        return {}
    },
    computed: {
        ...mapState(['siteMessage'])
    }
}
</script>

<style></style>
