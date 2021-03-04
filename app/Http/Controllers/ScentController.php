<?php

namespace App\Http\Controllers;

use App\Http\Requests\ScentRequest;
use App\Models\CategoryScent;
use App\Models\Scent;
use Illuminate\Support\Facades\Storage;

class ScentController extends Controller
{
    public function index()
    {

        $scents = CategoryScent::with('scents')->get()->each(function ($fab) {
            $fab->scents = $fab->scents;
        });
        return view('admin.packages.scent.index', ['active' => 'scent', 'scent_items' => $scents, 'categories' => CategoryScent::all()]);
        return response()->json(['data' => Scent::all()]);
    }

    public function store(ScentRequest $request)
    {
        $data = $request->validated();
        $data['image'] = $request->file('image')->store('images', ['disk' => 'public']);
        $scent = Scent::create($data);
        return response()->json(['success' => true, 'data' => $scent]);

    }
    public function update(ScentRequest $request, Scent $scent)
    {
        $data = $request->validated();
        if ($request->file('image')) {
            Storage::disk('public')->delete(($scent->image));
            $data['image'] = $request->file('image')->store('images', ['disk' => 'public']);
        }
        $scent->update($data);
        return response()->json(['success' => true, 'data' => $scent]);
    }
    public function delete(Scent $scent)
    {
        Storage::disk('public')->delete(($scent->image));
        $scent->delete();
        return response()->json(['success' => true]);
    }
}
