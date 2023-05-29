<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTourRequest;
use App\Http\Requests\UpdateTourRequest;
use App\Http\Resources\Admin\TourResource;
use App\Models\Tour;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TourApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('tour_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TourResource(Tour::with(['tourPackage', 'hotel', 'location'])->get());
    }

    public function store(StoreTourRequest $request)
    {
        $tour = Tour::create($request->validated());
        $tour->tourPackage()->sync($request->input('tourPackage', []));

        return (new TourResource($tour))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Tour $tour)
    {
        abort_if(Gate::denies('tour_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TourResource($tour->load(['tourPackage', 'hotel', 'location']));
    }

    public function update(UpdateTourRequest $request, Tour $tour)
    {
        $tour->update($request->validated());
        $tour->tourPackage()->sync($request->input('tourPackage', []));

        return (new TourResource($tour))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Tour $tour)
    {
        abort_if(Gate::denies('tour_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tour->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
