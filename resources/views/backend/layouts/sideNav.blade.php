<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Core</div>
                <a class="nav-link" href="{{route('dashboard')}}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>
                @canany(['post_view', 'postCategory_view', 'user_view', 'product_view', 'productCategory_view', 'tag_view','banner_view'])
                    <div class="sb-sidenav-menu-heading">Interface</div>
                    @can('user_view')
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts"
                           aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fal fa-user-circle"></i></div>
                            Người dùng
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne"
                             data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="{{route('user')}}">Quản lý người dùng</a>
                            </nav>
                        </div>
                    @endcan
                    @can('banner_view')
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts7"
                           aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            Banner
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseLayouts7" aria-labelledby="headingOne"
                             data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="{{route('banner')}}">Quản lý Banner</a>
                            </nav>
                        </div>
                    @endcan
                    @canany(['post_view', 'postCategory_view'])
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts2"
                           aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            Tin tức
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        @can('post_view')
                            <div class="collapse" id="collapseLayouts2" aria-labelledby="headingOne"
                                 data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="{{route('post')}}">Quản lý tin tức</a>
                                </nav>
                            </div>
                        @endcan
                        @can('postCategory_view')
                            <div class="collapse" id="collapseLayouts2" aria-labelledby="headingOne"
                                 data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="{{route('postCategory')}}">Quản lý danh mục tin tức</a>
                                </nav>
                            </div>
                        @endcan
                    @endcanany
                    @canany(['product_view', 'productCategory_view','brand_view', 'size_view'])
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts3"
                           aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            Sản phẩm
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        @can('product_view')
                            <div class="collapse" id="collapseLayouts3" aria-labelledby="headingOne"
                                 data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="{{route('product')}}">Quản lý sản phẩm</a>
                                </nav>
                            </div>
                        @endcan
                        @can('productCategory_view')
                            <div class="collapse" id="collapseLayouts3" aria-labelledby="headingOne"
                                 data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="{{route('productCategory')}}">Quản lý danh mục sản
                                        phẩm</a>
                                </nav>
                            </div>
                        @endcan
                        @can('brand_view')
                            <div class="collapse" id="collapseLayouts3" aria-labelledby="headingOne"
                                 data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="{{route('brand')}}">Quản lý thương hiệu</a>
                                </nav>
                            </div>
                        @endcan
                        @can('size_view')
                            <div class="collapse" id="collapseLayouts3" aria-labelledby="headingOne"
                                 data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="{{route('size')}}">Quản lý size</a>
                                </nav>
                            </div>
                        @endcan
                    @endcanany
                    @can('tag_view')
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts6"
                           aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            Tag
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseLayouts6" aria-labelledby="headingOne"
                             data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="{{route('tag')}}">Quản lý Tag</a>
                            </nav>
                        </div>
                    @endcan
                @endcanany
                @canany(['role_view', 'permission_view', 'setting_view','bill_view'])
                    <div class="sb-sidenav-menu-heading">Admin</div>
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts5"
                       aria-expanded="false" aria-controls="collapseLayouts">
                        <div class="sb-nav-link-icon"><i class="far fa-user-tie"></i></div>
                        Phân quyền
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    @can('role_view')
                        <div class="collapse" id="collapseLayouts5" aria-labelledby="headingOne"
                             data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="{{route('role')}}">Quản lý vai trò</a>
                            </nav>
                        </div>
                    @endcan
                    @can('permission_view')
                        <div class="collapse" id="collapseLayouts5" aria-labelledby="headingOne"
                             data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="{{route('permission')}}">Quản lý quyền</a>
                            </nav>
                        </div>
                    @endcan
                    @can('setting_view')
                        <div aria-labelledby="headingOne">
                            <a class="nav-link" href="{{route('setting')}}">
                                <div class="sb-nav-link-icon"><i class="far fa-user-tie"></i></div>
                                Settings</a>
                        </div>
                    @endcan
                    @can('bill_view')
                        <div aria-labelledby="headingOne">
                            <a class="nav-link" href="{{route('bill')}}">
                                <div class="sb-nav-link-icon"><i class="far fa-user-tie"></i></div>
                                Đơn hàng</a>
                        </div>
                    @endcan
                @endcanany
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Đăng nhập với: {{auth()->user()->email}}</div>
        </div>
    </nav>
</div>
