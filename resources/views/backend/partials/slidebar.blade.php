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
                    <li><a class="nav-link" href="{{ route('category.post.index') }}">Danh Mục Bài Viết</a></li>
                </ul>
            </li>

            <li class="dropdown">
                <a class="nav-link has-dropdown" href="#"><i class="fa-solid fa-tags"></i> <span>Tags</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('category.product.index') }}">Tags Sản Phẩm</a></li>
                    <li><a class="nav-link" href="{{ route('category.post.index') }}">Tags Bài Viết</a></li>
                </ul>
            </li>
            <li>
                <a href="{{ route('post.index') }}" class="nav-link"><i class="fas fa-sticky-note"></i><span>Danh Sách
                        Bài viết</span></a>
            </li>
        </ul>
    </aside>
</div>
