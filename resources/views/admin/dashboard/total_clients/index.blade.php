@extends('layouts.admin')
@section('content')

<Total-Clients 
title="Total Clients"
date="{{Carbon\Carbon::now()->format('D, d F')}}"
showuserroute="{{ route('admin.users.show', 'user_id') }}"
:clients="{{ $clients }}"
/>
@endsection
