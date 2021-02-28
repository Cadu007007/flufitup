<?php

namespace App\Http\Controllers;

use App\Models\CategoryDetergent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryDetergentController extends Controller
{
    public function index()
    {
        return response()->json(['data' => CategoryDetergent::all()]);
    }

    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'name' => 'required|unique:category_detergents,name',
        ]);
        if ($validate->fails()) {
            return response()->json(['errors' => $validate->errors()]);
        }
        $category = CategoryDetergent::create(['name' => $request->name]);
        return response()->json(['success' => true, 'data' => category]);

    }
    public function update(Request $request, CategoryDetergent $categoryDetergent)
    {
        $validate = Validator::make($request->all(), [
            'name' => 'required|unique:category_detergents,name,' . $categoryDetergent->id,
        ]);
        if ($validate->fails()) {
            return response()->json(['errors' => $validate->errors()]);

        }
        $categoryDetergent->update(['name' => $request->name]);
        return response()->json(['success' => true, 'data' => $categoryDetergent]);
    }
    public function delete(CategoryDetergent $categoryDetergent)
    {
        $categoryDetergent->delete();
        return response()->json(['success' => true, 'data' => $categoryDetergent]);
    }
}
