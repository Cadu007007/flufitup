@extends('layouts.admin')
@section('content')
<Dryer-Sheets
title="Dryer Sheets"
date="{{Carbon\Carbon::now()->format('D, d F')}}"
:items="{{ $dryer_items }}"
:categories="{{ $categories }}"
categoryid="category_dryer_id"
addformroute="{{ route('admin.packages.dryers.store') }}"
editformroute="{{ route('admin.packages.dryers.update', 'item_id') }}"
deleteformroute="{{ route('admin.packages.dryers.delete', 'item_id') }}"
imageasset="{{ asset("storage/image_path") }}"

/>
@endsection
