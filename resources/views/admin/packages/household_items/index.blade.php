@extends('layouts.admin')
@section('content')
<House-Hold-Items
title="Household Items"
date="{{Carbon\Carbon::now()->format('D, d F')}}"
:items="{{$household_items}}"

addformroute="{{ route('admin.household.store') }}"
editformroute="{{ route('admin.household.update', 'item_id') }}"
deleteformroute="{{ route('admin.household.delete', 'item_id') }}"

/>
@endsection
