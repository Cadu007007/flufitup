@extends('layouts.admin')
@section('content')
{{-- {{ dd($detergents_items) }} --}}
<Detergents
title="Detergents"
date="{{Carbon\Carbon::now()->format('D, d F')}}"
:items="{{$detergents_items}}"
:categories="{{ $categories }}"
categoryid="category_detergents_id"
addformroute="{{ route('admin.packages.detergents.store') }}"
editformroute="{{ route('admin.packages.detergents.update', 'item_id') }}"
deleteformroute="{{ route('admin.packages.detergents.delete', 'item_id') }}"
/>
@endsection
