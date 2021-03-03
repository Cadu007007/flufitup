<?php

namespace App\Http\Controllers;

use App\Http\Requests\CityRequest;
use App\Models\City;

class CityController extends Controller
{
    public function index()
    {
        $cities = City::all();
        return view('admin.cities.index', ['active' => 'cities', 'cities' => $cities]);

    }
    public function store(CityRequest $request)
    {

        $city = City::create($request->validated());
        return response()->json(['success' => true, 'data' => $city]);
    }
    public function update(CityRequest $request, $id)
    {
        $city = City::find($id);
        $city->update($request->validated());
        return response()->json(['success' => true, 'data' => $city]);

    }
    public function delete($id)
    {
        $city = City::find($id);
        $city->delete();
        return response()->json(['success' => true]);

    }
}
