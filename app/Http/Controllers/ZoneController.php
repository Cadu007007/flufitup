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
        $zones = Zone::with('cities')->get();
        return view('admin.zones.index', ['active' => 'zones', 'zones' => $zones]);
    }
    public function create()
    {
        return view('admin.zones.create', ['active' => 'zones', 'cities' => City::all()]);

    }
    public function store(ZoneRequest $request)
    {
        // return $request->cities;
        $zone = Zone::create($request->except(['cities']));
        foreach ($request->cities as $city) {

            ZoneCity::create(['zone_id' => $zone->id, 'city_id' => $city]);
        }
        return response()->json(['success' => true, 'data' => $zone]);
        return ($request);
    }
    public function edit($id)
    {
        $zone = Zone::find($id);
        $cities = City::all();
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
        return response()->json(['success' => true, 'data' => $zone]);

    }
    public function delete($id)
    {
        Zone::find($id)->delete();
        ZoneCity::where('zone_id', $id)->delete();
        return response()->json(['success' => true]);
    }
}
