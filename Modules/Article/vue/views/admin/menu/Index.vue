<template>
    <div>
        <tab :tabs="tabs" />
        <ul class="alert alert-info text-sm text-gray-500 text-light leading-relaxed" role="alert">
            <li>缺少名称或链接的菜单将不会保存</li>
        </ul>
        <table class="table table-bordered " v-if="menus.length">
            <thead>
                <tr>
                    <th>菜单名称</th>
                    <th>链接地址</th>
                    <th class="w-1"></th>
                </tr>
            </thead>
            <draggable v-model="menus" tag="tbody">
                <tr v-for="(menu, index) in menus" :key="index" class="py-2 text-gray-700 text-xs">
                    <td>
                        <el-input v-model="menu.title" placeholder="" size="small" clearable></el-input>
                    </td>
                    <td>
                        <el-input v-model="menu.url" placeholder="" size="small" clearable></el-input>
                    </td>
                    <td width="80" align="center">
                        <el-button type="danger" size="mini" @click.prevent="del(menu)">删除</el-button>
                    </td>
                </tr>
            </draggable>
        </table>
        <div v-else class="py-5 text-center text-gray-600 text-sm border mt-5 ">
            暂无菜单
        </div>
        <div class="mt-5">
            <button type="button" class="btn" @click="add">添加菜单</button>
            <button type="button" class="btn btn-info" @click="onSubmit">保存提交</button>
        </div>
    </div>
</template>

<script>
import tabs from './tabs'
import draggable from 'vuedraggable'
export default {
    components: { draggable },
    data() {
        return { tabs, menus: [] }
    },
    async created() {
        this.load()
    },
    methods: {
        add() {
            this.menus.push({ title: '', url: '' })
        },
        async load() {
            this.menus = await axios.get(`menu`)
        },
        async del(menu) {
            this.$confirm(`确定删除【${menu.title}】吗？`, '温馨提示').then(async _ => {
                if (menu.id) {
                    await axios.delete(`menu/${menu.id}`)
                    this.load()
                } else {
                    this.menus.splice(this.menus.indexOf(menu), 1)
                }
            })
        },
        async onSubmit() {
            await axios.put(`menu`, { menus: this.menus })
        }
    }
}
</script>

<style></style>
