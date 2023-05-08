<div class="sidebar-menu">
    <ul class="menu">
        <li class="sidebar-title">Menu</li>

        <li class="sidebar-item {{ request()->is('dashboard') ? 'active' : '' }} ">
            <a href="{{ route('dashboard') }}" class='sidebar-link'>
                <i class="bi bi-grid-fill"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <li class="sidebar-item has-sub {{ request()->is('admin/category-unit*') ? 'active' : '' }}">
            <a href="#" class='sidebar-link'>
                <i class="bi bi-stack"></i>
                <span>Master Data</span>
            </a>
            <ul class="submenu ">
                <li class="submenu-item ">
                    <a href="component-alert.html">Auditee</a>
                </li>
                <li class="submenu-item ">
                    <a href="component-badge.html">Auditor</a>
                </li>
                <li class="submenu-item {{ request()->is('admin/category-unit*') ? 'active' : '' }}">
                    <a href="{{ route('admin.category-unit.index') }}">Unit Kerja</a>
                </li>
            </ul>
        </li>

        <li class="sidebar-item {{ request()->is('admin/instrument*') ? 'active' : '' }} ">
            <a href="{{ route('admin.instrument.index') }}" class='sidebar-link'>
                <i class="bi bi-ui-checks"></i>
                <span>Instrument</span>
            </a>
        </li>

        <li class="sidebar-item  has-sub">
            <a href="#" class='sidebar-link'>
                <i class="bi bi-collection-fill"></i>
                <span>Extra Components</span>
            </a>
            <ul class="submenu ">
                <li class="submenu-item ">
                    <a href="extra-component-avatar.html">Avatar</a>
                </li>
                <li class="submenu-item ">
                    <a href="extra-component-sweetalert.html">Sweet Alert</a>
                </li>
                <li class="submenu-item ">
                    <a href="extra-component-toastify.html">Toastify</a>
                </li>
                <li class="submenu-item ">
                    <a href="extra-component-rating.html">Rating</a>
                </li>
                <li class="submenu-item ">
                    <a href="extra-component-divider.html">Divider</a>
                </li>
            </ul>
        </li>

        <li class="sidebar-item  has-sub">
            <a href="#" class='sidebar-link'>
                <i class="bi bi-grid-1x2-fill"></i>
                <span>Layouts</span>
            </a>
            <ul class="submenu ">
                <li class="submenu-item ">
                    <a href="layout-default.html">Default Layout</a>
                </li>
                <li class="submenu-item ">
                    <a href="layout-vertical-1-column.html">1 Column</a>
                </li>
                <li class="submenu-item ">
                    <a href="layout-vertical-navbar.html">Vertical Navbar</a>
                </li>
                <li class="submenu-item ">
                    <a href="layout-rtl.html">RTL Layout</a>
                </li>
                <li class="submenu-item ">
                    <a href="layout-horizontal.html">Horizontal Menu</a>
                </li>
            </ul>
        </li>
    </ul>
</div>