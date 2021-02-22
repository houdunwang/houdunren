<template>
    <div class="form-selectgroup tags">
        <el-checkbox-group v-model="selected" size="mini" :max="5">
            <el-checkbox-button v-for="tag in tags" :label="tag.id" :key="tag.id">{{ tag.title }}</el-checkbox-button>
        </el-checkbox-group>
    </div>
</template>

<script>
export default {
    props: {
        action: { default: `tag` }
    },
    data() {
        return {
            selected: [],
            tags: []
        }
    },
    watch: {
        '$attrs.value'(tags) {
            this.selected = tags
        },
        selected(tags) {
            this.$emit('input', tags)
        }
    },
    async created() {
        this.tags = await this.axios.get(this.action)
    }
}
</script>

<style>
.tags label {
    margin-bottom: 5px;
    margin-right: 3px;
    border-left: 1px solid #dcdfe6;
}
.tags .el-checkbox-button:first-child .el-checkbox-button__inner {
    border-radius: 0 !important;
    border-left: none;
}
</style>
