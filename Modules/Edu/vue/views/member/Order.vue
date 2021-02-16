<template>
    <div>
        <hd-skeleton-list v-if="loading" :num="10" />
        <div class="card" v-else>
            <div class="card-header">
                <h3 class="card-title">订单列表</h3>
            </div>
            <el-table :data="orders.data" border stripe class="border-0">
                <el-table-column v-for="col in columns" :prop="col.id" :key="col.id" :label="col.label" :width="col.width" #default="{row:order}">
                    <div v-if="col.id == 'created_at'">
                        {{ order.created_at | format }}
                    </div>
                    <div v-else>
                        {{ order[col.id] }}
                    </div>
                </el-table-column>
            </el-table>
            <div class="card-footer text-muted flex justify-center">
                <el-pagination
                    :small="true"
                    :page-size="15"
                    v-if="orders.meta"
                    @current-change="load"
                    :current-page="orders.meta.current_page"
                    :total="orders.meta.total"
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
const columns = [
    { id: 'sn', label: '订单号', width: 200 },
    { id: 'subject', label: '描述' },
    { id: 'price', label: '价格', width: 100 },
    { id: 'type_title', label: '类型', width: 150 },
    { id: 'created_at', label: '创建时间', width: 150 }
]
export default {
    data() {
        return {
            columns,
            loading: true,
            orders: []
        }
    },
    async created() {
        this.load()
    },
    methods: {
        async load(page = 1) {
            this.loading = true
            this.orders = await this.axios.get(`member/order?page=${page}`)
            this.loading = false
            document.documentElement.scroll({ top: 0, behavior: 'smooth' })
        }
    }
}
</script>

<style></style>
