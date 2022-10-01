<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>

    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="fas fa-user-circle fs-3" style="font-size: 20px"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right" style="min-width: 70px">
                <a href="{{ route('dashboard.profile') }}" class="dropdown-item">
                    <div class="media d-flex align-items-center">
                        @if (auth()->user()->image)
                            <img src="{{ asset('storage/' . auth()->user()->image ) }}" class="img-size-50 mr-3 img-circle" alt="User Image">
                        @else
                            <img src="{{ asset('images/default-user.png') }}" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                        @endif
                        <div class="media-body">
                            <h2 class="dropdown-item-title text-center">
                                {{ auth()->user()->name }}
                            </h2>
                        </div>
                    </div>
                </a>
                <div class="dropdown-divider"></div>
                <a href="{{ route('dashboard.logout') }}" class="dropdown-item">
                    <div class="media">
                        <div class="media-body">
                            <h3 class="dropdown-item-title text-center">
                                logout <i class="fas fa-sign-out-alt ml-2"></i>
                            </h3>
                        </div>
                    </div>
                </a>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>
    </ul>
</nav>
