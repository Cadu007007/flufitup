@extends('layouts.admin')
@section('content')
<Pickup-Planner 
title="Pickup Planner"
date="{{Carbon\Carbon::now()->format('D, d F')}}"
:orders = "{{ $orders }}"
:drivers = "{{ $drivers }}"
/>
@endsection
