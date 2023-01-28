<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDropDownRequest;
use App\Models\LandSiteDescription;

class SiteDescriptionController extends Controller
{
    public function index()
    {
        return view('components.drop-down-menu-operation', [
            'route' => 'land-descriptions',
            'title' => 'وصف الموقع',
            'items' => LandSiteDescription::all(),
        ]);
    }

    public function store(StoreDropDownRequest $request)
    {
        LandSiteDescription::create($request->validated());

        return redirect(route('land-descriptions.index'));
    }

    public function destroy(LandSiteDescription $land_description)
    {
        $land_description->delete();

        return redirect(route('land-descriptions.index'));
    }
}
