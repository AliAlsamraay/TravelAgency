<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadTrait;
use App\Http\Requests\StoreHotelRequest;
use App\Http\Requests\UpdateHotelRequest;
use App\Http\Resources\Admin\HotelResource;
use App\Models\Hotel;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class HotelApiController extends Controller
{
    use MediaUploadTrait;

    public function index()
    {
        abort_if(Gate::denies('hotel_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new HotelResource(Hotel::all());
    }

    public function store(StoreHotelRequest $request)
    {
        $hotel = Hotel::create($request->validated());

        if ($request->input('hotel_image', false)) {
            $hotel->addMedia(storage_path('tmp/uploads/' . basename($request->input('hotel_image'))))->toMediaCollection('hotel_image');
        }

        return (new HotelResource($hotel))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Hotel $hotel)
    {
        abort_if(Gate::denies('hotel_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new HotelResource($hotel);
    }

    public function update(UpdateHotelRequest $request, Hotel $hotel)
    {
        $hotel->update($request->validated());

        if ($request->input('hotel_image', false)) {
            if (! $hotel->hotel_image || $request->input('hotel_image') !== $hotel->hotel_image->file_name) {
                if ($hotel->hotel_image) {
                    $hotel->hotel_image->delete();
                }
                $hotel->addMedia(storage_path('tmp/uploads/' . basename($request->input('hotel_image'))))->toMediaCollection('hotel_image');
            }
        } elseif ($hotel->hotel_image) {
            $hotel->hotel_image->delete();
        }

        return (new HotelResource($hotel))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Hotel $hotel)
    {
        abort_if(Gate::denies('hotel_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $hotel->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
