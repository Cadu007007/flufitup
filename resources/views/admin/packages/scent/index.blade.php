@extends('layouts.admin')
@section('content')
<Scent-Booster
title="Scent Booster"
date="{{Carbon\Carbon::now()->format('D, d F')}}"
:items="{{ $scent_items }}"
:categories="{{ $categories }}"
categoryid="category_scent_id"
addformroute="{{ route('admin.packages.scent.store') }}"
editformroute="{{ route('admin.packages.scent.update', 'item_id') }}"
deleteformroute="{{ route('admin.packages.scent.delete', 'item_id') }}"
/>
@endsection
