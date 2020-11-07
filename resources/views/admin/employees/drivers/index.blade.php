@extends('layouts.admin')
@section('content')
<Drivers
title="Drivers"
date="{{Carbon\Carbon::now()->format('D, d F')}}"
:drivers= "{{ $drivers }}"
showdriverroute="{{ route('admin.employees.drivers.show','driver_id') }}" 
adddriverroute="{{ route('admin.employees.drivers.create') }}" 
/>
@endsection
