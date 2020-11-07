@extends('layouts.admin')
@section('content')
<Show-Driver
title="Show Driver"
date="{{Carbon\Carbon::now()->format('D, d F')}}"
:driver="{{ $driver }}"
editdriverroute="{{ route('admin.employees.drivers.edit','driver_id') }}"
/>
@endsection
