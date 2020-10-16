@extends('layouts.admin')
@section('content')

<Sales-Per-Package 
title="Sales Per Package"
date="{{Carbon\Carbon::now()->format('D, d F')}}"
:adhocpackages="{{ $packages->adhoc }}"
:biweeklypackages="{{ $packages->bi_weekly }}"
:monthlypackages="{{ $packages->monthly }}"
:tailoredpackages="{{ $packages->tailored }}"
:users="{{ $users }}"
showuserroute="{{ route('admin.users.show', 'user_id') }}"
/>
@endsection
