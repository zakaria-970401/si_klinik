@php
    $permission = DB::table('auth_group_permission')
        ->join('auth_permission', 'auth_permission.id', '=', 'auth_group_permission.permission_id')
        ->where('auth_group_permission.group_id', Auth::user()->auth_group)
        ->pluck('auth_permission.name')
        ->toArray();
@endphp

<nav class="navbar navbar-light navbar-vertical navbar-expand-xl no-print" style="display: none;">
    <script>
        var navbarStyle = localStorage.getItem("navbarStyle");
        if (navbarStyle && navbarStyle !== 'transparent') {
            document.querySelector('.navbar-vertical').classList.add(`navbar-${navbarStyle}`);
        }
    </script>
    <div class="d-flex align-items-center">
        <div class="toggle-icon-wrapper">
            <button class="btn navbar-toggler-humburger-icon navbar-vertical-toggle" data-bs-toggle="tooltip"
                data-bs-placement="left" title="Toggle Navigation"><span class="navbar-toggle-icon"><span
                        class="toggle-line"></span></span></button>
        </div>
        <a class="navbar-brand" href="{{ url('/home') }}">
            <div class="d-flex align-items-center"><img class="me-2"
                    src="{{ asset('assets/img/favicons/favicon.png') }}" alt="" width="40" /><span
                    class="font-sans-serif"> SIKLINIK</span>
            </div>
        </a>
    </div>
    <div class="collapse navbar-collapse" id="navbarVerticalCollapse">
        <div class="navbar-vertical-content scrollbar">
            <ul class="navbar-nav flex-column mb-3" id="navbarVerticalNav">
                <li class="nav-item">
                    <a class="nav-link active" href="{{ url('/home') }}" role="button" aria-expanded="false">
                        <div class="d-flex align-items-center"><span class="nav-link-icon"><span
                                    class="fas fa-home"></span></span><span class="nav-link-text ps-1">Dashboard</span>
                        </div>
                    </a>
                    @if (in_array('master_data', $permission))
                        <div class="row navbar-vertical-label-wrapper mt-3 mb-2">
                            <div class="col-auto navbar-vertical-label">Master Data</div>
                            <div class="col ps-0">
                                <hr class="mb-0 navbar-vertical-divider" />
                            </div>
                        </div>
                        <a class="nav-link" href="{{ url('master/user') }}" role="button" data-bs-toggle=""
                            aria-expanded="false">
                            <div class="d-flex align-items-center"><span class="nav-link-icon"><span
                                        class="fas fa-user"></span pan></span><span
                                    class="nav-link-text ps-1">User</span>
                            </div>
                        </a>
                        <a class="nav-link" href="{{ url('master/pegawai') }}" role="button" data-bs-toggle=""
                            aria-expanded="false">
                            <div class="d-flex align-items-center"><span class="nav-link-icon"><span
                                        class="fas fa-users"></span pan></span><span
                                    class="nav-link-text ps-1">Pegawai</span>
                            </div>
                        </a>
                        <a class="nav-link" href="{{ url('master/tindakan') }}" role="button" data-bs-toggle=""
                            aria-expanded="false">
                            <div class="d-flex align-items-center"><span class="nav-link-icon"><span
                                        class="fas fa-list"></span pan></span><span
                                    class="nav-link-text ps-1">Tindakan</span>
                            </div>
                        </a>
                        <a class="nav-link" href="{{ url('master/obat') }}" role="button" data-bs-toggle=""
                            aria-expanded="false">
                            <div class="d-flex align-items-center"><span class="nav-link-icon"><span
                                        class="fas fa-database"></span pan></span><span class="nav-link-text ps-1">
                                    Obat</span>
                            </div>
                        </a>
                        <a class="nav-link" href="{{ url('master/wilayah') }}" role="button" data-bs-toggle=""
                            aria-expanded="false">
                            <div class="d-flex align-items-center"><span class="nav-link-icon"><span
                                        class="fas fa-map-marker"></span></span><span
                                    class="nav-link-text ps-1">Wilayah</span></div>
                        </a>
                        <a class="nav-link" href="{{ url('permission') }}" role="button" data-bs-toggle=""
                            aria-expanded="false">
                            <div class="d-flex align-items-center"><span class="nav-link-icon"><span
                                        class="fas fa-cogs"></span pan></span><span
                                    class="nav-link-text ps-1">Autentikasi
                                </span>
                            </div>
                        </a>
                </li>
                @endif
                @if (in_array('add_pasien', $permission))
                    <div class="row navbar-vertical-label-wrapper mt-3 mb-2">
                        <div class="col-auto navbar-vertical-label">DATA ENTRY</div>
                        <div class="col ps-0">
                            <hr class="mb-0 navbar-vertical-divider" />
                        </div>
                    </div>
                    <a class="nav-link" href="{{ url('pasien') }}" role="button" data-bs-toggle=""
                        aria-expanded="false">
                        <div class="d-flex align-items-center"><span class="nav-link-icon">
                                <span class="fas fa-plus-circle"></span></span>
                            <span class="nav-link-text ps-1 mr-3">ADD PASIEN
                            </span>
                        </div>
                    </a>
                @endif
                </li>
                <li class="nav-item">
                    <div class="row navbar-vertical-label-wrapper mt-3 mb-2">
                        <div class="col-auto navbar-vertical-label">SISTEM</div>
                        <div class="col ps-0">
                            <hr class="mb-0 navbar-vertical-divider" />
                        </div>
                    </div>
                    <a class="nav-link" href="{{ url('pasien/report') }}">
                        <div class="d-flex align-items-center"><span class="nav-link-icon">
                                <span class="fas fa-trophy"></span></span>
                            <span class="nav-link-text ps-1 mr-3">REPORT</span>
                        </div>
                    </a>
                    <a class="nav-link" href="javascript:void(0)" role="button" data-bs-toggle=""
                        aria-expanded="false" onclick="logout()">
                        <div class="d-flex align-items-center"><span class="nav-link-icon">
                                <span class="fas fa-power-off"></span></span>
                            <span class="nav-link-text ps-1 mr-3">Logout</span>
                        </div>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<nav class="navbar navbar-light navbar-glass navbar-top navbar-expand-xl no-print" style="display: none;">
    <button class="btn navbar-toggler-humburger-icon navbar-toggler me-1 me-sm-3" type="button"
        data-bs-toggle="collapse" data-bs-target="#navbarStandard" aria-controls="navbarStandard"
        aria-expanded="false" aria-label="Toggle Navigation"><span class="navbar-toggle-icon"><span
                class="toggle-line"></span></span></button>
</nav>
