@extends('layouts.admin')
@section('content')
<Show-Laundery-Staff
title="Show Laundery Staff"
date="{{Carbon\Carbon::now()->format('D, d F')}}"
:staff="{{ $staff }}"
editstaffroute="{{ route('admin.employees.laundery_staff.edit','staff_id') }}"
/>
@endsection
