@extends('frontend.layouts.master')

@section('content')
    <div class="container">
        <h3 class="">@lang('page.frontend.animal.recentPets') <a href="#" class="btn btn-outline-dark ml-3" role="button"><i class="fa fa-plus-circle" aria-hidden="true"></i> @lang('page.general.viewAll')</a></h3>
        @foreach ($animals->chunk(5) as $chunk)
        <div class="card-deck mb-4">
            @foreach ($chunk as $animal)
            <div class="card">
                <div class="card-img-top">
                    <div class="card-item-image">
                        <div class="img-wrapper">
                            <a class="thumb" href="{{ route('shelter.animal', ['id' => $animal->id]) }}">
                                {{ Html::image($animal->album_file, 'animal-' . $animal->animal_id, ['data-id' => $animal->id]) }}
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
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
                                    @lang('page.general.unknown')
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
                                    @lang('page.general.unknown')
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
                                @if ( $animal->gender )
                                    @lang('page.frontend.animal.' . $animal->gender)
                                @else
                                    @lang('page.general.unknown')
                                @endif
                            </small>
                        </div>
                    </div>
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
            @endforeach
        </div>
        @endforeach
    </div>
@endsection
