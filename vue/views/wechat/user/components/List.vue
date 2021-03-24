<template>
    <div>
        <el-table :data="users" border stripe class="mt-3">
            <el-table-column v-for="col in columns" :prop="col.id" :key="col.id" :label="col.label" :width="col.width"> </el-table-column>
            <el-table-column label="头像" width="100" #default="{row:user}">
                <el-popover placement="top" width="200" trigger="hover">
                    <el-image :src="user.headimgurl" fit="cover"></el-image>
                    <el-image slot="reference" :src="user.headimgurl" fit="cover" class="w-10 h-10"></el-image>
                </el-popover>
            </el-table-column>
            <el-table-column label="黑名单" #default="{row:user}" width="80">
                {{ user.black ? '是' : '否' }}
            </el-table-column>
            <el-table-column label="关注时间" #default="{row:user}" width="150">
                {{ user.subscribe_time | format }}
            </el-table-column>
            <el-table-column width="200" #default="{row:user}" align="center">
                <el-button-group>
                    <el-button type="success" size="mini" @click="remark(user)">备注名称</el-button>
                    <el-button type="danger" size="mini" @click="black(user)" v-if="!user.black">拉黑用户</el-button>
                    <el-button type="danger" size="mini" @click="removeBlack(user)" v-else>移除黑名单</el-button>
                </el-button-group>
            </el-table-column>
        </el-table>
        <remark :fans="remarkUser" :show.sync="remarkDialogShow" />
    </div>
</template>

<script>
const columns = [
    { label: '编号', id: 'id', width: 60 },
    { label: '系统编号', id: 'user_id' },
    { label: '昵称', id: 'nickname' },
    { label: '备注名称', id: 'remark' },
    { label: '国家', id: 'country' },
    { label: '省份', id: 'province' },
    { label: '城市', id: 'city' }
]
import Remark from '../Remark'
export default {
    components: { Remark },
    props: ['users'],
    data() {
        return {
            remarkDialogShow: false,
            remarkUser: {},
            columns
        }
    },
    methods: {
        //备注名称
        remark(user) {
            this.remarkDialogShow = true
            this.remarkUser = user
        },
        //拉黑用户
        black(user) {
            this.$confirm('确定拉黑吗？', '温馨提示').then(async _ => {
                const url = `site/${this.query('sid')}/wechat/${this.query('wid')}/user/${user.id}/black`
                await axios.get(url)
                this.$parent.load()
            })
        },
        //移除黑名单
        removeBlack(user) {
            this.$confirm('确定移除吗？', '温馨提示').then(async _ => {
                const url = `site/${this.query('sid')}/wechat/${this.query('wid')}/user/${user.id}/remove/black`
                await axios(url)
                this.$parent.load()
            })
        }
    }
}
</script>

<style></style>
