<?php

namespace App\Http\Controllers;

use App\Models\CategoryScent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryScentController extends Controller
{
    public function index()
    {
        return response()->json(['data' => CategoryScent::all()]);
    }

    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'name' => 'required|unique:category_scents,name',
        ]);
        if ($validate->fails()) {
            return response()->json(['errors' => $validate->errors()]);
        }
        CategoryScent::create(['name' => $request->name]);
        return response()->json(['success' => true]);

    }
    public function update(Request $request, CategoryScent $categoryScent)
    {
        $validate = Validator::make($request->all(), [
            'name' => 'required|unique:category_scents,name,' . $categoryScent->id,
        ]);
        if ($validate->fails()) {
            return response()->json(['errors' => $validate->errors()]);

        }
        $categoryScent->update(['name' => $request->name]);
        return response()->json(['success' => true]);
    }
    public function delete(CategoryScent $categoryScent)
    {
        $categoryScent->delete();
        return response()->json(['success' => true]);
    }
}
