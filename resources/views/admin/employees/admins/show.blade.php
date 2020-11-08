@extends('layouts.admin')
@section('content')
<Show-Admin 
title="Admins"
date="{{Carbon\Carbon::now()->format('D, d F')}}"
:admin="{{ $admin }}"
editadminroute="{{ route('admin.employees.admins.edit','admin_id') }}"
superadmin="{{ $is_superadmin }}"
/>
@endsection
