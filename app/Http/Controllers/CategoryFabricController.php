<?php

namespace App\Http\Controllers;

use App\Models\CategoryFabric;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryFabricController extends Controller
{
    public function index()
    {
        return response()->json(['data' => CategoryFabric::all()]);
    }

    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'name' => 'required|unique:category_fabrics,name',
        ]);
        if ($validate->fails()) {
            return response()->json(['errors' => $validate->errors()]);
        }
        $categoryFabric = CategoryFabric::create(['name' => $request->name]);
        return response()->json(['success' => true, 'data' => $categoryFabric]);

    }
    public function update(Request $request, CategoryFabric $categoryFabric)
    {
        $validate = Validator::make($request->all(), [
            'name' => 'required|unique:category_fabrics,name,' . $categoryFabric->id,
        ]);
        if ($validate->fails()) {
            return response()->json(['errors' => $validate->errors()]);

        }
        $categoryFabric->update(['name' => $request->name]);
        return response()->json(['success' => true, 'data' => $categoryFabric]);
    }
    public function delete(CategoryFabric $categoryFabric)
    {
        $categoryFabric->fabrics()->delete();
        $categoryFabric->delete();
        return response()->json(['success' => true]);
    }
}
