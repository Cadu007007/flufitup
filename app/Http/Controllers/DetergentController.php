<?php

namespace App\Http\Controllers;

use App\Http\Requests\DetergentRequest;
use App\Models\CategoryDetergent;
use App\Models\Detergent;
use Illuminate\Support\Facades\Storage;

class DetergentController extends Controller
{
    public function index()
    {
        // $detergents_items = collect();
        // $types1 = collect();
        // $types1->push(['id' => 1, "label" => "test1", "price" => "10", "img" => ""]);
        // $types1->push(['id' => 2, "label" => "test1", "price" => "10", "img" => ""]);
        // $types2 = collect();
        // $types2->push(['id' => 3, "label" => "test2", "price" => "10", "img" => ""]);
        // $detergents_items->push(['id' => 1, 'name' => 'Item 1', 'types' => $types1]);
        // $detergents_items->push(['id' => 2, 'name' => 'Item 2', 'types' => $types2]);

        // $categories = collect();
        // $categories->push(['id' => 1, 'name' => 'Category 1', 'type' => 'dryer_sheet']);
        // $categories->push(['id' => 2, 'name' => 'Category 2', 'type' => 'detergents']);

        $detergents = CategoryDetergent::get()->each(function ($detergent) {
            $detergent->detergents = $detergent->detergents;
        });
        // dd($categories);
        return view('admin.packages.detergents.index', ['active' => 'detergents', 'detergents_items' => $detergents, 'categories' => CategoryDetergent::all()]);
        // return response()->json(['data' => Detergent::all()]);
    }

    public function store(DetergentRequest $request)
    {
        $data = $request->validated();
        $data['image'] = $request->file('image')->store('images', ['disk' => 'public']);
        Detergent::create($data);
        return response()->json(['success' => true, 'data' => Detergent::all()]);

    }
    public function update(DetergentRequest $request, Detergent $detergent)
    {
        $data = $request->validated();
        if ($request->file('image')) {
            Storage::disk('public')->delete(($detergent->image));
            $data['image'] = $request->file('image')->store('images', ['disk' => 'public']);
        }
        $detergent->update($data);
        return response()->json(['success' => true, 'data' => Detergent::all()]);
    }
    public function delete(Detergent $detergent)
    {
        Storage::disk('public')->delete(($detergent->image));
        $detergent->delete();
        return response()->json(['success' => true, 'data' => Detergent::all()]);
    }
}
