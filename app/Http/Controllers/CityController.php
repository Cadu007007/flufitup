<?php

namespace App\Http\Controllers;

use App\Http\Requests\CityRequest;
use App\Models\City;
use App\Models\Zip;

class CityController extends Controller
{
    public function index()
    {
        $cities = City::all();
        return view('admin.cities.index', ['active' => 'cities', 'cities' => $cities]);

    }
    public function store(CityRequest $request)
    {

        $city = City::create($request->only(['name']));
        foreach ($request->zips as $zip) {

            Zip::create(['code' => $zip, 'city_id']);
        }

        return response()->json(['success' => true, 'data' => $city, 'message' => 'City Created Successfully']);
    }
    public function update(CityRequest $request, $id)
    {
        $city = City::find($id);
        $city->update($request->validated());
        return response()->json(['success' => true, 'data' => $city, 'message' => 'City Updated Successfully']);

    }
    public function delete($id)
    {
        $city = City::find($id);
        $city->delete();
        return response()->json(['success' => true, 'message' => 'City Deleted Successfully']);

    }

//     public function searchCity()
    //     {
    //;
    //     }
}
