@extends('frontend.layouts.master')

@section('content')
    <div class="container">
        @forelse ($animals->chunk(4) as $chunk)
        <div class="card-deck mb-4">
            @foreach ($chunk as $animal)
            <div class="card">
                <div class="card-img-top">
                    <div class="card-item-image">
                        <div class="img-wrapper">
                            <a class="thumb" href="{{ route('shelter.animal', ['id' => $animal->id]) }}">
                            {{ Html::image($animal->album_file, 'animal-' . $animal->animal_id) }}
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <p class="card-text">
                        <span class="h5">
                            {{ Html::link(route('shelter.by.animal', ['name' => $animal->shelter->name]), $animal->shelter->name, ['class' => 'badge badge-secondary']) }}
                        </span>
                    </p>

                    <p class="card-text">
                        @lang('page.frontend.home.colour'):
                        @if ( $animal->colour )
                            {{ $animal->colour }}
                        @else
                            @lang('page.general.unknown')
                        @endif
                    </p>
                    <p class="card-text">
                        @lang('page.frontend.home.age'):
                        @if ( $animal->age )
                            @lang('page.frontend.home.' . $animal->age)
                        @else
                            @lang('page.general.unknown')
                        @endif
                    </p>
                    <p class="card-text">
                        @lang('page.frontend.home.gender'):
                        @if ( $animal->sex )
                            @lang('page.frontend.home.' . $animal->sex)
                        @else
                            @lang('page.general.unknown')
                        @endif
                    </p>
                </div>
                <div class="card-footer">
                    <small class="text-muted">@lang('page.frontend.home.update_time', ['time' => $animal->update->diffForHumans()])</small>
                    {{ Html::link(route('shelter.animal', ['id' => $animal->id]), __('page.frontend.home.aboutMe'), ['class' => 'btn btn-info btn-sm float-right']) }}
                </div>
            </div>
            @endforeach
        </div>
        @empty
        <div class="card">
            <div class="card-body">
                <p class="card-text">
                    123
                </p>
            </div>
        </div>
        @endforelse
    </div>
@endsection
