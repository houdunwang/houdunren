<template>
    <div class="card">
        <div class="card-header h-14">
            贴子管理
        </div>
        <div class="card-body">
            <hd-tui-editor v-model="content" :action="`/api/upload/site/${site.id}`" initialEditType="markdown" />
        </div>
        <div class="card-footer text-muted">
            <a name="" id="" class="btn btn-azure" href="#" role="button">保存提交</a>
        </div>
    </div>
</template>

<script>
const form = { content: '' }
export default {
    data() {
        return form
    }
}
</script>

<style></style>
