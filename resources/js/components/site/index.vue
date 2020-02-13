<template>
    <div>
        <router-link :to="{name:'site.add'}" class="btn btn-info mb-3">
            <i class="fa fa-plus"></i> 添加网站
        </router-link>


        <div class="card mb-3 shadow-sm" v-for="site in sites" :key="site.id">
            <div class="card-header">
                <div class="row">
                    <div class="col-6">套餐</div>
                    <div class="col-6 text-right">
                        <i class="fa fa-cog"></i> 管理站点
                    </div>
                </div>
            </div>
            <div class="card-body text-dark d-flex align-items-center">
                <i class="fa fa-rss fa-3x mr-3"></i>
                <span class="h4">{{ site.name }}</span>
            </div>
            <div class="card-footer text-muted">
                <div class="d-flex flex-md-row flex-column justify-content-between">
                    <div class="small">
                        创建时间: {{ site.created_at | dateFormat }}
                        站长 : {{ site.admin.name }}
                    </div>

                    <div class="lin"></div>

                    <div class="small" v-if="isAdmin(site)">
                        <router-link class="text-muted mr-2" :to="{name:'site.config',params:{id:site.id}}">
                            <i class="fa fa-key"></i> 网站配置
                        </router-link>

                        <a href class="text-muted mr-2">
                            <i class="fa fa-key"></i> 站点模块
                        </a>
                        <a href class="text-muted mr-2">
                            <i class="fa fa-comment-o"></i> 微信公众号
                        </a>
                        <a href class="text-muted mr-2">
                            <i class="fa fa-user"></i> 操作员管理
                        </a>
                        <router-link :to="{name:'site.edit',params:{id:site.id}}" class="text-muted mr-2">
                            <i class="fa fa-pencil-square-o"></i> 编辑
                        </router-link>
                        <a href @click.prevent="delSite(site)" class="text-muted">
                            <i class="fa fa-trash"></i> 删除
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import {mapState, mapActions} from "vuex";

    export default {
        computed: {
            ...mapState('site', {sites: 'data'}),
            ...mapState("user", {user: 'data'}),

        },
        methods: {
            ...mapActions("site", ["all", "del"]),
            isAdmin(site) {
                return this.user.is_super_admin || site.admin.id === this.user.id;
            },
            delSite(site) {
                this.$confirm('确定删除吗?', '温馨提示', {
                    confirmButtonText: '确定',
                    cancelButtonText: '取消',
                    type: 'warning',
                }).then(async () => {
                    await this.del(site.id);
                    this.$message.success('删除成功')
                })
            }
        },
        async created() {
            await this.all()
        },
    };
</script>
