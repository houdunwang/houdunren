<template>
    <hd-layout :tabs="tabs" home="site.site.index">
        <el-form ref="form" label-width="80px">
            <el-alert type="info" class="mb-3">
                <i class="fa fa-info-circle" aria-hidden="true"></i>
                需要先保存菜单后，再进行微信菜单推送
            </el-alert>
            <div class="wechat-menu">
                <div class="view border border-gray-200">
                    <header>
                        <img src="/images/wechat-header.jpg" class="border-bottom shadow-sm" />
                    </header>
                    <footer>
                        <dl v-for="(menu, index) in menus" :key="index">
                            <dt @click="edit(menu, index)" :class="{ current: current == menu }" class="text-sm">{{ menu.name }}</dt>
                            <dd @click="add(menu.sub_button)" v-if="menu.sub_button.length < 5 && pid == index">
                                <i class="fa fa-plus fa-1x" aria-hidden="true"></i>
                            </dd>
                            <dd
                                v-for="(button, n) in menu.sub_button"
                                :key="n"
                                :class="{ current: current === button }"
                                class="text-sm"
                                v-show="pid == index"
                                @click="edit(button, index)"
                            >
                                {{ button.name }}
                            </dd>
                        </dl>
                        <!-- 添加一级菜单 -->
                        <dl v-if="menus.length < 3">
                            <dt @click="add(menus)">
                                <i class="fa fa-plus fa-1x" aria-hidden="true"></i>
                            </dt>
                        </dl>
                    </footer>
                </div>
                <!-- 右侧编辑菜单 -->
                <el-card class="flex-1 ml-5 border shadow-sm border-gray-200" v-if="current">
                    <div slot="header">菜单设置</div>
                    <div class="card-body" v-if="current.type">
                        <el-form-item label="菜单名称">
                            <el-input v-model="current.name"></el-input>
                        </el-form-item>
                        <el-form-item label="菜单类型">
                            <el-radio-group v-model="current.type">
                                <el-radio :label="key" v-for="(value, key) in types" :key="key">{{ value }}</el-radio>
                            </el-radio-group>
                        </el-form-item>
                        <el-card class="shadow-none" :body-style="{ padding: '20px' }">
                            <el-form-item label="关键词" v-if="current.type == 'click'">
                                <el-input v-model="current.key"></el-input>
                            </el-form-item>
                            <el-form-item label="跳转链接" v-if="current.type == 'view'">
                                <el-input v-model="current.url"></el-input>
                            </el-form-item>
                        </el-card>
                    </div>
                    <el-button class="mt-3" size="small" type="info" @click="del">删除菜单</el-button>
                </el-card>
            </div>
            <el-button-group class="mt-3">
                <el-button type="primary" size="small" @click="submit">保存菜单</el-button>
                <el-button type="info" size="small" @click="push">推送菜单到微信公众号</el-button>
            </el-button-group>
        </el-form>
    </hd-layout>
</template>

<script>
import _ from 'lodash'
import tabs from '../tabs'
const button = { type: 'click', name: '菜单名称', url: '', key: '', sub_button: [] }
const types = { view: '链接', click: '关键词' }
const pid = 0

export default {
    props: ['site', 'wechat'],
    data() {
        return {
            tabs: tabs(this.site, this.wechat),
            menus: this.wechat.menus,
            pid,
            current: null,
            types
        }
    },
    mounted() {
        if (this.menus.length > 0) {
            this.current = this.menus[0]
        }
    },
    methods: {
        //编辑菜单
        edit(menu, pid) {
            this.current = menu
            this.pid = pid
        },
        //删除菜单
        del() {
            this.$confirm('确定删除吗？', '温馨提示').then(() => {
                this.menus.map((menu, i) => {
                    menu.sub_button.map((button, n) => {
                        if (button === this.current) {
                            menu.sub_button.splice(n, 1)
                            this.current = null
                        }
                    })
                    if (menu === this.current) {
                        this.menus.splice(i, 1)
                        this.current = null
                    }
                })
            })
        },
        //添加菜单
        add(menus) {
            const menu = _.cloneDeep(button)
            menus.push((this.current = menu))
        },
        //保存菜单
        async submit() {
            let url = route('wechat.menu.update', this.wechat)
            await this.axios.put(url.valueOf(), { menus: this.menus })
        },
        //推送菜单
        async push() {
            let url = route('wechat.menu.push', this.wechat)
            await this.axios.get(url)
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
            justify-content: space-between;
            dl {
                flex-grow: 1;
                display: flex;
                flex-direction: column-reverse;
                padding: 0;
                margin: 0;
                dt,
                dd {
                    cursor: pointer;
                    padding: 0px;
                    margin: 0;
                    background: #fafafa;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    border-top: solid 1px #ddd;
                    border-right: solid 1px #ccc;
                    border-left: solid 1px #ccc;
                    color: #969696;
                    font-weight: normal;
                    height: 40px;
                    box-sizing: border-box;
                    &.current {
                        border: 1px solid #3aa5a2;
                        border-bottom: none;
                        background: #3aa5a2;
                        color: #fff;
                    }
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
