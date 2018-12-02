<!-- begin:: Aside -->
<div class="k-aside__brand	k-grid__item " id="k_aside_brand">
    <div class="k-aside__brand-logo">
        <a href="/" target="_blank">
            <img alt="Logo" src="{{config_get('admin.site.logo',asset('images/logo.png'))}}"/>
        </a>
    </div>
    <div class="k-aside__brand-tools">
        <button class="k-aside__brand-aside-toggler k-aside__brand-aside-toggler--left"
                id="k_aside_toggler">
            <span></span>
        </button>
    </div>
</div>
<!-- end:: Aside -->
<div class="k-aside-menu-wrapper k-grid__item k-grid__item--fluid" id="k_aside_menu_wrapper">
    <div id="k_aside_menu" class="k-aside-menu mt-0" data-kmenu-vertical="1" data-kmenu-scroll="1"
         data-kmenu-dropdown-timeout="500">
        <ul class="k-menu__nav pt-0">
            @foreach(menus('admin_menu') as $module)
                @if(auth()->user()->hasAnyPermission($module['permission']))
                    <li class="k-menu__item k-menu__item--submenu
                        {{active_class(if_uri_pattern('*'.strtolower($module['module']).'*'),'k-menu__item--open')}}"
                        aria-haspopup="true" data-kmenu-submenu-toggle="hover">
                        <a href="javascript:;" class="k-menu__link k-menu__toggle">
                            <i class="k-menu__link-icon {{$module['icon']}}"> </i>
                            <span class="k-menu__link-text">{{$module['title']}}</span>
                            <i class="k-menu__ver-arrow la la-angle-right"></i>
                        </a>
                        <div class="k-menu__submenu "><span class="k-menu__arrow"></span>
                            <ul class="k-menu__subnav">
                                @foreach($module['menus'] as $menu)
                                    @can($menu['permission'])
                                        <li class="k-menu__item " aria-haspopup="true">
                                            <a href="{{$menu['route']}}" class="k-menu__link ">
                                                <i class="k-menu__link-bullet k-menu__link-bullet--dot"><span></span></i>
                                                <span class="k-menu__link-text">{{$menu['name']}}</span>
                                            </a>
                                        </li>
                                    @endcan
                                @endforeach
                            </ul>
                        </div>
                    </li>
                @endif
            @endforeach
            <li class="k-menu__section ">
                <h4 class="k-menu__section-text">扩展插件</h4>
                <i class="k-menu__section-icon flaticon-more-v2"></i>
            </li>
        </ul>
    </div>
</div>