@extends('layouts.admin')
@section('content')

<Dashboard 
title="Dashboard"
date="Tue, 22 September"
:totalclients="{{ $state_numbers->total_clients }}"
:newclients="{{ $state_numbers->new_clients }}"
:salespermonth="{{ $state_numbers->sales_per_month }}"
:salesperpackage="{{ $state_numbers->sales_per_package }}"
:userspercity="{{ $state_numbers->users_per_city }}"
:cancelledorders="{{ $state_numbers->cancelled_orders }}"
/>
@endsection
