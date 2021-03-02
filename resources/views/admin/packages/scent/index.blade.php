@extends('layouts.admin')
@section('content')
<Scent-Booster
title="Scent Booster"
date="{{Carbon\Carbon::now()->format('D, d F')}}"
:items="{{ $scent_items }}"
:categories="{{ $categories }}"
categoryid="category_scent_id"
addformroute="{{ route('admin.packages.scents.store') }}"
editformroute="{{ route('admin.packages.scents.update', 'item_id') }}"
deleteformroute="{{ route('admin.packages.scents.delete', 'item_id') }}"
/>
@endsection
