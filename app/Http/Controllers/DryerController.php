<?php

namespace App\Http\Controllers;

use App\Http\Requests\DryerRequest;
use App\Models\CategoryDryer;
use App\Models\Dryer;
use Illuminate\Support\Facades\Storage;

class DryerController extends Controller
{
    public function index()
    {

        $dryers = CategoryDryer::with('dryers')->get()->each(function ($dryer) {
            $dryer->dryers = $dryer->dryers;
        });
        return view('admin.packages.dryer.index', ['active' => 'dryer', 'dryer_items' => $dryers, 'categories' => CategoryDryer::all()]);
        // return response()->json(['data' => Dryer::all()]);
    }

    public function store(DryerRequest $request)
    {
        $data = $request->validated();
        $data['image'] = $request->file('image')->store('images', ['disk' => 'public']);
        $dryer = Dryer::create($data);
        return response()->json(['success' => true, 'data' => $dryer]);

    }
    public function update(DryerRequest $request, Dryer $dryer)
    {
        $data = $request->validated();
        if ($request->file('image')) {
            Storage::disk('public')->delete(($dryer->image));
            $data['image'] = $request->file('image')->store('images', ['disk' => 'public']);
        }
        $dryer->update($data);
        return response()->json(['success' => true, 'data' => $dryer]);
    }
    public function delete(Dryer $dryer)
    {
        Storage::disk('public')->delete(($dryer->image));
        $dryer->delete();
        return response()->json(['success' => true]);
    }
}
