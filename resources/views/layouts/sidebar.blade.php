<div class="sidebar-menu">
    <ul class="menu">
        <li class="sidebar-title">Menu</li>

        <li class="sidebar-item {{ request()->is('dashboard') ? 'active' : '' }} ">
            <a href="{{ route('dashboard') }}" class='sidebar-link'>
                <i class="bi bi-grid-fill"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <li
            class="sidebar-item has-sub 
            {{ request()->is('admin/category-unit*') ? 'active' : '' }} || 
            {{ request()->is('admin/instrument*') ? 'active' : '' }} || 
            {{ request()->is('admin/user*') ? 'active' : '' }} ||
            {{ request()->is('admin/auditor*') ? 'active' : '' }} ||
            {{ request()->is('admin/auditee*') ? 'active' : '' }}">
            <a href="#" class='sidebar-link'>
                <i class="bi bi-stack"></i>
                <span>Master Data</span>
            </a>
            <ul class="submenu ">
                <li class="submenu-item {{ request()->is('admin/user*') ? 'active' : '' }}">
                    <a href="{{ route('admin.user.index') }}">User</a>
                </li>
                <li class="submenu-item {{ request()->is('admin/category-unit*') ? 'active' : '' }}">
                    <a href="{{ route('admin.category-unit.index') }}">Unit Kerja</a>
                </li>
                <li class="submenu-item {{ request()->is('admin/instrument*') ? 'active' : '' }}">
                    <a href="{{ route('admin.instrument.index') }}" class="sidebar-link">
                        Instrument
                    </a>
                </li>
            </ul>
        </li>

        <li class="sidebar-item 
        {{ request()->is('admin/data-instruments*') ? 'active' : '' }}">
            <a href="{{ route('admin.data-instruments.index') }}" class='sidebar-link'>
                <i class="bi bi-ui-checks"></i>
                <span>Data Instrument</span>
            </a>
        </li>

        <li class="sidebar-item 
        {{ request()->is('admin/instruments-auditee*') ? 'active' : '' }}">
            <a href="{{ route('admin.instruments-auditee.index') }}" class='sidebar-link'>
                <i class="bi bi-ui-checks"></i>
                <span>Instrument Auditee</span>
            </a>
        </li>
    </ul>
</div>
