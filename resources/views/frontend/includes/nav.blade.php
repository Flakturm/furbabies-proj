<nav class="navbar navbar-expand-lg navbar-light">
    <a class="navbar-brand" href="{{ url('/') }}">{{ app_name() }}</a>

    <div class="collapse navbar-collapse" id="frontend-navbar-collapse">
        <ul class="nav ml-auto">
            <li class="nav-item my-auto">
                <a class="nav-link" href="{{ url('/') }}">{{ __('navs.general.home') }}</a>
            </li>
            @guest
            <li class="nav-item my-auto">
                <a class="nav-link" href="{{ route('login') }}">{{ __('navs.frontend.login') }}</a>
            </li>
            <li class="nav-item my-auto">
                <a class="nav-link" href="{{ route('register') }}">{{ __('navs.frontend.register') }}</a>
            </li>
            @else
            <li class="nav-item navbar-nav dropdown my-auto">
                <a class="nav-link dropdown-toggle" href="" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{ HTML::image( Auth::user()->avatar, Auth::user()->name, [ 'class' => 'rounded', 'width' => 40, 'height' => 40 ] ) }}
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="#">{{ __('navs.general.favourites') }}</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                      onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
                      {{ __('navs.general.logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      {{ csrf_field() }}
                    </form>
                </div>
            </li>
            @endguest
            <li class="nav-item navbar-nav dropdown my-auto">
                <a class="nav-link dropdown-toggle" href="" id="navbarDropdownSettingLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-cog fa-2x fa-fw" aria-hidden="true"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownSettingLink">
                    <h6 class="dropdown-header">{{ __('menus.language-picker.language') }}</h6>
                    <a class="dropdown-item" href="#">{{ __('menus.language-picker.langs.zh-TW') }}</a>
                    <a class="dropdown-item" href="#">{{ __('menus.language-picker.langs.en') }}</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                      onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
                      {{ __('navs.general.logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      {{ csrf_field() }}
                    </form>
                </div>
            </li>
        </ul>
        <div>
    </div>

    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#frontend-navbar-collapse" aria-controls="frontend-navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
</nav>
