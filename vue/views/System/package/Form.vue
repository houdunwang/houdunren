<template>
    <el-form :model="form" ref="form" label-width="80px" :inline="false" size="normal">
        <hd-tab :tabs="tabs" />
        <el-card shadow="always" :body-style="{ padding: '20px' }">
            <template v-slot:header>套餐资料</template>
            <el-form-item label="套餐名称">
                <el-input v-model="form.title"></el-input>
                <hd-error name="title" />
            </el-form-item>

            <el-card shadow="never" :body-style="{ padding: '20px' }">
                <div slot="header">
                    使用该套餐的会员组
                </div>
                <!-- card body -->
                <el-tag
                    type="primary"
                    effect="plain"
                    size="mini"
                    v-for="group in form.groups"
                    :key="group.id"
                    class="mr-2 mb-2 cursor-pointer"
                    @click="$router.push({ name: 'system.group.edit', params: { id: group.id } })"
                >
                    {{ group.title }}
                </el-tag>
            </el-card>
        </el-card>
        <el-card shadow="always" :body-style="{ padding: '20px' }" class="mt-3">
            <div slot="header">
                <span>模块选择</span>
            </div>
            <hd-module-list :modules="modules" #default="{module}">
                <el-button type="primary" size="mini" v-if="module.selected" @click="module.selected = false">取消选择</el-button>
                <el-button type="info" size="mini" v-else @click="module.selected = true">选择模块</el-button>
            </hd-module-list>
        </el-card>
        <el-button type="primary" @click="onSubmit" class="block mt-3">保存提交</el-button>
    </el-form>
</template>

<script>
import tabs from './tabs'
const form = { title: '', modules: [] }

export default {
    props: ['id'],
    data() {
        return {
            tabs,
            modules: [],
            form: Object.assign({}, form)
        }
    },
    async created() {
        if (this.id) this.form = await this.axios.get(`package/${this.id}`)

        //模块列表中添加字段记录当前套餐是否拥有这个模块
        const modules = await this.axios.get(`module?type=installed`)

        this.modules = modules.map(m => {
            m.selected = this.form.modules.some(fm => fm.id == m.id)
            return m
        })
    },
    methods: {
        async onSubmit() {
            const url = this.id ? `package/${this.id}` : `package`
            //从模块列表中提出id
            this.form.modules = this.modules.filter(m => m.selected).map(m => m.id)

            await this.axios[this.id ? 'put' : 'post'](url, this.form)
            this.$router.push({ name: 'system.package.index' })
        },
        //模块选择
        handleSelectionModuleChange(modules) {
            this.form.modules = modules.map(m => m.id)
        }
    }
}
</script>

<style></style>
