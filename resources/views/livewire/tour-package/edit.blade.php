<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('tourPackage.name') ? 'invalid' : '' }}">
        <label class="form-label required" for="name">{{ trans('cruds.tourPackage.fields.name') }}</label>
        <input class="form-control" type="text" name="name" id="name" required wire:model.defer="tourPackage.name">
        <div class="validation-message">
            {{ $errors->first('tourPackage.name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.tourPackage.fields.name_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('tourPackage.price') ? 'invalid' : '' }}">
        <label class="form-label required" for="price">{{ trans('cruds.tourPackage.fields.price') }}</label>
        <input class="form-control" type="number" name="price" id="price" required wire:model.defer="tourPackage.price" step="0.0001">
        <div class="validation-message">
            {{ $errors->first('tourPackage.price') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.tourPackage.fields.price_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('tourPackage.duration') ? 'invalid' : '' }}">
        <label class="form-label" for="duration">{{ trans('cruds.tourPackage.fields.duration') }}</label>
        <input class="form-control" type="number" name="duration" id="duration" wire:model.defer="tourPackage.duration" step="1">
        <div class="validation-message">
            {{ $errors->first('tourPackage.duration') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.tourPackage.fields.duration_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('tourPackage.activities') ? 'invalid' : '' }}">
        <label class="form-label" for="activities">{{ trans('cruds.tourPackage.fields.activities') }}</label>
        <textarea class="form-control" name="activities" id="activities" wire:model.defer="tourPackage.activities" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('tourPackage.activities') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.tourPackage.fields.activities_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.tour-packages.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>