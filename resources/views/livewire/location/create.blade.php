<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('location.name') ? 'invalid' : '' }}">
        <label class="form-label required" for="name">{{ trans('cruds.location.fields.name') }}</label>
        <input class="form-control" type="text" name="name" id="name" required wire:model.defer="location.name">
        <div class="validation-message">
            {{ $errors->first('location.name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.location.fields.name_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('location.description') ? 'invalid' : '' }}">
        <label class="form-label" for="description">{{ trans('cruds.location.fields.description') }}</label>
        <textarea class="form-control" name="description" id="description" wire:model.defer="location.description" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('location.description') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.location.fields.description_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('mediaCollections.location_image') ? 'invalid' : '' }}">
        <label class="form-label" for="image">{{ trans('cruds.location.fields.image') }}</label>
        <x-dropzone id="image" name="image" action="{{ route('admin.locations.storeMedia') }}" collection-name="location_image" max-file-size="2" max-width="4096" max-height="4096" max-files="1" />
        <div class="validation-message">
            {{ $errors->first('mediaCollections.location_image') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.location.fields.image_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.locations.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>