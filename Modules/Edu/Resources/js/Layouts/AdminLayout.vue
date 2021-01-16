<template>
    <div>
        <!-- Page Wrapper -->
        <div id="wrapper">
            <!-- Sidebar -->
            <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
                <!-- Sidebar - Brand -->
                <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                    <div class="sidebar-brand-icon rotate-n-15">
                        <i class="fas fa-laugh-wink"></i>
                    </div>
                    <div class="sidebar-brand-text mx-3">
                        {{ $page.props.admin.module.title }}
                    </div>
                </a>

                <!-- Divider -->
                <hr class="sidebar-divider my-0" />

                <!-- Nav Item - Dashboard -->
                <li class="nav-item">
                    <a class="nav-link" href="index.html">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>工作台</span>
                    </a>
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider" />

                <!-- Heading -->
                <div class="sidebar-heading">
                    模块业务
                </div>

                <!-- Nav Item - Pages Collapse Menu -->
                <li class="nav-item" v-for="(menu, index) in $page.props.admin.menus" :key="index">
                    <a
                        class="nav-link collapsed"
                        href="#"
                        data-toggle="collapse"
                        :data-target="`#collapseTwo${index}`"
                        aria-expanded="true"
                        aria-controls="collapseTwo"
                    >
                        <i :class="menu.icon"></i>
                        <span>{{ menu.title }}</span>
                    </a>
                    <div :id="`collapseTwo${index}`" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <inertia-link class="collapse-item" :href="item.route" v-for="(item, n) in menu.items" :key="n">
                                {{ item.title }}
                            </inertia-link>
                        </div>
                    </div>
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider" />

                <!-- Heading -->
                <div class="sidebar-heading">
                    系统功能
                </div>

                <!-- Nav Item - Pages Collapse Menu -->
                <!-- Nav Item - Charts -->
                <li class="nav-item">
                    <a class="nav-link" href="/site/site">
                        <i class="fas fa-fw fa-chart-area"></i>
                        <span>站点列表</span>
                    </a>
                </li>

                <!-- Nav Item - Tables -->
                <li class="nav-item">
                    <a class="nav-link" :href="`/site/${$page.props.admin.site.id}/config`">
                        <i class="fas fa-fw fa-table"></i>
                        <span>站点配置</span></a
                    >
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider d-none d-md-block" />

                <!-- Sidebar Toggler (Sidebar) -->
                <div class="text-center d-none d-md-inline">
                    <button class="rounded-circle border-0" id="sidebarToggle"></button>
                </div>
            </ul>
            <!-- End of Sidebar -->

            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">
                <!-- Main Content -->
                <div id="content">
                    <!-- Topbar -->
                    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-3 static-top shadow-xs border-b">
                        <!-- Sidebar Toggle (Topbar) -->
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>

                        <!-- Topbar Navbar -->
                        <ul class="navbar-nav ml-auto">
                            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                            <li class="nav-item dropdown no-arrow d-sm-none">
                                <a
                                    class="nav-link dropdown-toggle"
                                    href="#"
                                    id="searchDropdown"
                                    role="button"
                                    data-toggle="dropdown"
                                    aria-haspopup="true"
                                    aria-expanded="false"
                                >
                                    <i class="fas fa-search fa-fw"></i>
                                </a>
                                <!-- Dropdown - Messages -->
                                <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                                    <form class="form-inline mr-auto w-100 navbar-search">
                                        <div class="input-group">
                                            <input
                                                type="text"
                                                class="form-control bg-light border-0 small"
                                                placeholder="Search for..."
                                                aria-label="Search"
                                                aria-describedby="basic-addon2"
                                            />
                                            <div class="input-group-append">
                                                <button class="btn btn-primary" type="button">
                                                    <i class="fas fa-search fa-sm"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </li>

                            <div class="topbar-divider d-none d-sm-block"></div>

                            <!-- Nav Item - User Information -->
                            <li class="nav-item dropdown no-arrow">
                                <a
                                    class="nav-link dropdown-toggle"
                                    href="#"
                                    id="userDropdown"
                                    role="button"
                                    data-toggle="dropdown"
                                    aria-haspopup="true"
                                    aria-expanded="false"
                                >
                                    <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                                        {{ $page.props.user.name }}
                                    </span>
                                    <img class="img-profile rounded-circle" :src="$page.props.user.icon" />
                                </a>
                                <!-- Dropdown - User Information -->
                                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                    <a class="dropdown-item" href="/system/my">
                                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                        我的资料
                                    </a>

                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="/logout" data-toggle="modal" data-target="#logoutModal">
                                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                        退出登录
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </nav>
                    <!-- End of Topbar -->

                    <!-- Begin Page Content -->
                    <div class="container-fluid bg-white border ml-2 p-5 min-h-full border-gray-200">
                        <hd-message />
                        <slot />
                    </div>
                    <!-- /.container-fluid -->
                </div>
                <!-- End of Main Content -->
            </div>
            <!-- End of Content Wrapper -->
        </div>
        <!-- End of Page Wrapper -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <!-- Logout Modal-->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-primary" href="login.html">Logout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {}
</script>

<style></style>
