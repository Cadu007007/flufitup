<?php

namespace App\Http\Controllers;

use App\Http\Requests\DetergentRequest;
use App\Models\Detergent;
use Illuminate\Support\Facades\Storage;

class DetergentController extends Controller
{
    public function index()
    {
        return response()->json(['data' => Detergent::all()]);
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
