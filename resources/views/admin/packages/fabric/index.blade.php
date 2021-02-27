@extends('layouts.admin')
@section('content')
<Fabric-Softener
title="Fabric Softener"
date="{{Carbon\Carbon::now()->format('D, d F')}}"
:items="{{ $fabric_items }}"
:categories="{{ $categories }}"
categoryid="category_fabric_id"
addformroute="{{ route('admin.packages.fabric.store') }}"
editformroute="{{ route('admin.packages.fabric.update', 'item_id') }}"
deleteformroute="{{ route('admin.packages.fabric.delete', 'item_id') }}"
/>
@endsection
