<header>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-white bg-white p-0">
            <a class="navbar-brand" href="/">BookBub</a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav m-auto">
                    <li class="nav-item dropdown">
                        <a class="title_dark nav-link dropdown-toggle text-dark" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Thể loại
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            @foreach($list_categories as $value)
                                <a class="dropdown-item" href="{{route('categoryBySlug',[$value->slug])}}">
                                    {{$value->name}}
                                </a>
                            @endforeach
                        </div>
                    </li>
                    <li class="nav-item active mr-1">
                        <a class="title_dark nav-link text-dark" href="{{ route('filter') }}">Lọc sách</a>
                    </li>
{{--                    <li class="nav-item active mr-1">--}}
{{--                        <div class="cbDarkMode">--}}
{{--                            <label class="switch" for="checkbox" title="Change color scheme to dark mode">--}}
{{--                                <input type="checkbox" id="checkbox" />--}}
{{--                                <div class="slider round"></div>--}}
{{--                                <div class="toggle-moon">🌙</div>--}}
{{--                                <div class="toggle-sun">☀️</div>--}}
{{--                            </label>--}}
{{--                        </div>--}}
{{--                    </li>--}}
                </ul>
                <form action="{{url('search')}}" class="form-inline my-2 my-lg-0" method="get">
                    <input class="form-control mr-sm-1" required type="search" name="q" placeholder="Tìm kiếm">
                    <button class="btn btn-primary my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
        </nav>
    </div>
</header>
