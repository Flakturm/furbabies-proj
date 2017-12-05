@extends('frontend.layouts.master')

@section('content')
<section class="container">
    <div class="row my-4">
        <div class="col">
            <a href="@if ( session('result_page') ) {{ session('result_page') }} @else {{ url()->previous() }} @endif">
                <i class="fa fa-angle-double-left" aria-hidden="true"></i> @lang('navs.frontend.previous')
            </a>
        </div>
    </div>
    <div class="row mb-5">
        <section class="col col-sm-9">
            @if ( $animal )
            <div class="row">
                <picture class="col col-sm-6">
                    <a href="{{ $animal->album_file }}" data-toggle="lightbox">
                        {{ Html::image($animal->album_file, $animal->animal_id, ['class' => 'rounded img-fluid img-thumbnail mx-auto d-block', 'style' => 'max-height:300px']) }}
                    </a>
                </picture>
                <article class="col col-sm-6">
                    <div class="row">
                        <div class="col">
                            <p class="h3">
                                @lang('page.frontend.animal.id'): {{ $animal->animal_id }}
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <p class="h3">
                                <span class="badge badge-@if ( $animal->status == 'open' )success @elseif ( $animal->status == 'dead' )danger @else secondary
                                @endif">@lang('page.frontend.animal.status.' . $animal->status )</span>
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
                                {{ $animal->colour }}
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
                                @lang('page.frontend.animal.foundplace', ['location' => $animal->foundplace])
                            </p>
                        </div>
                    </div>
                    @endif
                </article>
            </div>
            @if ( $animal->remark )
                <article class="col-12 mt-4">
                    <p>{{ $animal->remark }}</p>
                </article>
            @endif
            @if ( $animal->shelter->remark )
                <article class="col-12 pt-4 my-grey-border border-right-0 border-bottom-0 border-left-0">
                    <h4>{{ $animal->shelter->name }}</h4>
                    <p>{!! $animal->shelter->remark !!}</p>
                </article>
            @endif
        @else
            <div class="row">
                <p>@choice('page.frontend.results.notfound', 1)</p>
            </div>
        @endif
        </section>
        <aside class="col col-sm-3 d-none d-sm-block">
            @foreach ( $rand_animals as $key => $animal )
            <a href="{{ route('shelter.animal', ['id' => $animal->id]) }}">
                <div class="row box-shadow @if ( $key % 2 )my-4 @endif">
                    <div class="col-6 pl-0">
                        {{ Html::image($animal->album_file, null, ['data-id' => $animal->id, 'onerror' => "this.onerror=null;this.src='" . asset('images/nophoto.jpg') . "';", 'width' => '320']) }}
                    </div>
                    <div class="col-6">
                        <div class="row">
                            <div class="col-1">
                                <i class="fa fa-map-marker ml-1" aria-hidden="true"></i>
                            </div>
                            <div class="col">
                                <small class="text-muted">
                                    {{ $animal->shelter->area->name }}
                                </small>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-1">
                                <i class="fa fa-paint-brush" aria-hidden="true"></i>
                            </div>
                            <div class="col">
                                <small class="text-muted">
                                    @if ( $animal->colour )
                                        {{ $animal->colour }}
                                    @else
                                        @lang('page.frontend.animal.unknown')
                                    @endif
                                </small>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-1">
                                <i class="fa fa-paw" aria-hidden="true"></i>
                            </div>
                            <div class="col">
                                <small class="text-muted">
                                    @if ( $animal->age )
                                        @lang('page.frontend.animal.' . $animal->age)
                                    @else
                                        @lang('page.frontend.animal.unknown')
                                    @endif
                                </small>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-1">
                                <i class="fa fa-venus-mars mr-1" aria-hidden="true"></i>
                            </div>
                            <div class="col">
                                <small class="text-muted">
                                    @if ( $animal->sex == 'f' OR $animal->sex == 'm' )
                                        @choice('page.frontend.animal.' . $animal->sex, 1)
                                    @else
                                        @lang('page.frontend.animal.n')
                                    @endif
                                </small>
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
