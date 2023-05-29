<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadTrait;
use App\Http\Requests\StoreLocationRequest;
use App\Http\Requests\UpdateLocationRequest;
use App\Http\Resources\Admin\LocationResource;
use App\Models\Location;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class LocationApiController extends Controller
{
    use MediaUploadTrait;

    public function index()
    {
        abort_if(Gate::denies('location_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new LocationResource(Location::all());
    }

    public function store(StoreLocationRequest $request)
    {
        $location = Location::create($request->validated());

        if ($request->input('location_image', false)) {
            $location->addMedia(storage_path('tmp/uploads/' . basename($request->input('location_image'))))->toMediaCollection('location_image');
        }

        return (new LocationResource($location))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Location $location)
    {
        abort_if(Gate::denies('location_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new LocationResource($location);
    }

    public function update(UpdateLocationRequest $request, Location $location)
    {
        $location->update($request->validated());

        if ($request->input('location_image', false)) {
            if (! $location->location_image || $request->input('location_image') !== $location->location_image->file_name) {
                if ($location->location_image) {
                    $location->location_image->delete();
                }
                $location->addMedia(storage_path('tmp/uploads/' . basename($request->input('location_image'))))->toMediaCollection('location_image');
            }
        } elseif ($location->location_image) {
            $location->location_image->delete();
        }

        return (new LocationResource($location))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Location $location)
    {
        abort_if(Gate::denies('location_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $location->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
