<?php

namespace App\Http\Controllers;

use App\Models\CategoryDryer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryDryerController extends Controller
{
    public function index()
    {
        return response()->json(['data' => CategoryDryer::all()]);
    }

    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'name' => 'required|unique:category_dryers,name',
        ]);
        if ($validate->fails()) {
            return response()->json(['errors' => $validate->errors()]);
        }
        $categoryDryer = CategoryDryer::create(['name' => $request->name]);
        return response()->json(['success' => true, 'data' => $categoryDryer, 'message' => 'Category Dryer Created Successfully']);

    }
    public function update(Request $request, CategoryDryer $categoryDryer)
    {
        $validate = Validator::make($request->all(), [
            'name' => 'required|unique:category_dryers,name,' . $categoryDryer->id,
        ]);
        if ($validate->fails()) {
            return response()->json(['errors' => $validate->errors()]);

        }
        $categoryDryer->update(['name' => $request->name]);
        return response()->json(['success' => true, 'data' => $categoryDryer, 'message' => 'Category Dryer Updated Successfully']);
    }
    public function delete(CategoryDryer $categoryDryer)
    {
        $categoryDryer->dryers()->delete();
        $categoryDryer->delete();
        return response()->json(['success' => true, 'message' => 'Category Dryer Deleted Successfully']);
    }
}
