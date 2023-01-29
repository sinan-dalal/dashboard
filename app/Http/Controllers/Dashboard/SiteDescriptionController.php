<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDropDownRequest;
use App\Models\LandSiteDescription;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;

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

    public function store(StoreDropDownRequest $request): Redirector|Application|RedirectResponse
    {
        LandSiteDescription::create($request->validated());

        return redirect(route('land-descriptions.index'));
    }

    public function destroy(LandSiteDescription $land_description): Redirector|Application|RedirectResponse
    {
        $land_description->delete();

        return redirect(route('land-descriptions.index'));
    }
}
