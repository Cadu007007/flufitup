@extends('layouts.admin')
@section('content')

<Users-Per-City 
title="Sales Per City"
date="{{Carbon\Carbon::now()->format('D, d F')}}"
:cities="{{ $cities }}"
:users="{{ $users }}"
showuserroute="{{ route('admin.users.show', 'user_id') }}"
/>
@endsection
