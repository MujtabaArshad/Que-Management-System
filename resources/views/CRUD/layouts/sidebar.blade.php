{{-- AdminDashboard/sidebar.blade.php --}}

<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo h-auto">
        <a href="" class="app-brand-link col w-auto d-flex">
            <span class=" demo col-md-12 col-sm-12">
                <img class="m-auto d-flex col-sm-12" id="img" src="{{asset('assets/img/bank-icon/DT_Logo_N3.png')}}" alt="" style="min-width:100px">

            </span>
        </a>
        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>
    <div class="menu-inner-shadow"></div>
    <ul style="margin-top: 20px;" class="menu-inner py-1">
        <!-- Dashboard -->
        <li class="menu-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
            <a href="{{ route('dashboard') }}" class="menu-link">
                <img src="{{ asset('assets/img/bank-icon/ICON.png') }}" alt="" style="width:30px; margin-right:10px;">
                <div class="gradient-text" data-i18n="Analytics">Dashboard</div>
            </a>
        </li>

        @foreach($menus as $menu)
            @php
            $isActiveSubmenu =$menu->subMenus->contains(function($submenu)
            {
                return request()->routeIs($submenu->route);
            });
            @endphp
            <li class="menu-item {{ request()->routeIs($menu->route) ? 'active' : '' }} {{$isActiveSubmenu ? 'open' : ''}} " id="{{ $menu->id }}">
                <a href="{{ $menu->route ? route($menu->route) : '#' }}" class="menu-link {{ $menu->subMenus->isNotEmpty() ? 'menu-toggle' : '' }}">
                    @if($menu->icon)
                        <img src="{{ asset('assets/img/bank-icon/' . $menu->icon) }}" alt="" style="width:30px; margin-right:10px;">
                    @endif
                    <div class="gradient-text">{{ $menu->name }}</div>
                </a>

                @if($menu->subMenus->isNotEmpty())
                    <ul class="menu-sub">
                        @foreach($menu->subMenus as $submenu)
                            <li class="menu-item {{ request()->routeIs($submenu->route) ? 'active' : '' }}">
                                <a href="{{ route($submenu->route) }}" class="menu-link">
                                    <div class="gradient-text">{{ $submenu->name }}</div>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </li>
        @endforeach


    </ul>
</aside>