<template>
    <div>
        <hd-skeleton-list v-if="loading" :num="10" />
        <div class="card" v-else>
            <div class="card-header">
                <h3 class="card-title">站内消息</h3>
            </div>
            <div class="card-body pt-0" v-loading="loading">
                <div v-if="messages.data">
                    <div v-for="message in messages.data" :key="message.id" class="border-b border-gray-200 py-3">
                        <component :is="`Message${message.data.model}`" :message="message"></component>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <el-pagination
                    v-if="messages.meta"
                    :current-page="messages.meta.current_page"
                    :hide-on-single-page="true"
                    :page-size="15"
                    :total="messages.meta.total"
                    @current-change="load"
                    background
                >
                </el-pagination>
            </div>
        </div>
    </div>
</template>

<script>
import { mapState } from 'vuex'
export default {
    route: { meta: { keepAlive: true } },
    data() {
        return {
            loading: false,
            page: 1
        }
    },
    computed: {
        ...mapState(['messages'])
    },
    methods: {
        load() {
            this.loading = true
            this.$store.dispatch('message')
            this.loading = false
        }
    }
}
</script>

<style></style>
