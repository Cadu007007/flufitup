@extends('layouts.admin')
@section('content')

<Cancelled-Orders 
title="Cancelled Orders"
date="{{Carbon\Carbon::now()->format('D, d F')}}"
showuserroute="{{ route('admin.users.show', 'user_id') }}"
:clients="{{ $clients }}"
/>
@endsection
