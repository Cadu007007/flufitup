@extends('layouts.admin')
@section('content')
<Users 
title="Users"
date="Tue, 22 September"
showuserroute="{{ route('admin.users.show', 'user_id') }}"
:users="{{ $users }}"
/>
@endsection
