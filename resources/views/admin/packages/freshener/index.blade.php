@extends('layouts.admin')
@section('content')
{{-- {{ dd($freshener_items) }} --}}
<Freshener
title="Freshener"
date="{{Carbon\Carbon::now()->format('D, d F')}}"
:items="{{ $freshener_items }}"
:categories="{{ $categories }}"
categoryid="category_freshener_id"
addformroute="{{ route('admin.packages.fresheners.store') }}"
editformroute="{{ route('admin.packages.fresheners.update', 'item_id') }}"
deleteformroute="{{ route('admin.packages.fresheners.delete', 'item_id') }}"
imageasset="{{ asset("storage/image_path") }}"

/>
@endsection
