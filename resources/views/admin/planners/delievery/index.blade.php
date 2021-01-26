@extends('layouts.admin')
@section('content')
<Delievery-Planner 
title="Delievery Planner"
date="{{Carbon\Carbon::now()->format('D, d F')}}"
:orders = "{{ $orders }}"
:drivers = "{{ $drivers }}"
:selecteddates="{{ $orders_dates }}"
:totalsales = "{{ $total_sales }}"

/>
@endsection
