<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tour;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TourController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('tour_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.tour.index');
    }

    public function create()
    {
        abort_if(Gate::denies('tour_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.tour.create');
    }

    public function edit(Tour $tour)
    {
        abort_if(Gate::denies('tour_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.tour.edit', compact('tour'));
    }

    public function show(Tour $tour)
    {
        abort_if(Gate::denies('tour_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tour->load('tourPackage', 'hotel', 'location');

        return view('admin.tour.show', compact('tour'));
    }
}
