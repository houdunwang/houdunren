<template>
    <el-form :model="form" ref="form" label-position="top" label-width="80px" :inline="false" size="normal">
        <el-form-item label="">
            <el-form-item label="菜单名称">
                <el-input v-model="form.name"></el-input>
            </el-form-item>
            <el-form-item label="关键词" v-if="!form.sub_button.length">
                <hd-wechat-message-preview :message="message" v-if="message" class-name="w-36" />
                <el-input v-model="form.key">
                    <template slot="append">
                        <span @click="showKeywordDialog = true" class="text-gray-500 cursor-pointer">选择消息</span>
                    </template>
                </el-input>
                <hd-wechat-message-select :wechat="wechat" v-if="wechat.id" :show.sync="showKeywordDialog" @select="select" />
                <hd-tip>可以通过右侧按钮选择消息，也可以指定关键字后交由模块处理</hd-tip>
            </el-form-item>
        </el-form-item>
    </el-form>
</template>

<script>
import Mixin from './Mixin'
export default {
    mixins: [Mixin]
}
</script>

<style></style>
