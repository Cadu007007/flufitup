@extends('layouts.admin')
@section('content')
<Cities 
title="Cities"
date="{{Carbon\Carbon::now()->format('D, d F')}}"
:cities="{{ $cities }}"
addcityroute="{{ route('admin.cities.store') }}"
editcityroute="{{ route('admin.cities.update', 'city_id') }}"
deletecityroute="{{ route('admin.cities.delete', 'city_id') }}"
/>
@endsection
