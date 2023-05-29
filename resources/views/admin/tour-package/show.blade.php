@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.tourPackage.title_singular') }}:
                    {{ trans('cruds.tourPackage.fields.id') }}
                    {{ $tourPackage->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.tourPackage.fields.id') }}
                            </th>
                            <td>
                                {{ $tourPackage->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.tourPackage.fields.name') }}
                            </th>
                            <td>
                                {{ $tourPackage->name }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.tourPackage.fields.price') }}
                            </th>
                            <td>
                                {{ $tourPackage->price }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.tourPackage.fields.duration') }}
                            </th>
                            <td>
                                {{ $tourPackage->duration }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.tourPackage.fields.activities') }}
                            </th>
                            <td>
                                {{ $tourPackage->activities }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('tour_package_edit')
                    <a href="{{ route('admin.tour-packages.edit', $tourPackage) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.tour-packages.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection