<template>
    <div>
        <el-form ref="form" label-width="80px">
            <el-alert type="info" class="mb-3">
                <ul>
                    <li>需要先保存菜单后，再进行微信菜单推送</li>
                    <li>一级菜单最多4个汉字，二级菜单最多7个汉字</li>
                </ul>
            </el-alert>
            <div class="wechat-menu">
                <div class="view border border-gray-300 shadow-md rounded-2xl overflow-hidden">
                    <header class="shadow-sm border-b border-gray-300">
                        <img src="/images/wechat-header.jpg" class="border-bottom shadow-sm" />
                    </header>
                    <footer class="shadow-2xl">
                        <dl v-for="(menu, index) in menus" :key="index">
                            <!-- 一级菜单列表 -->
                            <dt @click="edit(menu, index)" :class="{ current: form == menu }" class="text-sm">{{ menu.name | truncate(4, '') }}</dt>
                            <!-- 子菜单添加按钮 -->
                            <dd @click="add(menu.sub_button, index)" v-if="menu.sub_button.length < 5">
                                <i class="fas fa-plus-circle fa-1x"></i>
                            </dd>
                            <!-- 子菜单列表 -->
                            <div>
                                <draggable v-model="menu.sub_button">
                                    <dd
                                        v-for="(button, n) in menu.sub_button"
                                        :key="n"
                                        :class="{ current: form === button }"
                                        class="text-sm font-monospace"
                                        @click="edit(button, index)"
                                    >
                                        {{ button.name | truncate(7, '') }}
                                    </dd>
                                </draggable>
                            </div>
                        </dl>
                        <!-- 添加一级菜单 -->
                        <dl v-if="menus.length < 3">
                            <dt @click="add(menus, menus.length)">
                                <i class="fas fa-plus-circle fa-1x"></i>
                            </dt>
                        </dl>
                    </footer>
                </div>
                <!-- 右侧编辑菜单 -->
                <div class="flex-1 ml-5">
                    <div v-if="form.type">
                        <el-button-group>
                            <el-button
                                size="mini"
                                v-for="(type, name) in types"
                                :key="name"
                                :type="form.type == name ? 'primary' : ''"
                                @click="form.type = name"
                            >
                                {{ type.title }}
                            </el-button>
                        </el-button-group>
                        <div class="my-3 p-3 text-sm text-gray-500 border rounded-sm">
                            <i class="fas fa-info-circle    "></i>
                            {{ types[form.type].description }}
                        </div>
                        <div class="mt-3 border p-3 rounded-md">
                            <component :is="component" :form="form" />
                            <el-button class="mt-3 " size="small" type="danger" @click="del">删除菜单</el-button>
                        </div>
                    </div>
                    <div v-else class="p-10 text-gray-500 text-sm text-center border"><i class="fas fa-info-circle    "></i> 请点击左侧菜单进行编辑</div>
                </div>
            </div>
            <el-button-group class="mt-3">
                <el-button type="primary" size="default" @click="submit" :disabled="isSubmit" v-loading="isSubmit">保存菜单</el-button>
                <el-button type="success" size="default" @click="push">推送菜单到微信公众号</el-button>
            </el-button-group>
        </el-form>
    </div>
</template>

<script>
import types from './types'
import fields from './fields'
import draggable from 'vuedraggable'
export default {
    props: ['wechat'],
    components: { draggable },
    data() {
        return {
            //按钮类型
            types,
            //菜单集
            menus: [],
            //一级菜单索引
            pid: 0,
            //当前编辑的菜单
            form: {},
            isSubmit: false
        }
    },
    watch: {
        // 切换类型时更改菜单的type值
        type(t) {
            this.form.type = t
        }
    },
    created() {
        //初始化菜单数据，并激活第一个菜单为可编辑
        this.menus = this.wechat.menus || []
        if (this.menus.length) {
            this.form = this.menus[0]
        }
    },
    computed: {
        //动态菜单编辑组件
        component() {
            return 'HdWechatMenu' + _.upperFirst(this.form.type)
        }
    },
    methods: {
        //添加菜单
        add(menus, pid) {
            menus.unshift((this.form = _.cloneDeep(fields)))
            this.pid = pid
        },
        //编辑菜单
        edit(menu, index) {
            this.form = menu
            this.pid = index
        },
        //删除菜单
        del() {
            this.$confirm('确定删除吗？', '温馨提示').then(() => {
                this.menus.forEach((menu, i) => {
                    //是否属于一级菜单
                    if (menu === this.form) {
                        this.menus.splice(i, 1)
                        this.form = {}
                    }
                    //检查是否属于子菜单
                    menu.sub_button.forEach((button, n) => {
                        if (button === this.form) {
                            menu.sub_button.splice(n, 1)
                            this.form = {}
                        }
                    })
                })
            })
        },
        //保存菜单
        submit() {
            this.isSubmit = true
            const url = `site/${this.wechat.site_id}/wechat/${this.wechat.id}/menu`
            axios
                .put(url, { menus: this.menus })
                .then(_ => {})
                .finally(_ => {
                    this.isSubmit = false
                })
        },
        //推送菜单
        async push() {
            await axios.get(`site/${this.wechat.site_id}/wechat/${this.wechat.id}/menu/push`)
        }
    }
}
</script>

<style lang="scss">
.wechat-menu {
    display: flex;
    .view {
        width: 350px;
        height: 550px;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        header {
            img {
                width: 100%;
            }
        }
        footer {
            display: flex;
            align-items: flex-end;
            justify-content: space-between;
            dl {
                width: 33%;
                flex-grow: 1;
                display: flex;
                flex-direction: column-reverse;
                padding: 0;
                margin: 0;
                border-right: solid 1px #ccc;
                border-left: solid 1px #ccc;
                margin-left: -1px;
                &:last-of-type {
                    margin-right: -1px;
                }
                dt,
                dd {
                    cursor: pointer;
                    overflow: hidden;
                    padding: 0px;
                    margin: 0;
                    background: #fafafa;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    color: #6d6b6b;
                    font-weight: normal;
                    height: 40px;
                    box-sizing: border-box;
                    border-top: solid 1px #ccc;
                    padding: 6px;
                    transition: 0.3s;
                    &:hover {
                        background-color: #f3f3f3;
                    }
                    &.current {
                        border-bottom: none;
                        background: #3aa5a2;
                        color: #fff;
                    }
                }
                dt {
                }
                dd {
                    background: #fff;
                }
            }
        }
    }
    .edit {
        flex-grow: 1;
    }
}
</style>
