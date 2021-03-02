@extends('layouts.admin')
@section('content')
<Fabric-Softener
title="Fabric Softener"
date="{{Carbon\Carbon::now()->format('D, d F')}}"
:items="{{ $fabric_items }}"
:categories="{{ $categories }}"
categoryid="category_fabric_id"
addformroute="{{ route('admin.packages.fabrics.store') }}"
editformroute="{{ route('admin.packages.fabrics.update', 'item_id') }}"
deleteformroute="{{ route('admin.packages.fabrics.delete', 'item_id') }}"
/>
@endsection
