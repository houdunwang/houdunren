<div style="background: #fff" class="pt-5 mt-5 shadow">
    <footer class="container">
        <div class="text-center mb-5">
            <span class="u-divider u-divider--xs u-divider--text">houdunren.com</span>
        </div>
        <hr class="my-0">
        <div class="text-center py-7">
            <div>
                <p class="text-muted small">我们的使命：传播互联网前沿技术，帮助更多的人实现梦想</p>
                <small class="small text-secondary">
                    Copyright © 2010-2018 houdunren.com All Rights Reserved 京ICP备12048441号-3
                </small>
                <p class="small text-secondary">
                    <i class="fa fa-phone-square" aria-hidden="true"></i> : {{config_get('admin.site.tel')}}
                    <i class="fa fa-telegram ml-2" aria-hidden="true"></i> :
                    <a href="mailto:{{config_get('admin.site.email')}}" class="text-secondary">
                        {{config_get('admin.site.email')}}
                    </a>
                    <br>
                    编码: <a href="http://www.aoxiangjun.com">向军大叔</a>
                    基于 <a href="http://www.hdcms.com">HDCMS</a> 构建
                </p>
            </div>
        </div>
    </footer>
    <a class="js-go-to u-go-to" href="#"
       data-position='{"bottom": 15, "right": 15 }'
       data-type="fixed"
       data-offset-top="400"
       data-compensation="#header"
       data-show-effect="slideInUp"
       data-hide-effect="slideOutDown">
        <span class="fa fa-arrow-up u-go-to__inner"></span>
    </a>
    <script>
        require([
            'jquery-migrate', 'bootstrap', 'popper',
            'hs.core', 'hs.header', 'hs.focus-state', 'hs.validation', 'hs.unfold', 'hs.show-animation',
            'hs.fancybox', 'hs.slick-carousel', 'hs.go-to'
        ], function () {
            $(document).ready(function () {
                $('.js-mega-menu').HSMegaMenu({
                    event: 'hover',
                    pageContainer: $('.container'),
                    breakpoint: 767,
                    hideTimeOut: 0
                });
                $.HSCore.components.HSHeader.init($('#header'));
                $.HSCore.helpers.HSFocusState.init();
                $.HSCore.components.HSValidation.init('.js-validate', {
                    rules: {
                        confirmPassword: {
                            equalTo: '#password'
                        }
                    }
                });
                $.HSCore.components.HSFancyBox.init('.js-fancybox');
                // initialization of slick carousel
                $.HSCore.components.HSSlickCarousel.init('.js-slick-carousel');
                // initialization of go to
                $.HSCore.components.HSGoTo.init('.js-go-to');
                // initialization of unfold component
                $.HSCore.components.HSUnfold.init($('[data-unfold-target]'), {
                    afterOpen: function () {
                        $(this).find('input[type="search"]').focus();
                    }
                });
                // initialization of forms
                $.HSCore.helpers.HSFocusState.init();
                // initialization of malihu scrollbar
                // $.HSCore.components.HSMalihuScrollBar.init($('.js-scrollbar'));
                // initialization of show animations
                $.HSCore.components.HSShowAnimation.init('.js-animation-link');
                $("body").show();
            })
        })
    </script>
    {!! config_get('admin.site.statistics') !!}
</div>
