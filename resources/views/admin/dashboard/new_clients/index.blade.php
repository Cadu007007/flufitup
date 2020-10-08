@extends('layouts.admin')
@section('content')

<New-Clients 
title="New Clients"
date="{{Carbon\Carbon::now()->format('D, d F')}}"
showuserroute="{{ route('admin.users.show', 'user_id') }}"
:clients="{{ $clients }}"
/>
@endsection
