@extends('layouts.admin')
@section('content')

<Dashboard 
title="Dashboard"
date="{{Carbon\Carbon::now()->format('D, d F')}}"
:totalclients="{{ $state_numbers->total_clients }}"
totalclientsroute="{{ route('admin.users') }}"
:newclients="{{ $state_numbers->new_clients }}"
newclientsroute="{{ route('admin.dashboard.new_clients') }}"
:salespermonth="{{ $state_numbers->sales_per_month }}"
salespermonthroute="{{ route('admin.dashboard.sales_per_month') }}"
:salesperpackage="{{ $state_numbers->sales_per_package }}"
salesperpackageroute="{{ route('admin.dashboard.sales_per_package') }}"
:salespercity="{{ $state_numbers->users_per_city }}"
userspercityroute="{{ route('admin.dashboard.users_per_city') }}"
:cancellationrequests="{{ $state_numbers->cancellation_requests }}"
cancellationrequestsroute="{{ route('admin.dashboard.cancellation_requests') }}"
:ordersnumber="{{ $state_numbers->orders_number_per_day }}"
:pickupsrange="{{ $state_numbers->pickups_range }}"
:pickups="{{ $pickups_number }}"
/>
@endsection
