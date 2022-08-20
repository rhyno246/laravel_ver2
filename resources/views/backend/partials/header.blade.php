<div class="navbar-bg"></div>
  <nav class="navbar navbar-expand-lg main-navbar">
    <form class="form-inline mr-auto">
      <ul class="navbar-nav mr-3">
        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
        <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
      </ul>
      <div class="search-element">
        <input class="form-control" type="search" placeholder="Tìm kiếm ....." aria-label="Search" data-width="250">
        <button class="btn" type="submit"><i class="fas fa-search"></i></button>
      </div>
    </form>
    <ul class="navbar-nav navbar-right">
      <li class="dropdown">
        <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
          <img alt="image" src="{{ asset('backend/assets/img/avatar/avatar-1.png') }}" class="rounded-circle mr-1">
          <div class="d-sm-none d-lg-inline-block">
            @if (Session::get('name'))
                {{ Session::get('name') }}
            @endif
          </div>
        </a>
        <div class="dropdown-menu dropdown-menu-right">
          <a href="features-profile.html" class="dropdown-item has-icon">
            <i class="far fa-user"></i> Trang cá nhân
          </a>
          <a href="{{ route('settings.index') }}" class="dropdown-item has-icon">
            <i class="fas fa-cog"></i> Cài đặt
          </a>
          <a href="{{ route('permissions.create') }}" class="dropdown-item has-icon">
            <i class="fas fa-key"></i> Cấp quyền
          </a>
          <a href="{{ route('role.index') }}" class="dropdown-item has-icon">
            <i class="fas fa-lock"></i> Vai trò
          </a>
          <div class="dropdown-divider"></div>
          <a href="{{ route('admin.logout') }}" class="dropdown-item has-icon text-danger">
            <i class="fas fa-sign-out-alt"></i> Thoát
          </a>
        </div>
      </li>
    </ul>
  </nav>