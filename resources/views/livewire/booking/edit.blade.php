<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('booking.status') ? 'invalid' : '' }}">
        <label class="form-label required">{{ trans('cruds.booking.fields.status') }}</label>
        @foreach($this->listsForFields['status'] as $key => $value)
            <label class="radio-label"><input type="radio" name="status" wire:model="booking.status" value="{{ $key }}">{{ $value }}</label>
        @endforeach
        <div class="validation-message">
            {{ $errors->first('booking.status') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.booking.fields.status_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('booking.booking_date') ? 'invalid' : '' }}">
        <label class="form-label required" for="booking_date">{{ trans('cruds.booking.fields.booking_date') }}</label>
        <x-date-picker class="form-control" required wire:model="booking.booking_date" id="booking_date" name="booking_date" picker="date" />
        <div class="validation-message">
            {{ $errors->first('booking.booking_date') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.booking.fields.booking_date_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('booking.user_id') ? 'invalid' : '' }}">
        <label class="form-label required" for="user">{{ trans('cruds.booking.fields.user') }}</label>
        <x-select-list class="form-control" required id="user" name="user" :options="$this->listsForFields['user']" wire:model="booking.user_id" />
        <div class="validation-message">
            {{ $errors->first('booking.user_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.booking.fields.user_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('booking.tour_package_id') ? 'invalid' : '' }}">
        <label class="form-label required" for="tour_package">{{ trans('cruds.booking.fields.tour_package') }}</label>
        <x-select-list class="form-control" required id="tour_package" name="tour_package" :options="$this->listsForFields['tour_package']" wire:model="booking.tour_package_id" />
        <div class="validation-message">
            {{ $errors->first('booking.tour_package_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.booking.fields.tour_package_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('booking.num_of_persons') ? 'invalid' : '' }}">
        <label class="form-label required" for="num_of_persons">{{ trans('cruds.booking.fields.num_of_persons') }}</label>
        <input class="form-control" type="number" name="num_of_persons" id="num_of_persons" required wire:model.defer="booking.num_of_persons" step="1">
        <div class="validation-message">
            {{ $errors->first('booking.num_of_persons') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.booking.fields.num_of_persons_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.bookings.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>