<template>
    <div>
        <hd-tab :tabs="tabs" />
        <el-button-group>
            <el-button
                size="mini"
                v-for="(type, index) in types"
                :key="index"
                :type="type.type == $route.params.type ? 'danger' : ''"
                @click="router('wechat.message.index', { sid: $route.params.sid, wid: $route.params.wid, type: type.type })"
            >
                {{ type.title }}
            </el-button>
        </el-button-group>

        <hd-wechat-message :type="$route.params.type" class="mt-3" />
    </div>
</template>

<script>
import tabs from './tabs'
const types = [
    { type: 'text', title: '文本消息' },
    { type: 'news', title: '图文消息' },
    { type: 'image', title: '图片消息' }
]
export default {
    route: { path: `:sid/:wid/:type/message` },
    data() {
        return { tabs: tabs(this.$route.params.sid), types }
    }
}
</script>

<style></style>
