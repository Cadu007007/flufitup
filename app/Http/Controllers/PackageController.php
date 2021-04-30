<?php

namespace App\Http\Controllers;

use App\Http\Requests\PackageRequest;
use App\Http\Requests\PackageUpdateRequest;
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

        return view('admin.packages.categories.index', ['active' => 'categories', 'categoryDetergents' => $categoryDetergents, 'categoryDryer' => $categoryDryer, 'categoryFabrics' => $categoryFabrics, 'categoryScents' => $categoryScents]);

    }

    public function create()
    {

        $fabrics = Fabric::all();
        $detergents = Detergent::all();
        $scents = Scent::all();
        $dryers = Dryer::all();
        // dd('dd');
        return view('admin.packages.create', ['active' => 'packages', 'fabrics' => $fabrics,
            'detergents' => $detergents, 'scents' => $scents, 'dryers' => $dryers]);

    }
    public function store(PackageRequest $request)
    {
        $package = Package::create($request->validated());
        return response()->json(['success' => true, 'data' => $package, 'message' => 'Package Created Successfully']);
    }
    public function edit($id)
    {
        $package = Package::find($id);
        $fabrics = Fabric::all();
        $detergents = Detergent::all();
        $scents = Scent::all();
        $dryers = Dryer::all();
        return view('admin.packages.edit', ['active' => 'packages', 'package' => $package, 'fabrics' => $fabrics,
            'detergents' => $detergents, 'scents' => $scents, 'dryers' => $dryers]);

    }
    public function update(PackageUpdateRequest $request, $package)
    {

        $package = Package::find($package);
        $package->update($request->validated());
        return response()->json(['success' => true, 'data' => $package, 'message' => 'Package Updated Successfully']);
    }
    public function index()
    {
        // dd(Package::all());
        $packages = Package::all()->groupBy('category');
        // dd($packages);
        return view('admin.packages.index', ['active' => 'packages', 'packages' => $packages]);

        return response()->json(['data' => Package::all()]);

    }
    public function destroy($id)
    {
        $package = Package::findOrFail($id);
        $package->delete();
        return response()->json(['success' => true, 'message' => 'Package Deleted Successfully']);
    }
    public function show($id)
    {
        $package = Package::find($id);
        return view('admin.packages.show', ['active' => 'packages', 'package' => $package]);

        return response()->json(['data' => Package::find($id)]);
    }

    public function userCreate()
    {
        $fabrics = Fabric::all();
        $detergents = Detergent::all();
        $scents = Scent::all();
        $dryers = Dryer::all();
        // dd('dd');
        return view('user.packages.create', ['active' => 'packages', 'fabrics' => $fabrics,
            'detergents' => $detergents, 'scents' => $scents, 'dryers' => $dryers]);

    }
}
