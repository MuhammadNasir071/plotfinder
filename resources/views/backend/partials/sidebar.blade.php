<!-- MENU SIDEBAR-->
<aside class="menu-sidebar d-none d-lg-block">
    <div class="logo">
        <a href="{{route('admin.dashboard')}}">
            <img src="{{asset('frontend/assets/img/white_logo.png')}}" alt="Cool Admin" />
        </a>
    </div>
    <div class="menu-sidebar__content js-scrollbar1">
        <nav class="navbar-sidebar">
            <ul class="list-unstyled navbar__list">
                <li class="{{Route::currentRouteName() == 'admin.dashboard' ? 'active' : ''}} ">
                    <a href="{{route('admin.dashboard')}}">
                        <i class="fas fa-tachometer-alt"></i>Dashboard
                    </a>
                </li>
                <li class="{{Route::currentRouteName() == 'admin.users.index' ? 'active' : (Route::currentRouteName() == 'admin.users.show' ? 'active' : (Route::currentRouteName() == 'admin.users.edit' ? 'active' : ''))}}">
                    <a href="{{route('admin.users.index')}}">
                        <i class="fas fa-user"></i>User Accounts
                    </a>
                </li>

                <li class="has-sub">
                    <a class="js-arrow {{Route::currentRouteName() == 'admin.index.property' ? 'open' : (Route::currentRouteName() == 'admin.add.property' ? 'open' : (Route::currentRouteName() == 'admin.show.property' ? 'open' : (Route::currentRouteName() == 'admin.edit.property' ? 'open' : '')))}}" href="#">
                        <i class="fas fa-copy"></i>Properties</a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list" style="{{Route::currentRouteName() == 'admin.index.property' ? 'display:block' : (Route::currentRouteName() == 'admin.add.property' ? 'display:block' : (Route::currentRouteName() == 'admin.show.property' ? 'display:block' : (Route::currentRouteName() == 'admin.edit.property' ? 'display:block' : '')))}}">
                        <li class="{{Route::currentRouteName() == 'admin.index.property' ? 'active' : (Route::currentRouteName() == 'admin.show.property' ? 'active' : (Route::currentRouteName() == 'admin.edit.property' ? 'active' : ''))}}">
                            <a href="{{route('admin.index.property')}}"> <i class="fas fa-chart-bar"></i>All Properies</a>
                        </li>
                        <li class="{{Route::currentRouteName() == 'admin.add.property' ? 'active' : ''}}">
                            <a href="{{route('admin.add.property')}}"> <i class="fas fa-chart-bar"></i>Add Property</a>
                        </li>
                    </ul>
                </li>
                <li class="{{Route::currentRouteName() == 'admin.contactus.message' ? 'active' : (Route::currentRouteName() == 'admin.users.show' ? 'active' : (Route::currentRouteName() == 'admin.users.edit' ? 'active' : ''))}}">
                    <a href="{{ route('admin.contactus.message') }}">
                        <i class="fas fa-comment"></i>Messages</a>
                </li>
            </ul>
        </nav>
    </div>
</aside>

<!-- END MENU SIDEBAR-->
