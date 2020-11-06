@extends('layouts.admin')
@section('content')
<Laundery-Staff 
title="Laundery Staff"
date="{{Carbon\Carbon::now()->format('D, d F')}}"
:staff= "{{ $staff }}"
showstaffroute="{{ route('admin.employees.laundery_staff.show','staff_id') }}" 
addstaffroute="{{ route('admin.employees.laundery_staff.create') }}" 
/>
@endsection
