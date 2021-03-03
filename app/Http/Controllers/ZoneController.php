<?php

namespace App\Http\Controllers;

use App\Http\Requests\ZoneRequest;
use App\Models\Zone;
use App\Models\ZoneCity;

class ZoneController extends Controller
{
    public function index()
    {

    }
    public function store(ZoneRequest $request)
    {
        // return $request->cities;
        $zone = Zone::create($request->except(['cities']));
        foreach ($request->cities as $city) {

            ZoneCity::create(['zone_id' => $zone->id, 'city_id' => $city]);
        }
        return ($request);
    }
}
