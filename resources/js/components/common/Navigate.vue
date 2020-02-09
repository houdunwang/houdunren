<template>
    <div class="navigate">
        <div class="container-fluid">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <a class="navbar-brand" href="#"></a>
                <button
                    class="navbar-toggler"
                    type="button"
                    data-toggle="collapse"
                    data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent"
                    aria-expanded="false"
                    aria-label="Toggle navigation"
                >
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div
                    class="collapse navbar-collapse"
                    id="navbarSupportedContent"
                >
                    <ul class="navbar-nav mr-auto">
                        <li
                            class="nav-item mr-4"
                            :key="index"
                            v-for="(menu, index) in menus"
                        >
                            <a class="nav-link" href="#">
                                <i :class="'fa ' + menu.icon"></i>
                                {{ menu.title }}
                            </a>
                        </li>
                    </ul>
                    <form class="form-inline my-2 my-lg-0">
                        <ul class="navbar-nav">
                            <li class="nav-item dropdown">
                                <a
                                    class="nav-link dropdown-toggle"
                                    href="#"
                                    id="navbarDropdown"
                                    role="button"
                                    data-toggle="dropdown"
                                    aria-haspopup="true"
                                    aria-expanded="false"
                                >
                                    <i class="fa fa-user"></i>
                                    向军大叔
                                </a>
                                <div
                                    class="dropdown-menu dropdown-menu-right"
                                    aria-labelledby="navbarDropdown"
                                >
                                    <a class="dropdown-item" href="#"
                                        >修改资料</a
                                    >
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#"
                                        >退出登录</a
                                    >
                                </div>
                            </li>
                        </ul>
                    </form>
                </div>
            </nav>
        </div>
    </div>
</template>
<script>
export default {
    data() {
        return {
            menus: [
                { title: "模块管理", icon: "fa-cubes" },
                { title: "用户管理", icon: "fa-user" },
                { title: "系统设置", icon: "fa-support" },
                { title: "更新缓存", icon: "fa-bitbucket" },
                { title: "在线文档", icon: "fa-file-code-o" }
            ]
        };
    },
    methods: {
        handleSelect(key, keyPath) {}
    }
};
</script>
<style lang="scss" scoped>
.navigate {
    background-color: #343a40;
}
</style>
