@extends('layouts.admin')
@section('content')
<Admins 
title="Admins"
date="{{Carbon\Carbon::now()->format('D, d F')}}"
:superadmin="{{ $superadmin }}"
:admins="{{ $admins }}"
/>
@endsection
