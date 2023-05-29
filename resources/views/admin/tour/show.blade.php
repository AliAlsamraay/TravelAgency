@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.tour.title_singular') }}:
                    {{ trans('cruds.tour.fields.id') }}
                    {{ $tour->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.tour.fields.id') }}
                            </th>
                            <td>
                                {{ $tour->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.tour.fields.name') }}
                            </th>
                            <td>
                                {{ $tour->name }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.tour.fields.description') }}
                            </th>
                            <td>
                                {{ $tour->description }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.tour.fields.start_date') }}
                            </th>
                            <td>
                                {{ $tour->start_date }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.tour.fields.end_date') }}
                            </th>
                            <td>
                                {{ $tour->end_date }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.tour.fields.tour_package') }}
                            </th>
                            <td>
                                @foreach($tour->tourPackage as $key => $entry)
                                    <span class="badge badge-relationship">{{ $entry->name }}</span>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.tour.fields.hotel') }}
                            </th>
                            <td>
                                @if($tour->hotel)
                                    <span class="badge badge-relationship">{{ $tour->hotel->name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.tour.fields.location') }}
                            </th>
                            <td>
                                @if($tour->location)
                                    <span class="badge badge-relationship">{{ $tour->location->name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('tour_edit')
                    <a href="{{ route('admin.tours.edit', $tour) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.tours.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection