@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-white">
        <div class="card-header border-b border-blueGray-200">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('cruds.tourPackage.title_singular') }}
                    {{ trans('global.list') }}
                </h6>

                @can('tour_package_create')
                    <a class="btn btn-indigo" href="{{ route('admin.tour-packages.create') }}">
                        {{ trans('global.add') }} {{ trans('cruds.tourPackage.title_singular') }}
                    </a>
                @endcan
            </div>
        </div>
        @livewire('tour-package.index')

    </div>
</div>
@endsection