<?php

namespace App\Http\Controllers;

use App\Http\Requests\ZoneRequest;
use App\Models\City;
use App\Models\Zone;
use App\Models\ZoneCity;

class ZoneController extends Controller
{
    public function index()
    {
        $zones = Zone::with('cities')->get()->each(function ($zone) {
            $zone->cities = $zone->cities;
        });
        return view('admin.zones.index', ['active' => 'zones', 'zones' => $zones]);
    }
    public function create()
    {
        // $cities = City::whereDoesntHave('zones')->get();
        // dd($cities);
        return view('admin.zones.create', ['active' => 'zones', 'cities' => City::whereDoesntHave('zones')->get()]);

    }
    public function store(ZoneRequest $request)
    {
        // return $request->cities;
        $zone = Zone::create($request->except(['cities']));
        foreach ($request->cities as $city) {

            ZoneCity::create(['zone_id' => $zone->id, 'city_id' => $city]);
        }
        return response()->json(['success' => true, 'data' => $zone, 'message' => 'Zone Created Successfully']);
        return ($request);
    }
    public function edit($id)
    {
        $zone = Zone::find($id);
        $zone->cities = $zone->cities;
        $cities = City::whereDoesntHave('zones')->get();
        // dd($zone);
        return view('admin.zones.edit', ['active' => 'zones', 'zone' => $zone, 'cities' => $cities]);

    }
    public function update(ZoneRequest $request, $id)
    {
        $zone = Zone::find($id);
        $zone->update($request->except(['cities']));
        ZoneCity::where('zone_id', $id)->delete();
        foreach ($request->cities as $city) {

            ZoneCity::create(['zone_id' => $id, 'city_id' => $city]);
        }
        return response()->json(['success' => true, 'data' => $zone, 'message' => 'Zone Updated Successfully']);

    }
    public function delete($id)
    {
        Zone::find($id)->delete();
        ZoneCity::where('zone_id', $id)->delete();
        return response()->json(['success' => true, 'message' => 'Zone Deleted Successfully']);
    }
}
