@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.booking.title_singular') }}:
                    {{ trans('cruds.booking.fields.id') }}
                    {{ $booking->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.booking.fields.id') }}
                            </th>
                            <td>
                                {{ $booking->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.booking.fields.status') }}
                            </th>
                            <td>
                                {{ $booking->status_label }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.booking.fields.booking_date') }}
                            </th>
                            <td>
                                {{ $booking->booking_date }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.booking.fields.user') }}
                            </th>
                            <td>
                                @if($booking->user)
                                    <span class="badge badge-relationship">{{ $booking->user->name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.booking.fields.tour_package') }}
                            </th>
                            <td>
                                @if($booking->tourPackage)
                                    <span class="badge badge-relationship">{{ $booking->tourPackage->name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.booking.fields.num_of_persons') }}
                            </th>
                            <td>
                                {{ $booking->num_of_persons }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('booking_edit')
                    <a href="{{ route('admin.bookings.edit', $booking) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.bookings.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection