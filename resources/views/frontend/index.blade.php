@extends('frontend.layouts.master')

@section('content')
    @include('frontend.includes.banner')

    <section class="container pt-5 pt-sm-0">
        <header>
            <h3 class="mb-3">@lang('page.frontend.animal.recentPets') <a href="{{ route('all.shelter.animal') }}" class="btn btn-outline-dark ml-3" role="button"><i class="fa fa-plus-circle" aria-hidden="true"></i> @lang('page.general.viewAll')</a></h3>
        </header>
        <div class="card-deck mb-4">
            @foreach ($animals as $animal)
            <div class="card">
                <div class="card-img-top">
                    <div class="card-item-image">
                        <picture class="img-wrapper">
                            <a class="thumb" href="{{ route('shelter.animal', ['id' => $animal->id]) }}">
                                {{ Html::image($animal->album_file, 'animal-' . $animal->animal_id, ['data-id' => $animal->id, 'onerror' => "this.onerror=null;this.src='" . asset('images/nophoto.jpg') . "';"]) }}
                            </a>
                        </pitcure>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-6 col-sm-12">
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
                        </div>
                        <div class="col-6 col-sm-12">
                            <div class="row">
                                <div class="col-1">
                                    <i class="fa fa-paint-brush" aria-hidden="true"></i>
                                </div>
                                <div class="col">
                                    <small class="text-muted">
                                        @if ( $animal->colour )
                                            {{ $animal->colour }}
                                        @else
                                            @lang('page.general.unknown')
                                        @endif
                                    </small>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-sm-12">
                            <div class="row">
                                <div class="col-1">
                                    <i class="fa fa-paw" aria-hidden="true"></i>
                                </div>
                                <div class="col">
                                    <small class="text-muted">
                                        @if ( $animal->age )
                                            @lang('page.frontend.animal.' . $animal->age)
                                        @else
                                            @lang('page.general.unknown')
                                        @endif
                                    </small>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-sm-12">
                            <div class="row">
                                <div class="col-1">
                                    <i class="fa fa-venus-mars mr-1" aria-hidden="true"></i>
                                </div>
                                <div class="col">
                                    <small class="text-muted">
                                        @if ( $animal->sex == 'n' )
                                            @lang('page.general.unknown')
                                        @elseif ( $animal->sex == 'f' OR $animal->sex == 'm' )
                                            @choice('page.frontend.animal.' . $animal->sex, 1)
                                        @else
                                            @lang('page.general.unknown')
                                        @endif
                                    </small>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="row">
                                <div class="col-1">
                                    <i class="fa fa-clock-o" aria-hidden="true"></i>
                                </div>
                                <div class="col">
                                    <small class="text-muted">@lang('page.frontend.animal.updateTime', ['time' => $animal->update->diffForHumans()])</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>

    <section class="container-fluid darken my-grey-border border-right-0 border-bottom-0 border-left-0">
        <div class="container py-4">
            <div class="text-center mb-3">
                <h3>@lang('page.frontend.index.browseCategories')</h3>
            </div>
            <div class="row">
                    <picture class="col-12 col-sm-6 mb-4 mb-sm-0 categories">
                        <a href="{{ route('search.shelter.animal', ['kind' => 'cat']) }}">
                            {{ HTML::image(asset('images/category-cats.jpg'), 'Categories Cats', array('class' => 'rounded transition')) }}
                            <div class="carousel-caption">
                                <p class="display-3 font-weight-bold mb-0 mb-sm-4 text-shadow">@choice('page.frontend.animal.cat', 2)</p>
                            </div>
                        </a>
                    </picture>
                    <picture class="col-12 col-sm-6 categories">
                        <a href="{{ route('search.shelter.animal', ['kind' => 'dog']) }}">
                            <img src="https://placeimg.com/538/250/animals?t=1510008045988" class="rounded transition" alt="">
                            <div class="carousel-caption">
                                <p class="display-3 font-weight-bold mb-0 mb-sm-4 text-shadow">@choice('page.frontend.animal.dog', 2)</p>
                            </div>
                        </a>
                    </picture>
            </div>
        </div>
    </section>
@endsection
