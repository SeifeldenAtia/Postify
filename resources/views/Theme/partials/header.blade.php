@php
    use App\Models\Category;
    $categories = Category::get();
@endphp

<!--================Header Menu Area =================-->
<header class="header_area">
    <div class="main_menu">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container box_1620">
                <!-- Brand and toggle get grouped for better mobile display -->
                <a class="navbar-brand logo_h" href="{{ route('theme.index') }}"><img
                        src="{{ asset('assets') }}/img/logo.png" alt="logo" width="120px"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                    <ul class="nav navbar-nav menu_nav justify-content-center">
                        <li class="nav-item @yield('home-avtive')"><a class="nav-link"
                                href="{{ route('theme.index') }}">Home</a>
                        </li>
                        <li class="nav-item submenu dropdown @yield('category-avtive')">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button"
                                aria-haspopup="true" aria-expanded="false">Categories</a>
                            <ul class="dropdown-menu">
                                @if (count($categories) > 0)
                                    @foreach ($categories as $category)
                                        <li class="nav-item"><a class="nav-link"
                                                href="{{ route('theme.catogory', ['id' => $category->id]) }}">{{ $category->name }}</a>
                                        </li>
                                    @endforeach
                                @else
                                    <span>No Categories available</span>

                                @endif

                            </ul>
                        </li>
                        <li class="nav-item @yield('contact-avtive')"><a class="nav-link"
                                href="{{ route('theme.contact') }}">Contact</a></li>
                    </ul>

                    @auth
                        <!-- Add new blog -->
                        <a href="{{ route('blogs.create') }}" class="btn btn-sm btn-primary mr-2">Add New</a>
                        <!-- End - Add new blog -->
                        <ul class="nav navbar-nav navbar-right navbar-social">
                            <li class="nav-item submenu dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button"
                                    aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }}</a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item"><a class="nav-link" href="{{ route('blogs.index') }}">My Blogs</a>
                                    </li>
                                    <li class="nav-item">
                                        <form id="logout-form" action="{{ route('logout') }}" method="post">
                                            @csrf
                                            <a class="nav-link" href="#"
                                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                                        </form>

                                    </li>
                                </ul>
                            </li>
                        @endauth
                        @guest
                            <a href="{{ route('register') }}" class="btn btn-sm btn-warning">Register / Login</a>
                        @endguest

                    </ul>
                </div>
            </div>
        </nav>
    </div>
</header>
