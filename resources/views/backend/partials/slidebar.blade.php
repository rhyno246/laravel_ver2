<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('backend.dashboard') }}">ADMIN</a>
        </div>
        <ul class="sidebar-menu">
            <li>
                <a href="{{ route('backend.dashboard') }}" class="nav-link"><i class="fas fa-fire"></i><span>Bảng Điều
                        Khiển</span></a>
            </li>

            <li>
                <a href="{{ route('menu.index') }}" class="nav-link"><i class="fas fa-th-large"></i><span>Danh Sách
                        Menu</span></a>
            </li>

            <li class="dropdown">
                <a class="nav-link has-dropdown" href="#"><i class="fas fa-columns"></i> <span>Danh Mục</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('category.product.index') }}">Danh Mục Sản Phẩm</a></li>
                    <li><a class="nav-link" href="index.html">Danh Mục Bài Viết</a></li>
                </ul>
            </li>
        </ul>
    </aside>
</div>
