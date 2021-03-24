<template>
    <div>
        <hd-tab :tabs="tabs" />
        <el-alert effect="light" closable> 正在管理【{{ site.title }}】站点的公众号 </el-alert>

        <el-table :data="wechats" style="width: 100%" border v-loading="loading" class="mt-3">
            <el-table-column prop="id" label="编号" width="100"> </el-table-column>
            <el-table-column prop="title" label="公众号名称"> </el-table-column>
            <el-table-column prop="name" label="微信号"> </el-table-column>
            <el-table-column label="微信号" #default="{ row: wechat }">
                <el-popover placement="top-start" title="扫描二维码关注公众号" width="200" trigger="hover">
                    <template v-slot>
                        <el-image slot="reference" style="width: 150px; height: 150px" :src="wechat.qr" fit="cover"></el-image>
                    </template>
                    <el-image slot="reference" style="width: 50px; height: 50px" :src="wechat.qr" fit="cover"></el-image>
                </el-popover>
            </el-table-column>
            <el-table-column label="类型" #default="scope">
                {{ scope.row.type == 'subscribe' ? '订阅号' : '服务号' }}
            </el-table-column>
            <el-table-column header-align="center" align="center" label="API" width="300" #default="{ row: wechat }">
                {{ `${site.domain}/wechat/api/${site.id}/${wechat.id}` }}
            </el-table-column>
            <el-table-column align="center" width="420" #default="{ row: wechat }">
                <el-button-group size="small" class="flex">
                    <el-dropdown>
                        <el-button size="small" type="success">公众号管理<i class="el-icon-arrow-down el-icon--right"></i> </el-button>
                        <el-dropdown-menu slot="dropdown">
                            <el-dropdown-item>
                                <router-link :to="{ name: 'wechat.wechat.edit', query: { sid: site.id, id: wechat.id } }" href="#" type="primary" size="small">
                                    编辑
                                </router-link>
                            </el-dropdown-item>
                            <el-dropdown-item>
                                <a href="#" size="small" @click.prevent="del(wechat)">删除</a>
                            </el-dropdown-item>
                        </el-dropdown-menu>
                    </el-dropdown>
                    <el-dropdown>
                        <el-button size="small" type="primary">基本功能<i class="el-icon-arrow-down el-icon--right"></i> </el-button>
                        <el-dropdown-menu slot="dropdown">
                            <el-dropdown-item>
                                <router-link :to="{ name: 'wechat.default.index', query: { sid: wechat.site_id, wid: wechat.id } }">
                                    默认消息
                                </router-link>
                            </el-dropdown-item>
                            <el-dropdown-item>
                                <router-link :to="{ name: 'wechat.menu.index', query: { sid: wechat.site_id, wid: wechat.id } }">
                                    菜单设置
                                </router-link>
                            </el-dropdown-item>
                            <el-dropdown-item>
                                <router-link :to="{ name: 'wechat.qr.index', query: { sid: wechat.site_id, wid: wechat.id } }">
                                    二维码
                                </router-link>
                            </el-dropdown-item>
                            <el-dropdown-item>
                                <router-link :to="{ name: 'wechat.user.index', query: { sid: wechat.site_id, wid: wechat.id } }">
                                    粉丝用户
                                </router-link>
                            </el-dropdown-item>
                        </el-dropdown-menu>
                    </el-dropdown>
                    <el-dropdown>
                        <el-button size="small" type="warning"> 消息管理<i class="el-icon-arrow-down el-icon--right"></i> </el-button>
                        <el-dropdown-menu slot="dropdown">
                            <el-dropdown-item>
                                <router-link :to="{ name: 'wechat.message.index', query: { sid: site.id, wid: wechat.id, type: 'text' } }">
                                    文本消息
                                </router-link>
                            </el-dropdown-item>
                            <el-dropdown-item>
                                <router-link :to="{ name: 'wechat.message.index', query: { sid: site.id, wid: wechat.id, type: 'news' } }">
                                    图文消息
                                </router-link>
                            </el-dropdown-item>
                            <el-dropdown-item>
                                <router-link :to="{ name: 'wechat.message.index', query: { sid: site.id, wid: wechat.id, type: 'image' } }">
                                    图片消息
                                </router-link>
                            </el-dropdown-item>
                            <el-dropdown-item>
                                <router-link :to="{ name: 'wechat.message.index', query: { sid: site.id, wid: wechat.id, type: 'voice' } }">
                                    语音消息
                                </router-link>
                            </el-dropdown-item>
                            <el-dropdown-item>
                                <router-link :to="{ name: 'wechat.message.index', query: { sid: site.id, wid: wechat.id, type: 'video' } }">
                                    视频消息
                                </router-link>
                            </el-dropdown-item>
                            <el-dropdown-item>
                                <router-link :to="{ name: 'wechat.message.index', query: { sid: site.id, wid: wechat.id, type: 'module' } }">
                                    模块消息
                                </router-link>
                            </el-dropdown-item>
                        </el-dropdown-menu>
                    </el-dropdown>
                    <el-dropdown>
                        <el-button size="small" type="danger"> 素材管理<i class="el-icon-arrow-down el-icon--right"></i> </el-button>
                        <el-dropdown-menu slot="dropdown">
                            <el-dropdown-item>
                                <router-link :to="{ name: 'wechat.material.index', query: { sid: site.id, wid: wechat.id, type: 'image' } }">
                                    图片素材
                                </router-link>
                            </el-dropdown-item>
                            <el-dropdown-item>
                                <router-link :to="{ name: 'wechat.material.index', query: { sid: site.id, wid: wechat.id, type: 'voice' } }">
                                    语音素材
                                </router-link>
                            </el-dropdown-item>
                            <el-dropdown-item>
                                <router-link :to="{ name: 'wechat.material.index', query: { sid: site.id, wid: wechat.id, type: 'video' } }">
                                    视频素材
                                </router-link>
                            </el-dropdown-item>
                            <el-dropdown-item>
                                <router-link :to="{ name: 'wechat.material.index', query: { sid: site.id, wid: wechat.id, type: 'news' } }">
                                    图文素材
                                </router-link>
                            </el-dropdown-item>
                            <el-dropdown-item>
                                <router-link :to="{ name: 'wechat.material.index', query: { sid: site.id, wid: wechat.id, type: 'thumb' } }">
                                    缩略图素材
                                </router-link>
                            </el-dropdown-item>
                        </el-dropdown-menu>
                    </el-dropdown>
                </el-button-group>
            </el-table-column>
        </el-table>
    </div>
</template>

<script>
import tabs from './tabs'
export default {
    data() {
        return {
            tabs,
            site: {},
            wechats: [],
            isSync: false,
            loading: true
        }
    },
    async created() {
        const sid = this.$route.query.sid
        ;[this.site, this.wechats] = await Promise.all([axios.get(`site/${sid}`), axios.get(`site/${sid}/wechat`)])
        this.loading = false
    },
    methods: {
        del(wechat) {
            this.$confirm('确定删除吗？', '温馨提示')
                .then(async () => {
                    await axios.delete(`site/${this.site.id}/wechat/${wechat.id}`)
                    this.wechats.splice(this.wechats.indexOf(wechat), 1)
                })
                .catch(() => {})
        }
    }
}
</script>

<style></style>
