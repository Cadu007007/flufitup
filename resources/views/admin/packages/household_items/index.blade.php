@extends('layouts.admin')
@section('content')
<House-Hold-Items
title="Household Items"
date="{{Carbon\Carbon::now()->format('D, d F')}}"
:items="{{$household_items}}"

addformroute="{{ route('admin.packages.households.store') }}"
editformroute="{{ route('admin.packages.households.update', 'item_id') }}"
deleteformroute="{{ route('admin.packages.households.delete', 'item_id') }}"

/>
@endsection
