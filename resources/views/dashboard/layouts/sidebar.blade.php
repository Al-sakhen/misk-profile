<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('dashboard.index') }}" class="brand-link d-flex flex-column align-items-center" style="height:140px">
        <img src="{{ asset('images/logo.png') }}" alt="AdminLTE Logo" class="img-circle" style="width: 130px; height: 130px">
    </a>

    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('dashboard.index') }}" @class(['nav-link', 'active' => $active_button == 'home'])>
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Home
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('dashboard.news.index') }}" @class(['nav-link', 'active' => $active_button == 'news'])>
                        <i class="nav-icon  far fa-newspaper"></i>
                        <p>
                            News
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('dashboard.team-members.index') }}" @class(['nav-link', 'active' => $active_button == 'team'])>
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Our Team
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
