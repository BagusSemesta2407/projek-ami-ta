<div class="sidebar-menu">
    <ul class="menu">
        <li class="sidebar-title">Menu</li>

        <li class="sidebar-item {{ request()->is('dashboard') ? 'active' : '' }} ">
            <a href="{{ route('dashboard') }}" class='sidebar-link'>
                <i class="bi bi-grid-fill"></i>
                <span>Dashboard</span>
            </a>
        </li>
        @role('admin')
            <li class="sidebar-title">Penetapan</li>
            <li
                class="sidebar-item has-sub 
            {{ request()->is('admin/category-unit*') ? 'active' : '' }} || 
            {{ request()->is('admin/instrument*') ? 'active' : '' }} || 
            {{ request()->is('admin/user*') ? 'active' : '' }} ||
            {{ request()->is('admin/auditor*') ? 'active' : '' }} ||
            {{ request()->is('admin/auditee*') ? 'active' : '' }} ||
            {{ request()->is('admin/document-standard*') ? 'active' : '' }}">
                <a href="#" class='sidebar-link'>
                    <i class="bi bi-stack"></i>
                    <span>Master Data</span>
                </a>
                <ul class="submenu ">
                    <li class="submenu-item {{ request()->is('admin/user*') ? 'active' : '' }}">
                        <a href="{{ route('admin.user.index') }}">
                            User
                        </a>
                    </li>
                    <li class="submenu-item {{ request()->is('admin/category-unit*') ? 'active' : '' }}">
                        <a href="{{ route('admin.category-unit.index') }}">
                            Unit/ ProgramStudi/ Jurusan
                        </a>
                    </li>
                    <li class="submenu-item {{ request()->is('admin/instrument*') ? 'active' : '' }}">
                        <a href="{{ route('admin.instrument.index') }}" class="sidebar-link">
                            Instrument
                        </a>
                    </li>
                    <li class="submenu-item {{ request()->is('admin/document-standard*') ? 'active' : '' }}">
                        <a href="{{ route('admin.document-standard.index') }}" class="sidebar-link">
                            Document Standard
                        </a>
                    </li>
                </ul>
            </li>

            <li class="sidebar-item 
        {{ request()->is('admin/data-instruments*') ? 'active' : '' }}">
                <a href="{{ route('admin.data-instruments.index') }}" class='sidebar-link'>
                    <i class="bi bi-ui-checks"></i>
                    <span>Data Penetapan AMI</span>
                </a>
            </li>
        @endrole

        @role('auditee')
            <li class="sidebar-item 
        {{ request()->is('menu-auditee/instruments-auditee*') ? 'active' : '' }}">
                <a href="{{ route('menu-auditee.instruments-auditee.index') }}" class='sidebar-link'>
                    <i class="bi bi-ui-checks"></i>
                    <span>Instrument Auditee</span>
                </a>
            </li>
        @endrole

        @role('auditor')
            <li
                class="sidebar-item 
        {{ request()->is('menu-auditor/index-instrument-auditor*') ? 'active' : '' }}">
                <a href="{{ route('menu-auditor.index-instrument-auditor') }}" class='sidebar-link'>
                    <i class="bi bi-ui-checks"></i>
                    <span>Validasi</span>
                </a>
            </li>
        @endrole

        @role('kepala_p4mp')
        <li class="sidebar-title">Penetapan</li>

            <li
                class="sidebar-item 
        {{ request()->is('menu-kepala-p4mp/approval-data-ami*') ? 'active' : '' }}">
                <a href="{{ route('menu-kepala-p4mp.approval-data-ami') }}" class='sidebar-link'>
                    <i class="bi bi-ui-checks"></i>
                    <span>Konfirmasi Data AMI</span>
                </a>
            </li>
        @endrole
    </ul>
</div>
