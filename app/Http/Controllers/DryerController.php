<?php

namespace App\Http\Controllers;

use App\Http\Requests\DryerRequest;
use App\Models\Dryer;
use Illuminate\Support\Facades\Storage;

class DryerController extends Controller
{
    public function index()
    {
        return response()->json(['data' => Dryer::all()]);
    }

    public function store(DryerRequest $request)
    {
        $data = $request->validated();
        $data['image'] = $request->file('image')->store('images', ['disk' => 'public']);
        Dryer::create($data);
        return response()->json(['success' => true, 'data' => Dryer::all()]);

    }
    public function update(DryerRequest $request, Dryer $dryer)
    {
        $data = $request->validated();
        if ($request->file('image')) {
            Storage::disk('public')->delete(($dryer->image));
            $data['image'] = $request->file('image')->store('images', ['disk' => 'public']);
        }
        $dryer->update($data);
        return response()->json(['success' => true, 'data' => Dryer::all()]);
    }
    public function delete(Dryer $dryer)
    {
        Storage::disk('public')->delete(($dryer->image));
        $dryer->delete();
        return response()->json(['success' => true, 'data' => Dryer::all()]);
    }
}
