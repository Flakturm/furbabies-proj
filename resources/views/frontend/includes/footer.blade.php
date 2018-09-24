<footer>
    <div class="container">
        <div class="row py-4 py-sm-5">
            <div class="col-sm-3 col-12 d-none d-sm-block">
                <h2 class="logo"><a href="#"> LOGO </a></h2>
            </div>
            <div class="col-sm-2 mb-2">
                <h5 class="mt-2">@lang('navs.frontend.mainPages')</h5>
                <ul>
                    <li><a href="{{ url('/') }}">@lang('navs.general.home')</a></li>
                    {{-- <li><a href="{{ route('register') }}">@lang('navs.frontend.register')</a></li> --}}
                </ul>
            </div>
            <div class="col-sm-2 mb-2">
                <h5 class="mt-2">@lang('navs.frontend.aboutUs')</h5>
                <ul>
                    <li><a href="#">@lang('navs.frontend.who')</a></li>
                    <li><a href="#">@lang('navs.frontend.contact')</a></li>
                </ul>
            </div>
            <div class="col-sm-2 mb-2">
                <h5 class="mt-2">@lang('navs.frontend.links')</h5>
                <ul>
                    {{-- <li><a href="{{ route('shelters') }}">@lang('navs.frontend.shelters')</a></li> --}}
                    <li><a href="http://animal.coa.gov.tw/html/index_07.aspx" target="_blank">@lang('navs.frontend.petShops')</a></li>
                </ul>
            </div>
            <div class="col-sm-3 col-12 text-center">
                <div class="social-networks mb-4 mb-sm-3">
                    <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
                    <a href="#" class="google"><i class="fa fa-google-plus"></i></a>
                    <a href="#" class="github"><i class="fa fa-github"></i></a>
                </div>
                <div class="row justify-content-center">
                    <div class="col-6">
                        <a href="#" class="btn btn-default btn-block">@lang('navs.frontend.contact')</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-copyright py-2">
        <p>© {{ \Carbon\Carbon::now()->year }} All rights reserved to {{ app_name() }} </p>
    </div>
</footer>
<a id="back-to-top" href="#" class="back-to-top text-center" role="button"><i class="fa fa-arrow-up mt-1" aria-hidden="true"></i></a>
{{-- {{ makeJS('frontend/js/app.js') }} --}}
@stack('js_scripts')
