@extends('layouts.admin')
@section('content')
<Freshener
title="Freshener"
date="{{Carbon\Carbon::now()->format('D, d F')}}"
:items="{{ $scent_items }}"
:categories="{{ $categories }}"
categoryid="category_freshener_id"
addformroute="{{ route('admin.packages.freshener.store') }}"
editformroute="{{ route('admin.packages.freshener.update', 'item_id') }}"
deleteformroute="{{ route('admin.packages.freshener.delete', 'item_id') }}"
imageasset="{{ asset("storage/image_path") }}"

/>
@endsection
