<?php

namespace App\Http\Controllers;

use App\Http\Requests\FabricRequest;
use App\Models\CategoryFabric;
use App\Models\Fabric;
use Illuminate\Support\Facades\Storage;

class FabricController extends Controller
{
    public function index()
    {

        $fabrics = CategoryFabric::with('fabrics')->get()->each(function ($fab) {
            $fab->fabrics = $fab->fabrics;
        });
        return view('admin.packages.fabric.index', ['active' => 'fabric', 'fabric_items' => $fabrics, 'categories' => CategoryFabric::all()]);
        // return response()->json(['data' => Fabric::all()]);
    }

    public function store(FabricRequest $request)
    {
        $data = $request->validated();
        $data['image'] = $request->file('image')->store('images', ['disk' => 'public']);
        $fabric = Fabric::create($data);
        return response()->json(['success' => true, 'data' => $fabric]);

    }
    public function update(FabricRequest $request, Fabric $fabric)
    {
        $data = $request->validated();
        if ($request->file('image')) {
            Storage::disk('public')->delete(($fabric->image));
            $data['image'] = $request->file('image')->store('images', ['disk' => 'public']);
        }
        $fabric->update($data);
        return response()->json(['success' => true, 'data' => $fabric]);
    }
    public function delete(Fabric $fabric)
    {
        Storage::disk('public')->delete(($fabric->image));
        $fabric->delete();
        return response()->json(['success' => true]);
    }
}
