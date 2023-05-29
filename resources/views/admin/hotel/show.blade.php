@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.hotel.title_singular') }}:
                    {{ trans('cruds.hotel.fields.id') }}
                    {{ $hotel->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.hotel.fields.id') }}
                            </th>
                            <td>
                                {{ $hotel->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.hotel.fields.name') }}
                            </th>
                            <td>
                                {{ $hotel->name }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.hotel.fields.description') }}
                            </th>
                            <td>
                                {{ $hotel->description }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.hotel.fields.address') }}
                            </th>
                            <td>
                                {{ $hotel->address }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.hotel.fields.rating') }}
                            </th>
                            <td>
                                {{ $hotel->rating }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.hotel.fields.available_rooms') }}
                            </th>
                            <td>
                                {{ $hotel->available_rooms }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.hotel.fields.price_per_night') }}
                            </th>
                            <td>
                                {{ $hotel->price_per_night }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.hotel.fields.image') }}
                            </th>
                            <td>
                                @foreach($hotel->image as $key => $entry)
                                    <a class="link-photo" href="{{ $entry['url'] }}">
                                        <img src="{{ $entry['preview_thumbnail'] }}" alt="{{ $entry['name'] }}" title="{{ $entry['name'] }}">
                                    </a>
                                @endforeach
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('hotel_edit')
                    <a href="{{ route('admin.hotels.edit', $hotel) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.hotels.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection