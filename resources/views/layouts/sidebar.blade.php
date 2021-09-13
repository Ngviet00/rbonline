<div class="app-sidebar sidebar-shadow">
    <div class="app-header__logo">
        <div class="logo-src"></div>
        <div class="header__pane ml-auto">
            <div>
                <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
            </div>
        </div>
    </div>
    <div class="app-header__mobile-menu">
        <div>
            <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </button>
        </div>
    </div>
    <div class="app-header__menu">
        <span>
            <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                <span class="btn-icon-wrapper">
                    <i class="fa fa-ellipsis-v fa-w-6"></i>
                </span>
            </button>
        </span>
    </div>
    <div class="scrollbar-sidebar">
        <div class="app-sidebar__inner">
            <ul class="vertical-nav-menu">
                <li class="app-sidebar__heading">Dashboards</li>
                <li>
                    <a href="{{route('home')}}" class="mm-active">
                        <i class="metismenu-icon pe-7s-rocket"></i>
                        Dashboard
                    </a>
                </li>
                <li class="">
                    <a href="#" aria-expanded="false">
                        <i class="metismenu-icon pe-7s-diamond"></i>
                        Danh mục
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul class="mm-collapse" style="height: 7.04px;">
                        <li>
                            <a href="{{ route('category.create') }}">Thêm danh mục</a>
                        </li>
                        <li>
                            <a href="{{ route('category.index') }}">Liệt kê danh mục</a>
                        </li>
                    </ul>
                </li>
                <li class="">
                    <a href="#" aria-expanded="false">
                        <i class="metismenu-icon pe-7s-car"></i>
                        Sách
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul class="mm-collapse" style="height: 7.04px;">
                        <li>
                            <a href="{{ route('book.create') }}">Thêm sách</a>
                        </li>
                        <li>
                            <a href="{{ route('book.index') }}">Liệt kê sách</a>
                        </li>
                    </ul>
                </li>
                <li class="">
                    <a href="#" aria-expanded="false">
                        <i class="metismenu-icon pe-7s-car"></i>
                        Thành viên
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul class="mm-collapse" style="height: 7.04px;">
                        <li>
                            <a href="#">Thêm thành viên</a>
                        </li>
                        <li>
                            <a href="#">Danh sách thành viên</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="{{ route('listChappers') }}">
                        <i class="metismenu-icon pe-7s-display2"></i>
                        Danh sách chương
                    </a>
                </li>
                <li>
                    <a href="{{ route('rules') }}">
                        <i class="metismenu-icon pe-7s-mouse">
                        </i>Chỉnh sửa điều khoản
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
