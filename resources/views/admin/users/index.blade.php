@extends('layouts.admin')
@section('content')
<Users 
title="Users"
date="{{Carbon\Carbon::now()->format('D, d F')}}"
showuserroute="{{ route('admin.users.show', 'user_id') }}"
:users="{{ $users }}"
/>
@endsection
