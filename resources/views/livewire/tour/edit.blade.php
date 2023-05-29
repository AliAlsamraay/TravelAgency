<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('tour.name') ? 'invalid' : '' }}">
        <label class="form-label required" for="name">{{ trans('cruds.tour.fields.name') }}</label>
        <input class="form-control" type="text" name="name" id="name" required wire:model.defer="tour.name">
        <div class="validation-message">
            {{ $errors->first('tour.name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.tour.fields.name_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('tour.description') ? 'invalid' : '' }}">
        <label class="form-label" for="description">{{ trans('cruds.tour.fields.description') }}</label>
        <textarea class="form-control" name="description" id="description" wire:model.defer="tour.description" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('tour.description') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.tour.fields.description_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('tour.start_date') ? 'invalid' : '' }}">
        <label class="form-label" for="start_date">{{ trans('cruds.tour.fields.start_date') }}</label>
        <x-date-picker class="form-control" wire:model="tour.start_date" id="start_date" name="start_date" picker="date" />
        <div class="validation-message">
            {{ $errors->first('tour.start_date') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.tour.fields.start_date_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('tour.end_date') ? 'invalid' : '' }}">
        <label class="form-label" for="end_date">{{ trans('cruds.tour.fields.end_date') }}</label>
        <x-date-picker class="form-control" wire:model="tour.end_date" id="end_date" name="end_date" picker="date" />
        <div class="validation-message">
            {{ $errors->first('tour.end_date') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.tour.fields.end_date_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('tour_package') ? 'invalid' : '' }}">
        <label class="form-label required" for="tour_package">{{ trans('cruds.tour.fields.tour_package') }}</label>
        <x-select-list class="form-control" required id="tour_package" name="tour_package" wire:model="tour_package" :options="$this->listsForFields['tour_package']" multiple />
        <div class="validation-message">
            {{ $errors->first('tour_package') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.tour.fields.tour_package_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('tour.hotel_id') ? 'invalid' : '' }}">
        <label class="form-label required" for="hotel">{{ trans('cruds.tour.fields.hotel') }}</label>
        <x-select-list class="form-control" required id="hotel" name="hotel" :options="$this->listsForFields['hotel']" wire:model="tour.hotel_id" />
        <div class="validation-message">
            {{ $errors->first('tour.hotel_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.tour.fields.hotel_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('tour.location_id') ? 'invalid' : '' }}">
        <label class="form-label required" for="location">{{ trans('cruds.tour.fields.location') }}</label>
        <x-select-list class="form-control" required id="location" name="location" :options="$this->listsForFields['location']" wire:model="tour.location_id" />
        <div class="validation-message">
            {{ $errors->first('tour.location_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.tour.fields.location_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.tours.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>