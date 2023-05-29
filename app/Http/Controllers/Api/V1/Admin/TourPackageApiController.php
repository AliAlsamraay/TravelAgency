<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTourPackageRequest;
use App\Http\Requests\UpdateTourPackageRequest;
use App\Http\Resources\Admin\TourPackageResource;
use App\Models\TourPackage;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TourPackageApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('tour_package_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TourPackageResource(TourPackage::all());
    }

    public function store(StoreTourPackageRequest $request)
    {
        $tourPackage = TourPackage::create($request->validated());

        return (new TourPackageResource($tourPackage))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(TourPackage $tourPackage)
    {
        abort_if(Gate::denies('tour_package_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TourPackageResource($tourPackage);
    }

    public function update(UpdateTourPackageRequest $request, TourPackage $tourPackage)
    {
        $tourPackage->update($request->validated());

        return (new TourPackageResource($tourPackage))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(TourPackage $tourPackage)
    {
        abort_if(Gate::denies('tour_package_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tourPackage->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
