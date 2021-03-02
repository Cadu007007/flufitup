<?php

namespace App\Http\Controllers;

use App\Http\Requests\PackageRequest;
use App\Models\CategoryDetergent;
use App\Models\CategoryDryer;
use App\Models\CategoryFabric;
use App\Models\CategoryScent;
use App\Models\Detergent;
use App\Models\Dryer;
use App\Models\Fabric;
use App\Models\Package;
use App\Models\Scent;

class PackageController extends Controller
{
    public function allPackages()
    {
        $categoryDetergents = CategoryDetergent::all()->each(function ($cat) {
            $cat->type = 'detergent';
        });
        // dd($categoryDetergents);
        $categoryDryer = CategoryDryer::all()->each(function ($cat) {
            $cat->type = 'dryer';
        });
        $categoryFabrics = CategoryFabric::all()->each(function ($cat) {
            $cat->type = 'fabric';
        });
        $categoryScents = CategoryScent::all()->each(function ($cat) {
            $cat->type = 'scent';
        });
        $categories = $categoryDetergents->concat($categoryDryer)->concat($categoryFabrics)
            ->concat($categoryScents);
        return view('admin.packages.categories.index', ['active' => 'categories', 'categories' => $categories]);

    }

    public function create()
    {

        $fabrics = Fabric::all();
        $detergents = Detergent::all();
        $scents = Scent::all();
        $dryers = Dryer::all();
        return view('admin.packages.create', ['active' => 'packages', 'fabrics' => $fabrics,
            'detergents' => $detergents, 'scents' => $scents, 'dryers' => $dryers]);

    }
    public function store(PackageRequest $request)
    {
        $package = Package::created($request->validated());
        return response()->json(['success' => true, 'data' => $package]);
    }
    public function index()
    {
        dd(Package::all());
        $packages = Package::all()->groupBy('category');
        return view('admin.packages.index', ['active' => 'packages', 'packages' => $packages]);

        return response()->json(['data' => Package::all()]);

    }
    public function show($id)
    {
        return response()->json(['data' => Package::find($id)]);
    }
}
