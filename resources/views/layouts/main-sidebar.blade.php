<div class="container-fluid">
    <div class="row">
        <!-- Left Sidebar start-->
        <div class="side-menu-fixed">
            <div class="scrollbar side-menu-bg">
                <ul class="nav navbar-nav side-menu" style="margin-left: 50px " id="sidebarnav">
                    <!-- menu item Dashboard-->

                    <li>
                        <a href="{{route('home')}}">
                            <i class="ti-home"></i>
                            <span class="right-nav-text">الرئيسية</span>
                        </a>
                    </li>

                    <!-- menu title -->
                    <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">الصفحات</li>
                    <li>
                        <a href="{{route('offices.index')}}">
                            <i class="fa fa-bank"></i>
                            <span class="right-nav-text">المكاتب العقارية</span>
                        </a>
                    </li>

                    <li>
                        <a href="" data-toggle="collapse"
                           data-target="menu"
                           onclick=window.location.assign('{{route('lands.index')}}');>
                            <div class="pull-left">
                                <i class="ti-map-alt"></i>
                                <span class="right-nav-text">الاراضي</span>
                            </div>
                            <div class="clearfix"></div>
                        </a>

                        <ul>
                            <li>
                                <a href="{{route('landscapes.index')}}">
                                    <i class="ti-menu-alt"></i>
                                    <span class="right-nav-text">المخططات</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{route('directions.index')}}">
                                    <i class="ti-menu-alt"></i>
                                    <span class="right-nav-text">الواجهات</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{route('land-descriptions.index')}}">
                                    <i class="ti-menu-alt"></i>
                                    <span class="right-nav-text">وصف الموقع</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Left Sidebar End-->

        <!--=================================
