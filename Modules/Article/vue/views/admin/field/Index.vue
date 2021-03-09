<template>
    <div class="fields">
        <hd-tab :tabs="tabs" />
        <ul class="alert alert-info text-sm text-gray-500 text-light leading-relaxed" role="alert">
            <li class="text-red">正在管理【{{ model.title }}】模型字段</li>
            <li>修改字段后需要点击保存提交才会生效</li>
        </ul>
        <table class="table table-bordered table-striped" v-if="model.id">
            <thead>
                <tr>
                    <th>标题</th>
                    <th>表单名</th>
                    <th>表单类型</th>
                    <th>显示</th>
                    <th>系统字段</th>
                    <th>提示信息</th>
                    <th class="w-1"></th>
                </tr>
            </thead>
            <draggable v-model="model.fields" tag="tbody">
                <tr v-for="(field, index) in model.fields" :key="index" class="py-2 text-gray-700 text-xs">
                    <td>{{ field.title }}</td>
                    <td>{{ field.name }}</td>
                    <td>{{ type(field) }}</td>
                    <td><i class="far fa-check-square text-green-700" v-if="field.show"></i></td>
                    <td><i class="far fa-check-square text-green-700" v-if="field.system"></i></td>
                    <td>{{ field.placeholder }}</td>
                    <td width="120">
                        <edit :field="field" :model="model" class="inline-block">编辑</edit>
                        <button type="button" class="btn btn-warning btn-sm" v-if="!field.system" @click="del(field)">删除</button>
                    </td>
                </tr>
            </draggable>
        </table>
        <button type="button" class="btn" @click="add">添加字段</button>
        <button type="button" class="btn btn-info" @click="onSubmit">保存提交</button>
    </div>
</template>

<script>
import draggable from 'vuedraggable'
import tabs from './tabs'
import Edit from './components/Edit'
import types from './components/types'
import fields from './fields'
//默认值用于添加字段
const field = {
    title: '',
    name: '',
    type: 'input',
    placeholder: '',
    value: '',
    options: '',
    rank: 0,
    show: true,
    validate_rule: '',
    validate_error: ''
}
export default {
    route: { path: 'field/:mid/index' },
    components: { Edit, draggable },
    data() {
        return {
            tabs,
            types,
            model: {}
        }
    },
    async created() {
        this.model = await axios.get(`model/${this.$route.params.mid}`)
        this.$set(this.model, 'fields', fields)
    },
    methods: {
        //类型中文
        type(field) {
            return this.types.find(t => t.type == field.type).label
        },
        //添加字段
        add() {
            this.model.fields.push(Object.assign({}, field))
        },
        //删除非系统字段
        del(field) {
            this.$confirm(`确定删除【${field.title}】吗?`, '温馨提示').then(_ => {
                let index = this.model.fields.findIndex(f => f.name == field.name)
                this.model.fields.splice(index, 1)
            })
        },
        //保存
        onSubmit() {
            if (this.model.fields.some(f => f.name == '' || f.title == '')) {
                return this.$message.error(`有字段数据不完整`)
            }
            axios.put(`model/${this.model.id}`, this.model)
        }
    }
}
</script>
