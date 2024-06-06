<aside id="sidebar-wrapper">
    <div class="sidebar-brand">
        <a href="#">
            <img src="{{ asset('assets/img/images.png') }}" alt="SiMagang Logo"
                style="height: 45px; vertical-align: middle; margin-right: 8px;">
            SiMagang Inagata
        </a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
        <a href="index.html">SIM</a>
    </div>
    <ul class="sidebar-menu">
        @foreach ($menuGroups as $item)
            @can($item->permission_name)
                <li
                    class="nav-item dropdown {{ $item->menuItems->pluck('route')->filter(function ($route) {return request()->is($route . '*');})->count()? 'active': '' }}">
                    <a href="#" class="nav-link has-dropdown"><i class="{{ $item->icon }}"></i>
                        <span>{{ $item->name }}</span></a>
                    <ul class="dropdown-menu">
                        @foreach ($item->menuItems as $menuItem)
                            @can($menuItem->permission_name)
                                <li class="{{ request()->is($menuItem->route . '*') ? 'active' : '' }}">
                                    <a class="nav-link " href="{{ url($menuItem->route) }}">{{ $menuItem->name }}</a>
                                </li>
                            @endcan
                        @endforeach
                    </ul>
                </li>
            @endcan
        @endforeach
    </ul>
</aside>
