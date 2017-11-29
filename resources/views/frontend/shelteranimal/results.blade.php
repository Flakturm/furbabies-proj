@extends('frontend.layouts.master')

@section('content')
    <section class="container mt-sm-5">
        <div class="jumbotron pt-5 pb-2">
            {{ Form::open(['method' => 'get', 'route' => 'search.shelter.animal']) }}
            <div class="row">
                <div class="col col-sm-3">
                    <div class="form-group">
                        <select class="form-control select2" name="area_id" id="area"  data-placeholder="@lang('labels.frontend.form.placeholder.areas')" >
                            @if ( isset($query['area_id']) AND $query['area_id'] )
                                <option value="{{ $query['area_id'] }}" selected="selected">
                                    {{ App\Area::find($query['area_id'])->name }}
                                </option>
                            @else
                                <option value="0">@lang('labels.frontend.form.placeholder.areas')</option>
                            @endif
                        </select>
                    </div>
                    <div class="form-group">
                        <select class="form-control select2" name="shelter_id" id="shelter"  data-placeholder="@lang('labels.frontend.form.placeholder.shelters')" >
                            @if ( isset($query['shelter_id']) AND $query['shelter_id'] )
                                <option value="{{ $query['shelter_id'] }}" selected="selected">
                                    {{ App\Shelter::find($query['shelter_id'])->name }}
                                </option>
                            @else
                                <option value="0">@lang('labels.frontend.form.placeholder.shelters')</option>
                            @endif
                        </select>
                    </div>
                </div>
                <div class="col col-sm-3">
                    <div class="form-group">
                        <select class="form-control select2" name="kind"  data-placeholder="@lang('labels.frontend.form.placeholder.kinds')">
                            <option value="0">@lang('labels.frontend.form.placeholder.kinds')</option>
                            @foreach ( App\ShelterAnimal::getEnum('kind') as $key => $value )
                                <option value="{{ $value }}"
                                @if ( isset($query['kind']) AND $query['kind'] == $value )
                                    selected="selected"
                                @endif>@choice('page.frontend.animal.' . $value, 2)</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <select class="form-control select2" name="sex"  data-placeholder="@lang('labels.frontend.form.placeholder.sexes')">
                            <option value="0">@lang('labels.frontend.form.placeholder.sexes')</option>
                            @foreach ( App\ShelterAnimal::getEnum('sex') as $key => $value )
                                <option value="{{ $value }}"
                                @if ( isset($query['sex']) AND $query['sex'] == $value )
                                    selected="selected"
                                @endif>@choice('page.frontend.animal.' . $value, 2)</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col col-sm-3">
                    <div class="form-group">
                        <select class="form-control select2" name="age"  data-placeholder="@lang('labels.frontend.form.placeholder.ages')">
                            <option value="0">@lang('labels.frontend.form.placeholder.ages')</option>
                            @foreach ( App\ShelterAnimal::getEnum('age') as $key => $value )
                                <option value="{{ $value }}"
                                @if ( isset($query['age']) AND $query['age'] == $value )
                                    selected="selected"
                                @endif>@lang('page.frontend.animal.' . $value)</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <select class="form-control select2" name="bodytype"  data-placeholder="@lang('labels.frontend.form.placeholder.bodytypes')">
                            <option value="0">@lang('labels.frontend.form.placeholder.bodytypes')</option>
                            @foreach ( App\ShelterAnimal::getEnum('bodytype') as $key => $value )
                                <option value="{{ $value }}"
                                @if ( isset($query['bodytype']) AND $query['bodytype'] == $value )
                                    selected="selected"
                                @endif>@lang('page.frontend.animal.' . $value)</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col col-sm-3">
                    <div class="form-check form-check-inline">
                        <label>@lang('labels.frontend.form.sterilisation')</label>
                        <label class="form-check-label pl-0">
                            {{ Form::radio('sterilisation', 0, true) }} @lang('labels.frontend.form.all')
                            @foreach ( App\ShelterAnimal::getEnum('sterilisation') as $key => $value )
                                {{ Form::radio('sterilisation', $value) }} @lang('labels.frontend.form.' . $value)
                            @endforeach
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <div class="col">
                    {{ Form::submit(__('buttons.general.crud.search'), array('class' => 'btn btn-default pull-right')) }}
                </div>
            </div>
            {{ Form::close() }}
        </div>
    </section>

    <section class="container pt-5 pt-sm-0">
        @foreach ($animals->chunk(4) as $chunk)
        <div class="card-deck mb-4">
            @foreach ($chunk as $animal)
            <div class="card">
                <div class="card-img-top">
                    <div class="card-item-image">
                        <picture class="img-wrapper">
                            <a class="thumb" href="{{ route('shelter.animal', ['id' => $animal->id]) }}">
                                {{ Html::image($animal->album_file, null, ['data-id' => $animal->id, 'data-src' => asset('images/nophoto.jpg')]) }}
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
                                            @lang('page.frontend.animal.unknown')
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
                                            @lang('page.frontend.animal.unknown')
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
                                            @lang('page.frontend.animal.unknown')
                                        @elseif ( $animal->sex == 'f' OR $animal->sex == 'm' )
                                            @choice('page.frontend.animal.' . $animal->sex, 1)
                                        @else
                                            @lang('page.frontend.animal.unknown')
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
        @endforeach
        {{ $animals->links('pagination::custom') }}
        {{ $animals->links('pagination::bootstrap-4') }}
    </section>
@endsection
