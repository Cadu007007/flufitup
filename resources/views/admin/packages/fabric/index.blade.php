@extends('layouts.admin')
@section('content')
<Fabric-Softener
title="Fabric Softener"
date="{{Carbon\Carbon::now()->format('D, d F')}}"
:items="{{ $fabric_items }}"
:categories="{{ $categories }}"
addformroute="{{ route('admin.fabric.store') }}"
editformroute="{{ route('admin.fabric.update', 'item_id') }}"
deleteformroute="{{ route('admin.fabric.delete', 'item_id') }}"
/>
@endsection
