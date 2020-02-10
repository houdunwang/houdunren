<template>
    <div>
        <dl v-for="(menu, i) in menus" :key="i">
            <dt>{{ menu.title }}</dt>
            <dd>
                <a
                    href=""
                    class="tile d-block"
                    :key="n"
                    v-for="(menu, n) in menu.children"
                >
                    <i :class="`fa fa-2x d-block ${menu.icon}`"></i>
                    {{ menu.title }}
                </a>
            </dd>
        </dl>
    </div>
</template>
<script>
export default {
    data() {
        return {
            menus: [
                {
                    title: "用户管理",
                    children: [
                        { title: "我的帐户", icon: "fa-briefcase", url: "" },
                        { title: "用户管理", icon: "fa-user", url: "" },
                        { title: "用户组管理", icon: "fa-users", url: "" },
                        { title: "服务套餐", icon: "fa-comments-o", url: "" }
                    ]
                },
                {
                    title: "系统管理",
                    children: [
                        { title: "站点列表", icon: "fa-sitemap", url: "" },
                        {
                            title: "系统配置",
                            icon: "fa-tachometer",
                            url: ""
                        },
                        { title: "更新缓存", icon: "fa-refresh", url: "" }
                    ]
                }
            ]
        };
    }
};
</script>
<style lang="scss" scoped>
dt {
    margin-bottom: 20px;
    margin-top: 20px;
    color: #666;
    &::before {
        content: "";
        position: relative;
        top: 5px;
        display: inline-block;
        width: 5px;
        height: 20px;
        margin-right: 15px;
        background: #333;
    }
}
dd {
    display: flex;
    margin-bottom: 50px;
    a {
        margin-right: 10px;
        padding: 10px;
        border-radius: 5px;
        display: block;
        width: 8em;
        text-align: center;
        background: #eee;
        color: #000;
        border: solid 1px #ddd;
        i {
            font-size: 2em;
            display: block;
            margin-bottom: 5px;
        }
        &:hover {
            opacity: 0.9;
            box-shadow: 0 0 2px rgba($color: #b1adad, $alpha: 0.5);
        }
    }
}
</style>
