<footer>
    <div class="container">
        <div class="row mb-5">
            <div class="col-sm-3">
                <h2 class="logo"><a href="#"> LOGO </a></h2>
            </div>
            <div class="col-sm-2">
                <h5>@lang('navs.frontend.mainPages')</h5>
                <ul>
                    <li><a href="#">@lang('navs.general.home')</a></li>
                    <li><a href="#">@lang('navs.frontend.register')</a></li>
                </ul>
            </div>
            <div class="col-sm-2">
                <h5>@lang('navs.frontend.aboutUs')</h5>
                <ul>
                    <li><a href="#">@lang('navs.frontend.who')</a></li>
                    <li><a href="#">@lang('navs.frontend.contact')</a></li>
                </ul>
            </div>
            <div class="col-sm-2">
                <h5>@lang('navs.frontend.links')</h5>
                <ul>
                    <li><a href="{{ route('shelters') }}">@lang('navs.frontend.shelters')</a></li>
                    <li><a href="http://animal.coa.gov.tw/html/index_07.aspx" target="_blank">@lang('navs.frontend.petShops')</a></li>
                </ul>
            </div>
            <div class="col-sm-3">
                <div class="social-networks">
                    <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
                    <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
                    <a href="#" class="google"><i class="fa fa-google-plus"></i></a>
                </div>
                <div class="row justify-content-center">
                    <div class="col-6 text-center">
                        <a href="#" class="btn btn-default">@lang('navs.frontend.contact')</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-copyright">
        <p>© {{ \Carbon\Carbon::now()->year }} All rights reserved to {{ app_name() }} </p>
    </div>
</footer>

{{ Html::script(mix('frontend/js/app.js')) }}
