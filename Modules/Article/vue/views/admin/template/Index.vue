<template>
    <div>
        <hd-tab :tabs="tabs" />
        <div class="grid md:grid-cols-6 gap-5">
            <div class="card d-flex flex-column" v-for="template in templates" :key="template.name">
                <a href="#">
                    <img :src="template.preview" class="object-cover" />
                </a>
                <div class="card-body d-flex flex-column">
                    <h3 class="card-title mb-2">
                        <a href="#">{{ template.title }}</a>
                    </h3>
                    <div class="text-muted">{{ template.description }}</div>
                    <div class="d-flex align-items-center pt-4 mt-auto">
                        <div class="mt-0">
                            <a href="#" class="text-body">{{ template.author }}</a>
                            <div class="text-muted">{{ template.version }}</div>
                        </div>
                    </div>
                </div>
                <div class="card-footer flex flex-col items-center">
                    <el-button v-if="template.selected" type="success" size="mini">选择模板</el-button>
                    <el-button v-else size="mini" @click="onSubmit(template)">选择模板</el-button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import tabs from './tabs'
export default {
    data() {
        return { tabs, templates: [] }
    },
    async created() {
        this.load()
    },
    methods: {
        async load() {
            this.templates = await axios.get(`template`)
        },
        async onSubmit(template) {
            await axios.put(`/api/module/config/site/${this.site.id}/module/${this.module.id}`, { template: template.name })
            this.load()
        }
    }
}
</script>

<style></style>
