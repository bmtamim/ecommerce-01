<ul id="product-tabs" class="nav nav-tabs nav-tab-cell nav-pills">
    <li class="{{ request()->url() == route('frontend.dashboard.index') ? 'active' : '' }}"><a
            href="{{ route('frontend.dashboard.index') }}">{{ __('Dashboard') }}</a>
    </li>

    <li class="{{ request()->url() == route('frontend.dashboard.orders.index') ? 'active' : '' }}"><a href="{{ route('frontend.dashboard.orders.index') }}">{{ __('Orders') }}</a>
    </li>

    <li><a data-toggle="tab" href="#downloads">{{ __('Downloads') }}</a></li>

    <li class="{{ request()->url() == route('frontend.dashboard.account-details.index') ? 'active' : '' }}"><a
            href="{{ route('frontend.dashboard.account-details.index') }}">{{ __('Account Details') }}</a></li>

    <li><a href="{{ route('logout') }}"
           onclick="event.preventDefault(); document.getElementById('user-logout-dashboard').submit();">{{ __('Logout') }}</a>
        <form id="user-logout-dashboard" action="{{ route('logout') }}" class="d-none" method="POST">
            @csrf
        </form>
    </li>
</ul>
