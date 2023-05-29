<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('hotel.name') ? 'invalid' : '' }}">
        <label class="form-label required" for="name">{{ trans('cruds.hotel.fields.name') }}</label>
        <input class="form-control" type="text" name="name" id="name" required wire:model.defer="hotel.name">
        <div class="validation-message">
            {{ $errors->first('hotel.name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.hotel.fields.name_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('hotel.description') ? 'invalid' : '' }}">
        <label class="form-label" for="description">{{ trans('cruds.hotel.fields.description') }}</label>
        <textarea class="form-control" name="description" id="description" wire:model.defer="hotel.description" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('hotel.description') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.hotel.fields.description_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('hotel.address') ? 'invalid' : '' }}">
        <label class="form-label" for="address">{{ trans('cruds.hotel.fields.address') }}</label>
        <input class="form-control" type="text" name="address" id="address" wire:model.defer="hotel.address">
        <div class="validation-message">
            {{ $errors->first('hotel.address') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.hotel.fields.address_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('hotel.rating') ? 'invalid' : '' }}">
        <label class="form-label" for="rating">{{ trans('cruds.hotel.fields.rating') }}</label>
        <input class="form-control" type="number" name="rating" id="rating" wire:model.defer="hotel.rating" step="0.1">
        <div class="validation-message">
            {{ $errors->first('hotel.rating') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.hotel.fields.rating_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('hotel.available_rooms') ? 'invalid' : '' }}">
        <label class="form-label" for="available_rooms">{{ trans('cruds.hotel.fields.available_rooms') }}</label>
        <input class="form-control" type="number" name="available_rooms" id="available_rooms" wire:model.defer="hotel.available_rooms" step="1">
        <div class="validation-message">
            {{ $errors->first('hotel.available_rooms') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.hotel.fields.available_rooms_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('hotel.price_per_night') ? 'invalid' : '' }}">
        <label class="form-label" for="price_per_night">{{ trans('cruds.hotel.fields.price_per_night') }}</label>
        <input class="form-control" type="number" name="price_per_night" id="price_per_night" wire:model.defer="hotel.price_per_night" step="0.001">
        <div class="validation-message">
            {{ $errors->first('hotel.price_per_night') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.hotel.fields.price_per_night_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('mediaCollections.hotel_image') ? 'invalid' : '' }}">
        <label class="form-label" for="image">{{ trans('cruds.hotel.fields.image') }}</label>
        <x-dropzone id="image" name="image" action="{{ route('admin.hotels.storeMedia') }}" collection-name="hotel_image" max-file-size="2" max-width="4096" max-height="4096" max-files="1" />
        <div class="validation-message">
            {{ $errors->first('mediaCollections.hotel_image') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.hotel.fields.image_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.hotels.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>