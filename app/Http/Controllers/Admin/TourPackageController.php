<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TourPackage;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TourPackageController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('tour_package_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.tour-package.index');
    }

    public function create()
    {
        abort_if(Gate::denies('tour_package_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.tour-package.create');
    }

    public function edit(TourPackage $tourPackage)
    {
        abort_if(Gate::denies('tour_package_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.tour-package.edit', compact('tourPackage'));
    }

    public function show(TourPackage $tourPackage)
    {
        abort_if(Gate::denies('tour_package_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.tour-package.show', compact('tourPackage'));
    }
}
