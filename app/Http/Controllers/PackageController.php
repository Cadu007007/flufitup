<?php

namespace App\Http\Controllers;

use App\Models\CategoryDetergent;
use App\Models\CategoryDryer;
use App\Models\CategoryFabric;
use App\Models\CategoryScent;

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
}
