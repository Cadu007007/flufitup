@extends('layouts.admin')
@section('content')

<Cancellation-Requests 
title="Cancellation Requests"
date="{{Carbon\Carbon::now()->format('D, d F')}}"
showuserroute="{{ route('admin.users.show', 'user_id') }}"
:clients="{{ $clients }}"
/>
@endsection
