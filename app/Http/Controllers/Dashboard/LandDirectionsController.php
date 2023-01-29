<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDropDownRequest;
use App\Models\landDirection;

class LandDirectionsController extends Controller
{
    public function index()
    {
        return view('components.drop-down-menu-operation', [
            'route' => 'directions',
            'title' => ' قائمة الاتجاهات',
            'items' => landDirection::all(),
        ]);
    }

    public function store(StoreDropDownRequest $request)
    {
        LandDirection::create($request->validated());

        return redirect(route('directions.index'));
    }

    public function destroy(LandDirection $direction)
    {
        $direction->delete();

        return redirect(route('directions.index'));
    }
}
