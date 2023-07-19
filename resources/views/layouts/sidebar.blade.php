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
            {{ request()->is('admin/document-standard*') ? 'active' : '' }} ||
            {{ request()->is('admin/dokumen-standar*') ? 'active' : '' }} ||
            {{ request()->is('admin/p4mp*') ? 'active' : '' }} ||
            ">
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
                    <li class="submenu-item {{ request()->is('admin/auditor*') ? 'active' : '' }}">
                        <a href="{{ route('admin.auditor.index') }}">
                            Auditor
                        </a>
                    </li>
                    <li class="submenu-item {{ request()->is('admin/auditee*') ? 'active' : '' }}">
                        <a href="{{ route('admin.auditee.index') }}">
                            Auditee
                        </a>
                    </li>

                    <li class="submenu-item {{ request()->is('admin/p4mp*') ? 'active' : '' }}">
                        <a href="{{ route('admin.p4mp.index') }}">
                            Tim P4MP
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
                    <li class="submenu-item {{ request()->is('admin/dokumen-standar*') ? 'active' : '' }}">
                        <a href="{{ route('admin.dokumen-standar.index') }}" class="sidebar-link">
                            Dokumen Standar
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
            <li class="sidebar-title">Pelaksanaan ED</li>

            {{-- <li class="sidebar-item 
        {{ request()->is('menu-auditee/instruments-auditee*') ? 'active' : '' }}">
                <a href="{{ route('menu-auditee.instruments-auditee.index') }}" class='sidebar-link'>
                    <i class="bi bi-ui-checks"></i>
                    <span>Evaluasi Diri</span>
                </a>
            </li> --}}

            <li class="sidebar-item 
        {{ request()->is('menu-auditee/evaluasi-diri*') ? 'active' : '' }}">
                <a href="{{ route('menu-auditee.evaluasi-diri.index') }}" class='sidebar-link'>
                    <i class="bi bi-ui-checks"></i>
                    <span>Evaluasi Diri</span>
                </a>
            </li>
        @endrole

        @role('auditor')
            <li class="sidebar-title">Pelaksanaan AMI</li>

            {{-- <li class="sidebar-item 
        {{ request()->is('menu-auditor/index-audit-dokumen*') ? 'active' : '' }}">
                <a href="{{ route('menu-auditor.index-audit-dokumen') }}" class='sidebar-link'>
                    <i class="bi bi-ui-checks"></i>
                    <span>Audit Dokumen</span>
                </a>
            </li>

            <li
                class="sidebar-item 
        {{ request()->is('menu-auditor/index-instrument-auditor*') ? 'active' : '' }}">
                <a href="{{ route('menu-auditor.index-instrument-auditor') }}" class='sidebar-link'>
                    <i class="bi bi-ui-checks"></i>
                    <span>Audit Lapangan</span>
                </a>
            </li> --}}

            <li class="sidebar-item 
        {{ request()->is('menu-auditor/audit-dokumen*') ? 'active' : '' }}">
                <a href="{{ route('menu-auditor.audit-dokumen.index') }}" class='sidebar-link'>
                    <i class="bi bi-ui-checks"></i>
                    <span>Audit Dokumen</span>
                </a>
            </li>

            <li class="sidebar-item 
        {{ request()->is('menu-auditor/audit-lapangan*') ? 'active' : '' }}">
                <a href="{{ route('menu-auditor.audit-lapangan.index') }}" class='sidebar-link'>
                    <i class="bi bi-ui-checks"></i>
                    <span>Audit Lapangan</span>
                </a>
            </li>
        @endrole

        @role('P4MP')
            <li class="sidebar-title">Penetapan</li>
            <li class="sidebar-item 
                {{ request()->is('menu-p4mp/approval-data-ami*') ? 'active' : '' }}">
                <a href="{{ route('menu-p4mp.approval-data-ami') }}" class='sidebar-link'>
                    <i class="bi bi-ui-checks"></i>
                    <span>Konfirmasi Data AMI</span>
                </a>
            </li>

            <li class="sidebar-title">Tinjauan Manajemen</li>
            {{-- <li class="sidebar-item {{ request()->is('menu-p4mp/rapat-tinjauan*') ? 'active' : '' }}">
                <a href="{{ route('menu-p4mp.rapat-tinjauan') }}" class='sidebar-link'>
                    <i class="bi bi-ui-checks"></i>
                    <span>Pengendalian</span>
                </a>
            </li>

            <li class="sidebar-item {{ request()->is('menu-p4mp/peningkatan*') ? 'active' : '' }}">
                <a href="{{ route('menu-p4mp.index-peningkatan') }}" class='sidebar-link'>
                    <i class="bi bi-ui-checks"></i>
                    <span>Peningkatan</span>
                </a>
            </li> --}}
            <li class="sidebar-item {{ request()->is('menu-p4mp/tinjauan-pengendalian*') ? 'active' : '' }}">
                <a href="{{ route('menu-p4mp.index-tinjauan-pengendalian') }}" class='sidebar-link'>
                    <i class="bi bi-ui-checks"></i>
                    <span>Pengendalian</span>
                </a>
            </li>
            <li class="sidebar-item {{ request()->is('menu-p4mp/tinjauan-peningkatan*') ? 'active' : '' }}">
                <a href="{{ route('menu-p4mp.index-tinjauan-peningkatan') }}" class='sidebar-link'>
                    <i class="bi bi-ui-checks"></i>
                    <span>Peningkatan</span>
                </a>
            </li>
            <li class="sidebar-title"> Report</li>

            <li class="sidebar-item {{ request()->is('menu-p4mp/report-ami*') ? 'active' : '' }}">
                <a href="{{ route('menu-p4mp.report-ami') }}" class='sidebar-link'>
                    <i class="bi bi-filetype-doc"></i>
                    <span>Audit Mutu Internal</span>
                </a>
            </li>
            <li class="sidebar-item has-sub">

                <a href="#" class='sidebar-link'>
                    <i class="bi bi-stack"></i>
                    <span>Tinjauan Manajemen</span>
                </a>
                <ul class="submenu">
                    <li class="submenu-item">
                        <a href="">
                            Pengendalian
                        </a>
                    </li>
                    <li class="submenu-item">
                        <a href="">
                            Peningkatan
                        </a>
                    </li>
                </ul>
            </li>

            {{-- <li class="sidebar-item ">
                <a href="{{ route('menu-p4mp.index-pengendalian') }}" class='sidebar-link'>
                    <i class="bi bi-ui-checks"></i>
                    <span>Pengendalian</span>
                </a>
            </li>
            <li class="sidebar-item ">
                <a href="{{ route('menu-p4mp.index-peningkatan-rtm') }}" class='sidebar-link'>
                    <i class="bi bi-ui-checks"></i>
                    <span>Peningkatan</span>
                </a>
            </li> --}}
        @endrole
    </ul>
</div>
