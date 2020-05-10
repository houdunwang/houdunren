<template>
  <div>
    <a-tabs defaultActiveKey="order">
      <a-tab-pane tab="我的定单" key="order">
        <a-table
          :bordered="true"
          :columns="columns"
          :dataSource="orders.data"
          :pagination="{ total: orders.total }"
          @change="load"
          rowKey="id"
        >
          <span slot="price" slot-scope="price">{{ price }} 元</span>
          <div slot="status" slot-scope="status">
            <span class="text-success" v-show="status">支付成功</span>
            <span class="text-secondary" v-show="!status">失效</span>
            <!-- <i class="fa fa-check-circle-o text-success" aria-hidden="true" v-show="status"></i> -->
            <!-- <i class="fa fa-times-circle-o" aria-hidden="true" v-show="status == false"></i> -->
          </div>
          <span slot="action" slot-scope="order">
            <a-button size="small" @click="del(order)" :disabled="order.status">删除</a-button>
          </span>
        </a-table>
      </a-tab-pane>
      <a-tab-pane tab="会员到期时间" key="time">
        <div class="card">
          <div class="card-header bg-white">会员到期时间</div>
          <div class="card-body">
            <h6 class="text-secondary font-weight-light">
              你的会员在将在
              <span class="text-danger">{{ duration.end_time }}</span>
              到期
            </h6>
          </div>
        </div>
      </a-tab-pane>
    </a-tabs>
  </div>
</template>

<script>
import _ from 'lodash'
let columns = [
  { dataIndex: 'id', title: '编号', width: 80 },
  { dataIndex: 'subject', title: '定单' },
  { dataIndex: 'sn', title: '定单号' },
  { dataIndex: 'price', title: '价格', scopedSlots: { customRender: 'price' } },
  { dataIndex: 'status', scopedSlots: { customRender: 'status' }, title: '状态' },
  { title: '操作', key: 'action', scopedSlots: { customRender: 'action' }, width: 80 }
]
export default {
  data() {
    return {
      orders: { data: [], total: 0 },
      columns,
      duration: { end_time: '' }
    }
  },
  async created() {
    this.load()
  },
  methods: {
    async load(page = { current: 1 }) {
      let response = await Promise.all([
        this.axios.get(`edu/member/order?page=${page.current}`),
        this.axios.get(`edu/member/duration`)
      ])
      this.$set(this, 'orders', response[0].data)
      this.$set(this, 'duration', response[1].data)
    },
    del(order) {
      self = this
      this.$confirm({
        title: '温馨提示',
        content: '确定删除定单吗？',
        onOk() {
          axios.delete(`edu/member/order/${order.id}`).then(() => {
            self.$message.success('定单删除成功')
            self.orders.data = self.orders.data.filter(v => v.id != order.id)
          })
        }
      })
    }
  }
}
</script>

<style></style>
