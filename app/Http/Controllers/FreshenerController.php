<?php

namespace App\Http\Controllers;

use App\Http\Requests\FreshenerRequest;
use App\Models\CategoryFreshener;
use App\Models\Freshener;
use Illuminate\Support\Facades\Storage;

class FreshenerController extends Controller
{
    public function index()
    {

        $fresheners = CategoryFreshener::all()->each(function ($fab) {
            $fab->fresheners = $fab->fresheners;
        });
        return view('admin.packages.freshener.index', ['active' => 'freshener', 'freshener_items' => $fresheners, 'categories' => CategoryFreshener::all()]);
        // return response()->json(['data' => Fresh::all()]);
    }

    public function store(FreshenerRequest $request)
    {
        $data = $request->validated();
        $data['image'] = $request->file('image')->store('images', ['disk' => 'public']);
        $freshener = Freshener::create($data);
        return response()->json(['success' => true, 'data' => $freshener, 'message' => 'Freshener Created Successfully']);

    }
    public function update(FreshenerRequest $request, Freshener $freshener)
    {
        $data = $request->validated();
        if ($request->file('image')) {
            Storage::disk('public')->delete(($freshener->image));
            $data['image'] = $request->file('image')->store('images', ['disk' => 'public']);
        }
        $freshener->update($data);
        return response()->json(['success' => true, 'data' => $freshener, 'message' => 'Freshener Updated Successfully']);
    }
    public function delete(Freshener $freshener)
    {
        Storage::disk('public')->delete(($freshener->image));
        $freshener->delete();
        return response()->json(['success' => true, 'message' => 'Freshener Deleted Successfully']);
    }
}
