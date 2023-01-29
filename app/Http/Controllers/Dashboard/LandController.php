<?php

namespace App\Http\Controllers\Dashboard;

use App\Helpers\MediaHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLandRequest;
use App\Http\Requests\UpdateLandRequest;
use App\Models\Land;
use Illuminate\Http\Request;

class LandController extends Controller
{
    public function index(Request $request)
    {
        $lands = Land::with(['landDirection', 'siteDescription', 'landscape'])
            ->paginate($request->perPage ?? 10)
            ->withQueryString();

        return view('land.index', ([
            'title' => 'الاراضي',
            'perPage' => $request->perPage,
            'lands' => $lands,
            'attribute' => [
                'add_button' => true,
                'attribute' => '$lands',
                'operation' => 'lands',
                'title' => 'جدول الاراضي',
            ],
        ]));
    }

    public function create()
    {
        return view('land.create', ([

            'attribute' => ['operation' => 'offices'],
            'title' => 'إضافة أرض',]));
    }

    public function store(StoreLandRequest $request)
    {
        $data = $request->validated();

        if (key_exists('image', $data)) {
            $path = MediaHelper::uploadFile($data['image'], 'lands');

            $data['image'] = $path;
        }

        $land = Land::create($data);

        if (key_exists('images', $data)) {
            foreach ($data['images'] as $image) {
                $path = MediaHelper::uploadFile($image, 'lands');

                $land->images()->create(['path' => $path]);
            }
        }

        return redirect(route('lands.show', $land->id));
    }


    public function show(Land $land)
    {
        return view('land.show', [
            'title' => 'المكاتب العقارية',
            'land' => $land->load(['landDirection', 'siteDescription', 'landscape', 'images']),
            'attribute' => [
                'add_button' => false,
                'attribute' => '$offices',
                'operation' => 'offices',
                'title' => 'الاراضي',
            ]
        ]);
    }

    public function edit(Land $Land)
    {
        return view('land.edit', [
                'land' => $Land,
                'attribute' => ['operation' => 'offices'],
                'title' => 'تحديث الارض',]
        );
    }

    public function update(UpdateLandRequest $request, Land $land)
    {
        $data = $request->validated();

        if (key_exists('images', $data)) {
            foreach ($data['images'] as $image) {
                $path = MediaHelper::uploadFile($image, 'lands');

                $land->images()->create(['path' => $path]);
            }
        }

        if (key_exists('image', $data)) {
            $path = MediaHelper::uploadFile($data['image'], 'lands');

            $data['image'] = $path;
        }

        $land->update($data);

        return redirect(route('lands.show', $land->id));
    }

    public function destroy(Land $land)
    {
        $land->delete();

        return redirect(route('lands.index'));
    }
}
