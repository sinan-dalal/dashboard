<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDropDownRequest;
use App\Http\Requests\UpdateLandscapeRequest;
use App\Models\Landscape;

class LandscapeController extends Controller
{
    public function index()
    {
        return view('components.drop-down-menu-operation',[
            'route'=>'landscapes',
            'title' => 'المخططات',
            'items' => Landscape::all(),
        ]);
    }

    public function store(StoreDropDownRequest $request)
    {
        Landscape::create($request->validated());

        return redirect(route('landscapes.index'));
    }

    public function destroy(Landscape $landscap)
    {
        $landscap->delete();

        return redirect(route('landscapes.index'));
    }
}
