<template>
    <div class="fields">
        <el-alert :title="`正在管理【${model.title}模型】的字段`" type="success" class="mb-3"> </el-alert>
        <hd-tab :tabs="tabs" />

        <table class="table table-responsive " v-if="model.id">
            <thead>
                <tr>
                    <th>标题</th>
                    <th>表单name</th>
                    <th>显示</th>
                    <th>提示信息</th>
                    <th class="w-1"></th>
                </tr>
            </thead>
            <draggable v-model="model.fields" tag="tbody" @change="changeOrder">
                <tr v-for="field in model.fields" :key="field.name" class="py-2 text-gray-700">
                    <td>
                        {{ field.title }}
                    </td>
                    <td>
                        {{ field.name }}
                    </td>
                    <td>
                        <i class="far fa-check-square text-green-700" v-if="field.show"></i>
                    </td>
                    <td>
                        {{ field.placeholder }}
                    </td>
                    <td>
                        <div class="btn-group" role="group" aria-label="">
                            <edit :field="field" @update="updateField" :model="model">编辑</edit>
                            <button type="button" class="btn btn-primary" v-if="!field.system" @click="del(field)">删除</button>
                        </div>
                    </td>
                </tr>
            </draggable>
        </table>
        <edit @update="updateField" :model="model">添加字段</edit>
    </div>
</template>

<script>
import draggable from 'vuedraggable'
import tabs from './tabs'
import Edit from './components/Edit'
export default {
    route: { path: 'field/:mid/index' },
    components: { Edit, draggable },
    data() {
        return {
            tabs,
            model: {}
        }
    },
    async created() {
        this.model = await axios.get(`model/${this.$route.params.mid}`)
    },

    methods: {
        //更新字段
        updateField(field) {
            let index = this.model.fields.findIndex(f => f.name == field.name)
            if (index == -1) {
                //新增
                this.model.fields.push(field)
            } else {
                //修改
                this.model.fields.splice(index, 1, field)
            }
            axios.put(`model/${this.model.id}`, this.model)
        },
        //删除非系统字段
        del(field) {
            this.$confirm(`确定删除【${field.title}】吗?`, '温馨提示').then(_ => {
                let index = this.model.fields.findIndex(f => f.name == field.name)
                this.model.fields.splice(index, 1)
                axios.put(`model/${this.model.id}`, this.model)
            })
        },
        //更新排序
        changeOrder() {
            axios.put(`model/${this.model.id}`, this.model)
        }
    }
}
</script>

<style>
.fields .table thead th {
    font-size: 1rem !important;
    padding-top: 0.6rem;
    padding-bottom: 0.6rem;
}
</style>
