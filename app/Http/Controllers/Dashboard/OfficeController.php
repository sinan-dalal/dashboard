<?php

namespace App\Http\Controllers\Dashboard;

use App\Helpers\MediaHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOfficeRequest;
use App\Http\Requests\UpdateOfficeRequest;
use App\Models\Office;
use Carbon\Carbon;
use Illuminate\Http\Request;

class OfficeController extends Controller
{

    public function index(Request $request)
    {
        $offices = Office::with('lands')
            ->paginate($request->perPage ?? 10)
            ->withQueryString();

        return view('office.index', [
            'title' => 'المكاتب العقارية',
            'perPage' => $request->perPage,
            'offices' => $offices,
            'attribute' => [
                'attribute' => '$offices',
                'operation' => 'offices',
                'title' => 'جدول المكاتب العقارية',
            ],
        ]);
    }


    public function create()
    {
        return view('office.create', [
            'attribute' => ['operation' => 'offices'],
            'title' => 'إضافة مكتب عقاري',
        ]);
    }

    public function store(StoreOfficeRequest $request)
    {
        $data = $request->validated();

        unset($data['verified']);

        $data ['email_verified_at'] = $request->verified ? now() : null;

        if (key_exists('image', $data)) {

            $path = MediaHelper::uploadFile($data ['image'], 'offices');

            $data['image'] = $path;

        }

        $office = Office::create($data);

        return redirect(route('offices.show', $office->id));
    }


    public function show(Request $request, Office $offiz)
    {
        $lands = $offiz->lands()->paginate($request->perPage ?? 10)->withQueryString();

        return view('office.show', [
            'title' => 'مكاتب عقاري',
            'perPage' => $request->perPage,
            'office' => $offiz,
            'lands' => $lands,
            'attribute' => [
                'add_button' => false,
                'attribute' => '$offices',
                'operation' => 'offices',
                'title' => 'الاراضي',
            ]
        ]);
    }

    public function edit(Office $offiz)
    {
        return view('office.edit', ([
            'office' => $offiz,
            'attribute' => ['operation' => 'offices'],
            'title' => 'تعديل مكتب عقاري',]));
    }

    public function update(UpdateOfficeRequest $request, Office $offiz)
    {
        $data = $request->validated();

        unset($data['verified']);

        $data ['email_verified_at'] = $request->verified ? now() : null;

        if (key_exists('image', $data)) {

            $path = MediaHelper::uploadFile($data ['image'], 'offices');

            $data['image'] = $path;
        }

        $offiz->update($data);

        return redirect(route('offices.show', $offiz->id));
    }

    public function destroy(Office $offiz)
    {
        $offiz->delete();

        return redirect(route('offices.index'));
    }
}
