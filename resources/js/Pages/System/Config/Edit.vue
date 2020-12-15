<template>
    <div>
        <hd-bread home="/" :menus="menus"></hd-bread>
        <card>
            <template v-slot:header>
                系统配置
            </template>
            <template>
                <form-input
                    title="后台名称"
                    v-model="form.title"
                    name="title"
                />
                <form-textarea
                    title="后台脚本"
                    v-model="form.copyright"
                    name="copyright"
                />
                <form-image title="后台标志" value="aa" name="avatar" />
            </template>
            <template v-slot:footer>
                <hd-button class="primary">保存提交</hd-button>
            </template>
        </card>
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
