

{{-- Sidebar --}}
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

        @foreach($menus as $menuId => $menuGroup)
            @php
                $menu = $menuGroup->first();
                $isActiveSubMenu = $menuGroup->contains(function($submenu) {
                    return request()->routeIs($submenu->sub_route);
                });
            @endphp

            <li class="menu-item {{ $isActiveSubMenu ? 'active open' : (request()->routeIs($menu->main_route) ? 'active' : '') }}"
                id="{{ $menu->main_id }}">
                <a href="{{ $menu->main_route ? route($menu->main_route) : '#' }}" 
                    class="menu-link {{ $menuGroup->count() > 1 ? 'menu-toggle' : '' }} " 
                    style=" color:0096bf">
                    @if($menu->menu_icon)
                        <img src="{{ asset('assets/img/bank-icon/' . $menu->menu_icon) }}" alt="" style="width:30px; margin-right:10px;">
                    @endif
                    <div class="gradient-text">{{ $menu->main_name }}</div>
                </a>
                
                @if($menuGroup->count() > 1)
                    <ul class="menu-sub {{ $isActiveSubMenu ? 'open' : '' }}">
                        @foreach($menuGroup as $submenu)
                            @if($submenu->sub_id && $submenu->sub_route)
                                <li class="menu-item {{ request()->routeIs($submenu->sub_route) ? 'active' : '' }}">
                                    <a href="{{ route($submenu->sub_route) }}" class="menu-link">
                                        <div class="gradient-text">{{ $submenu->sub_name }}</div>
                                    </a>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                @endif
            </li>
        @endforeach
    </ul>
</aside>


