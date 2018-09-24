<nav class="navbar navbar-expand-sm navbar-dark my-nav sticky-top my-border border-right-0 border-left-0 border-top-0">
    <div class="container">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#nav-content" aria-controls="nav-content" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        {{-- <a class="navbar-brand" href="{{ url('/') }}">{{ app_name() }}</a> --}}

        <div class="collapse navbar-collapse" id="nav-content">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a href="{{ url('/') }}" class="nav-link {{ isActiveRoute('index') }}"><i class="fa fa-home fa-lg" aria-hidden="true"></i></a>
                </li>
                <li class="nav-item {{ isActiveRoute('all.shelter.animal') }}">
                    {{ Html::link(route('all.shelter.animal'), __('navs.frontend.shelterPets'), ['class' => 'nav-link']) }}
                </li>
                <li class="nav-item">
                    {{ Html::link('about-us', __('navs.frontend.contact'), ['class' => 'nav-link']) }}
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                {{-- @guest
                <li class="nav-item my-auto">
                    <a class="nav-link" href="{{ route('login') }}">@lang('navs.frontend.login')/@lang('navs.frontend.register')</a>
                </li>
                @else
                <li class="nav-item navbar-nav dropdown my-auto">
                    <a class="nav-link dropdown-toggle" href="" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        @if ( Auth::user()->avatar )
                            {{ Html::image( Auth::user()->avatar, Auth::user()->name, [ 'class' => 'rounded mr-1' ] ) }}
                        @else
                            <i class="fa fa-user-circle fa-2x" aria-hidden="true"></i>
                        @endif
                        {{ Auth::user()->name }}
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="#">@lang('navs.general.favourites')</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                          onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();">
                          @lang('navs.general.logout')
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                          {{ csrf_field() }}
                        </form>
                    </div>
                </li>
                @endguest --}}
                <li class="nav-item navbar-nav dropdown my-auto">
                    <a class="nav-link dropdown-toggle" href="" id="navbarDropdownSettingLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        @lang('menus.language-picker.language')
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownSettingLink">
                        @foreach (Config::get('languages') as $lang => $language)
                        <a class="dropdown-item{{ $lang == App::getLocale() ? " disabled" : ""}}" href="{{ $lang != App::getLocale() ? route('lang.switch', $lang) : "#"}}">@lang('menus.language-picker.langs.' . $lang)</a>
                        @endforeach
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
