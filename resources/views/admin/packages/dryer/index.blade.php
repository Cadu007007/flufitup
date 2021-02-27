@extends('layouts.admin')
@section('content')
<Dryer-Sheets
title="Dryer Sheets"
date="{{Carbon\Carbon::now()->format('D, d F')}}"
:items="{{ $dryer_items }}"
:categories="{{ $categories }}"
categoryid="category_dryer_id"
addformroute="{{ route('admin.packages.dryer.store') }}"
editformroute="{{ route('admin.packages.dryer.update', 'item_id') }}"
deleteformroute="{{ route('admin.packages.dryer.delete', 'item_id') }}"
/>
@endsection
