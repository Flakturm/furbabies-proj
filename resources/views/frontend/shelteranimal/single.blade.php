@extends('frontend.layouts.master')

@push('js_scripts')
    <script src="//maps.google.com/maps/api/js?key=AIzaSyCaxXMj_bujGTv2PQIQBObyX1-VPbPg4Pk" async defer></script>
    <script>
        $(function(){
            @if ( $animal->shelter->address )
            makeMap('{{ $animal->shelter->address }}');
            @endif
        });
    </script>
@endpush

@section('content')
<section class="container">
    <div class="row my-4">
        <div class="col">
            <a href="{{ url()->previous() }}">
                <i class="fa fa-angle-double-left" aria-hidden="true"></i> @lang('navs.frontend.previous')
            </a>
        </div>
    </div>
    <div class="row mb-5">
        <section class="col col-sm-12 col-md-8 mb-sm-5 mb-md-0">
            @if ( $animal )
            <div class="row">
                <picture class="col-12 col-sm-6 mb-3">
                    <a href="{{ $animal->album_file }}" data-toggle="lightbox">
                        {{ Html::image($animal->album_file, $animal->animal_id, ['class' => 'rounded img-fluid img-thumbnail mx-auto d-block', 'style' => 'max-height:300px']) }}
                    </a>
                </picture>
                <article class="col-12 col-sm-6">
                    <div class="row">
                        <div class="col">
                            <p class="h3">
                                <span class="badge badge-{{ $animal->badge_status }}">@lang('page.frontend.animal.status.' . $animal->status )</span>
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <p class="h4">
                                @lang('page.frontend.animal.id'): {{ $animal->subid }}
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <p>
                                {{ __('page.frontend.animal.createtime') }}:
                                {{ $animal->createtime }}
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-1">
                            <i class="fa fa-paw fa-lg ml-1" aria-hidden="true"></i>
                        </div>
                        <div class="col">
                            <p>
                                @choice('page.frontend.animal.' . $animal->kind, 1 )
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-1">
                            <i class="fa fa-venus-mars fa-lg ml-1" aria-hidden="true"></i>
                        </div>
                        <div class="col">
                            <p>
                                @choice('page.frontend.animal.' . $animal->sex, 1 ),
                                @if ( $animal->age )
                                    @lang('page.frontend.animal.' . $animal->age)
                                @else
                                    @lang('page.frontend.animal.unknown')
                                @endif
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-1">
                            <i class="fa fa-arrows-v fa-lg ml-1" aria-hidden="true"></i>
                        </div>
                        <div class="col">
                            <p>
                                @lang('page.frontend.animal.' . $animal->bodytype )
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-1">
                            <i class="fa fa-paint-brush fa-lg ml-1" aria-hidden="true"></i>
                        </div>
                        <div class="col">
                            <p>
                                @if ($animal->colour)
                                    {{ $animal->colour }}
                                @else
                                    @lang('page.general.unknown')
                                @endif
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-1">
                            <i class="fa fa-stethoscope fa-lg ml-1" aria-hidden="true"></i>
                        </div>
                        <div class="col">
                            <p class="mb-1">
                                <span class="badge badge-secondary">@lang('labels.frontend.form.sterilisation')</span> <span class="badge badge-success">@lang('labels.frontend.form.' . $animal->sterilisation )</span>
                            </p>
                            <p>
                                <span class="badge badge-secondary">@lang('labels.frontend.form.bacterin')</span> <span class="badge badge-success">@lang('labels.frontend.form.' . $animal->sterilisation )</span>
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-1">
                            <i class="fa fa-map-marker fa-lg ml-1" aria-hidden="true"></i>
                        </div>
                        <div class="col">
                            <p>
                                {{ Html::link(route('search.shelter.animal', ['area_id' => $animal->shelter->area->id]), $animal->shelter->area->name) }},
                                {{ Html::link(route('shelter.by.animal', ['name' => $animal->shelter->name, 'area_id' => $animal->shelter->area->id, 'shelter_id' => $animal->shelter->id]), $animal->shelter->name) }}
                            </p>
                        </div>
                    </div>
                    @if ( $animal->foundplace )
                    <div class="row">
                        <div class="col-1">
                            <i class="fa fa-street-view fa-lg ml-1" aria-hidden="true"></i>
                        </div>
                        <div class="col">
                            <p>
                                {!! __('page.frontend.animal.foundplace', ['location' => $animal->foundplace]) !!}
                            </p>
                        </div>
                    </div>
                    @endif
                </article>
            </div>
            @if ( $animal->remark )
            <div class="row">
                <article class="col-12 mt-4">
                    <p>{{ $animal->remark }}</p>
                </article>
            </div>
            @endif
            @if ( $animal->caption )
            <div class="row">
                <article class="col-12 mt-4">
                    <p>{{ $animal->caption }}</p>
                </article>
            </div>
            @endif
            <div class="row">
                <article class="col-12 pt-4 pb-3 my-grey-border border-right-0 border-bottom-0 border-left-0">
                    <h4 itemprop="name">{{ $animal->shelter->name }}</h4>
                    @if ( $animal->shelter->telephone )
                        <div class="row pl-3">
                            <div class="col-l">
                                <i class="fa fa-phone" aria-hidden="true"></i>
                            </div>
                            <div class="col" itemprop="telephone">
                                {{ Html::link('tel:' . $animal->shelter->telephone, $animal->shelter->telephone) }}
                                {{-- {{ $animal->shelter->telephone }} --}}
                            </div>
                        </div>
                    @endif
                    @if ( $animal->shelter->email )
                        <div class="row pl-3">
                            <div class="col-l">
                                <i class="fa fa-envelope" aria-hidden="true"></i>
                            </div>
                            <div class="col">
                                {{ $animal->shelter->email }}
                            </div>
                        </div>
                    @endif
                    @if ( $animal->shelter->address )
                        <div class="row pl-3">
                            <div class="col-l">
                                <i class="fa fa-map-marker" aria-hidden="true"></i>
                            </div>
                            <div class="col">
                                {{ $animal->shelter->address }}
                            </div>
                        </div>
                    @endif
                </article>
            </div>
            @if ( $animal->shelter->remark )
            <div class="row">
                <article class="col-12">
                        <p>{!! $animal->shelter->remark !!}</p>
                </article>
            </div>
            @endif
            @if ( $animal->shelter->address )
                <div class="row">
                    <article class="col-12" id="map">
                    </article>
                    {{-- <div id="map"></div> --}}
                </div>
            @endif
        @else
            <div class="row">
                <p>@choice('page.frontend.results.notfound', 1)</p>
            </div>
        @endif
        </section>
        <aside class="col-sm-12 col-md-4 d-none d-sm-block">
            @foreach ( $rand_animals as $key => $animal )
            <a href="{{ route('shelter.animal', ['id' => $animal->id]) }}">
                <div class="row box-shadow ml-md-2 @if ( $key % 2 )my-4 @endif">
                    <div class="col-6 px-0">
                        {{ makeImg($animal->thumb_file, $animal->subid, ['data-id' => $animal->id, 'onerror' => "this.onerror=null;this.src='" . makeImg('images/nophoto.jpg') . "';" ]) }}
                    </div>
                    <div class="col-6 pt-2">
                        <div class="row">
                            <div class="col-1">
                                <i class="fa fa-map-marker ml-1" aria-hidden="true"></i>
                            </div>
                            <div class="col">
                                <p class="text-muted my-1">
                                    {{ $animal->shelter->area->name }}
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-1">
                                <i class="fa fa-paint-brush" aria-hidden="true"></i>
                            </div>
                            <div class="col">
                                <p class="text-muted mb-1">
                                    @if ( $animal->colour )
                                        {{ $animal->colour }}
                                    @else
                                        @lang('page.general.unknown')
                                    @endif
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-1">
                                <i class="fa fa-paw" aria-hidden="true"></i>
                            </div>
                            <div class="col">
                                <p class="text-muted mb-1">
                                    @if ( $animal->age )
                                        @lang('page.frontend.animal.' . $animal->age)
                                    @else
                                        @lang('page.frontend.animal.unknown')
                                    @endif
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-1">
                                <i class="fa fa-venus-mars mr-1" aria-hidden="true"></i>
                            </div>
                            <div class="col">
                                <p class="text-muted mb-1">
                                    @if ( $animal->sex == 'f' OR $animal->sex == 'm' )
                                        @choice('page.frontend.animal.' . $animal->sex, 1)
                                    @else
                                        @lang('page.frontend.animal.n')
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
            @endforeach
        </aside>
    </div>
    <div class="row my-4">
        <div class="col">
            <a href="@if ( session('result_page') ) {{ session('result_page') }} @else {{ url()->previous() }} @endif">
                <i class="fa fa-angle-double-left" aria-hidden="true"></i> @lang('navs.frontend.previous')
            </a>
        </div>
    </div>
</section>
@endsection
