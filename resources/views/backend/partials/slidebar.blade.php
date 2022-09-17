<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('backend.dashboard') }}">ADMIN</a>
        </div>
        <ul class="sidebar-menu">
            <li class="dropdown {{ Request::is('admin/dashboard') ? 'active' : '' }}">
                <a href="{{ route('backend.dashboard') }}" class="nav-link"><i class="fas fa-fire"></i><span>Bảng Điều
                        Khiển</span></a>
            </li>

            <li class="dropdown {{ Request::is('admin/menu*') ? 'active' : '' }}">
                <a href="{{ route('menu.index') }}" class="nav-link"><i class="fas fa-th-large"></i><span>Danh Sách
                        Menu</span></a>
            </li>

            <li
                class="dropdown {{ Request::is('admin/product-category*') || Request::is('admin/post-category*') ? 'active' : '' }}">
                <a class="nav-link has-dropdown" href="#"><i class="fas fa-columns"></i> <span>Danh Mục</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('admin/product-category*') ? 'active' : '' }}"><a class="nav-link"
                            href="{{ route('category.product.index') }}">Danh Mục Sản Phẩm</a></li>
                    <li class="{{ Request::is('admin/post-category*') ? 'active' : '' }}"><a class="nav-link"
                            href="{{ route('category.post.index') }}">Danh Mục Bài Viết</a></li>
                </ul>
            </li>

            <li
                class="dropdown {{ Request::is('admin/post-tags*') || Request::is('admin/product-tags*') ? 'active' : '' }}">
                <a class="nav-link has-dropdown" href="#"><i class="fa-solid fa-tags"></i> <span>Tags</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('admin/post-tags*') ? 'active' : '' }}"><a class="nav-link"
                            href="{{ route('tags.post.index') }}">Tags Bài Viết</a></li>
                    <li class="{{ Request::is('admin/product-tags*') ? 'active' : '' }}"><a class="nav-link"
                            href="{{ route('tags.product.index') }}">Tags Sản Phẩm</a></li>
                </ul>
            </li>
            <li class="dropdown {{ Request::is('admin/slider*') ? 'active' : '' }}">
                <a href="{{ route('slider.index') }}" class="nav-link"><i
                        class="fas fa-image"></i><span>Slider</span></a>
            </li>
            <li class="dropdown {{ Request::is('admin/posts*') ? 'active' : '' }}">
                <a href="{{ route('post.index') }}" class="nav-link"><i class="fas fa-sticky-note"></i><span>Danh Sách
                        Bài viết</span></a>
            </li>

            <li class="dropdown {{ Request::is('admin/products*') ? 'active' : '' }}">
                <a href="{{ route('products.index') }}" class="nav-link"><i class="far fa-square"></i><span>Danh
                        sách sản phẩm</span></a>
            </li>

            <li class="dropdown {{ Request::is('admin/gallery*') ? 'active' : '' }}">
                <a href="{{ route('gallery.index') }}" class="nav-link"><i class="fas fa-image"></i><span>Danh sách
                        hình ảnh</span></a>
            </li>
        </ul>
    </aside>
</div>
