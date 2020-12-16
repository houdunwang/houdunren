<template>
    <div>
        <hd-bread home="/" :menus="menus"></hd-bread>
        <hd-card>
            <template v-slot:header>
                系统配置
            </template>
            <template>
                <hd-form-input
                    title="后台名称"
                    v-model="form.title"
                    name="title"
                />
                <hd-form-textarea
                    title="后台脚本"
                    v-model="form.copyright"
                    name="copyright"
                />
                <hd-form-image title="后台标志" value="" name="avatar" />
            </template>
            <template v-slot:footer>
                <hd-button class="primary">保存提交</hd-button>
            </template>
        </hd-card>
    </div>
</template>

<script>
export default {
    data() {
        return {
            menus: [
                {
                    title: "系统设置",
                    link: route("system.config.edit")
                }
            ],
            form: {
                title: "",
                textarea: ""
            }
        };
    }
};
</script>

<style></style>
