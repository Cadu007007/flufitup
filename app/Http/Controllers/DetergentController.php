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

        $detergents = CategoryDetergent::get()->each(function ($detergent) {
            $detergent->detergents = $detergent->detergents;
        });

        return view('admin.packages.detergents.index', ['active' => 'detergents', 'detergents_items' => $detergents, 'categories' => CategoryDetergent::all()]);
    }

    public function store(DetergentRequest $request)
    {
        $data = $request->validated();
        $data['image'] = $request->file('image')->store('images', ['disk' => 'public']);
        $detergent = Detergent::create($data);

        return response()->json(['success' => true, 'data' => $detergent, 'message' => 'Detergent Created Successfully']);

    }
    public function update(DetergentRequest $request, Detergent $detergent)
    {
        $data = $request->validated();
        if ($request->file('image')) {
            Storage::disk('public')->delete(($detergent->image));
            $data['image'] = $request->file('image')->store('images', ['disk' => 'public']);
        }
        $detergent->update($data);
        return response()->json(['success' => true, 'data' => $detergent, 'message' => 'Detergent Updated Successfully']);
    }
    public function delete(Detergent $detergent)
    {
        Storage::disk('public')->delete(($detergent->image));
        $detergent->delete();
        return response()->json(['success' => true, 'message' => 'Detergent Deleted Successfully']);
    }
}
