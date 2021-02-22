@extends('layouts.admin')
@section('content')
<House-Hold-Items
title="Household Items"
date="{{Carbon\Carbon::now()->format('D, d F')}}"
:items="{{$household_items}}"
editformroute="{{ route('dummy') }}"
/>
@endsection
