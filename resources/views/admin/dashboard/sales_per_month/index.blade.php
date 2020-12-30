@extends('layouts.admin')
@section('content')

<Sales-Per-Month 
title="Sales Per Month"
date="{{Carbon\Carbon::now()->format('D, d F')}}"
:selecteddates="{{ $orders_dates }}"
:totalsales = "{{ $total_sales }}"
/>
@endsection
