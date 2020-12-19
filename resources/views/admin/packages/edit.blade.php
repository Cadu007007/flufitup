@extends('layouts.admin')
@section('content')
<Edit-Package
title="Edit Package"
date="{{Carbon\Carbon::now()->format('D, d F')}}"
:addedvalues="{{$added_values}}"
:thepackage="{{$package}}"
/>
@endsection
