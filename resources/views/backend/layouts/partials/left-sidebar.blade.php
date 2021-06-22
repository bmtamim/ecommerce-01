<aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar">

        <div class="user-profile">
            <div class="ulogo">
                <a href="index.html">
                    <!-- logo for regular state and mobile devices -->
                    <div class="d-flex align-items-center justify-content-center">
                        <img src="{{ asset('backend/images/logo-dark.png') }}" alt="">
                        <h3><b>Sunny</b> Admin</h3>
                    </div>
                </a>
            </div>
        </div>

        <!-- sidebar menu-->
        <ul class="sidebar-menu" data-widget="tree">

            <li class="{{ request()->url() == route('admin.dashboard') ? 'active' : '' }}">
                <a href="{{ route('admin.dashboard') }}">
                    <i data-feather="pie-chart"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="treeview {{ request()->url() == route('admin.products.index') ? 'active' : '' }}">
                <a href="#">
                    <i data-feather="message-circle"></i>
                    <span>{{ __('Products') }}</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ request()->url() == route('admin.products.index') ? 'active' : '' }}"><a
                            href="{{ route('admin.products.index') }}"><i class="ti-more"></i>{{ __('All Products') }}
                        </a></li>
                    <li class="{{ request()->url() == route('admin.products.create') ? 'active' : '' }}"><a
                            href="{{ route('admin.products.create') }}"><i class="ti-more"></i>{{ __('Add New') }}</a>
                    </li>
                    <li class="{{ request()->url() == route('admin.category.index') ? 'active' : '' }}"><a
                            href="{{ route('admin.category.index') }}"><i class="ti-more"></i>{{ __('Category') }}</a>
                    </li>
                    <li class="{{ request()->url() == route('admin.brands.index') ? 'active' : '' }}"><a
                            href="{{ route('admin.brands.index') }}"><i class="ti-more"></i>{{ __('Brands') }}</a></li>
                </ul>
            </li>
            <li class="{{ request()->url() == route('admin.subscribers.index') ? 'active' : '' }}">
                <a href="{{ route('admin.subscribers.index') }}">
                    <i data-feather="pie-chart"></i>
                    <span>{{ __('Subscribers') }}</span>
                </a>
            </li>
            <li class="treeview {{ request()->url() == route('admin.coupons.index') ? 'active' : '' }}">
                <a href="#">
                    <i data-feather="message-circle"></i>
                    <span>{{ __('Coupons') }}</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('admin.coupons.index') }}"><i class="ti-more"></i>{{ __('All Coupons') }}</a>
                    </li>
                    <li><a href="{{ route('admin.coupons.create') }}"><i class="ti-more"></i>{{ __('Add New') }}</a>
                    </li>
                </ul>
            </li>
            <li class="treeview {{ request()->url() == route('admin.home-sliders.index') ? 'active' : '' }}">
                <a href="#">
                    <i data-feather="message-circle"></i>
                    <span>{{ __('Home Slider') }}</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('admin.home-sliders.index') }}"><i class="ti-more"></i>{{ __('All Sliders') }}</a>
                    </li>
                    <li><a href="{{ route('admin.home-sliders.create') }}"><i class="ti-more"></i>{{ __('Add New') }}</a>
                    </li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i data-feather="message-circle"></i>
                    <span>{{ __('Shipping Area') }}</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('admin.shipping.division.index') }}"><i class="ti-more"></i>{{ __('Division') }}</a>
                    </li>
                    <li><a href="{{ route('admin.shipping.district.index') }}"><i class="ti-more"></i>{{ __('District') }}</a>
                    </li>
                </ul>
            </li>
            <li class="header nav-small-cap">{{ __('Settings') }}</li>

        </ul>
    </section>

    <div class="sidebar-footer">
        <!-- item-->
        <a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Settings"
           aria-describedby="tooltip92529"><i class="ti-settings"></i></a>
        <!-- item-->
        <a href="mailbox_inbox.html" class="link" data-toggle="tooltip" title="" data-original-title="Email"><i
                class="ti-email"></i></a>
        <!-- item-->
        <a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Logout"><i
                class="ti-lock"></i></a>
    </div>
</aside>
