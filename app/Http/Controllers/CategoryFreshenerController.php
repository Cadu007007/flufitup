<?php

namespace App\Http\Controllers;

use App\Models\CategoryFreshener;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryFreshenerController extends Controller
{
    public function index()
    {
        return response()->json(['data' => CategoryFreshener::all()]);
    }

    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'name' => 'required|unique:category_scents,name',
        ]);
        if ($validate->fails()) {
            return response()->json(['errors' => $validate->errors()]);
        }
        $categoryFreshener = CategoryFreshener::create(['name' => $request->name]);
        return response()->json(['success' => true, 'data' => $categoryFreshener, 'message' => 'Category Freshener Created Successfully']);

    }
    public function update(Request $request, CategoryFreshener $categoryFreshener)
    {
        $validate = Validator::make($request->all(), [
            'name' => 'required|unique:category_scents,name,' . $categoryFreshener->id,
        ]);
        if ($validate->fails()) {
            return response()->json(['errors' => $validate->errors()]);

        }
        $categoryFreshener->update(['name' => $request->name]);
        return response()->json(['success' => true, 'data' => $categoryFreshener, 'message' => 'Category Freshener Updated Successfully']);
    }
    public function delete(CategoryFreshener $categoryFreshener)
    {
        $categoryFreshener->fresheners()->delete(); // salah .. was scents
        $categoryFreshener->delete();
        return response()->json(['success' => true, 'message' => 'Category Freshener Deleted Successfully']);
    }
}
