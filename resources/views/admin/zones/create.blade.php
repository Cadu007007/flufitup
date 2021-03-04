@extends('layouts.admin')
@section('content')
<Add-Zone 
title="Add Zone"
date="{{Carbon\Carbon::now()->format('D, d F')}}"
addzoneroute="{{ route('admin.zones.store') }}"
:cities="{{ $cities }}"
/>
@endsection
