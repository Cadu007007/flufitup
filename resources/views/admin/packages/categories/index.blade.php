@extends('layouts.admin')
@section('content')
{{-- {{ dd($categories ) }} --}}
{{-- {{ dd(collect($categories->where('type', 'fabric')->toArray()) ) }} --}}

<Categories
title="Categories"
date="{{Carbon\Carbon::now()->format('D, d F')}}"
{{-- :categories="{{ $categories }}" --}}

:detergetscategories="{{ collect($categories->where('type', 'detergent')) }}"
:dryercategories="{{ $categories->where('type', 'dryer') }}"
:fabriccategories="{{ $categories->where('type', 'fabric') }}"
:scentcategories="{{ $categories->where('type', 'scent') }}"

addformroutedetergents="{{ route('admin.packages.category.detergent.store') }}"
editformroutedetergents="{{ route('admin.packages.category.detergent.update','category_id') }}"
deleteformroutedetergents="{{ route('admin.packages.category.detergent.delete','category_id') }}"

addformroutefabric="{{ route('admin.packages.category.fabric.store') }}"
editformroutefabric="{{ route('admin.packages.category.fabric.update','category_id') }}"
deleteformroutefabric="{{ route('admin.packages.category.fabric.delete','category_id') }}"


addformroutedryer="{{ route('admin.packages.category.dryer.store') }}"
editformroutedryer="{{ route('admin.packages.category.dryer.update','category_id') }}"
deleteformroutedryer="{{ route('admin.packages.category.dryer.delete','category_id') }}"


addformroutescent="{{ route('admin.packages.category.scent.store') }}"
editformroutescent="{{ route('admin.packages.category.scent.update','category_id') }}"
deleteformroutescent="{{ route('admin.packages.category.scent.delete','category_id') }}"


/>
@endsection
