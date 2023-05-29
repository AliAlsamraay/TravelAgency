@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.edit') }}
                    {{ trans('cruds.hotel.title_singular') }}:
                    {{ trans('cruds.hotel.fields.id') }}
                    {{ $hotel->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            @livewire('hotel.edit', [$hotel])
        </div>
    </div>
</div>
@endsection