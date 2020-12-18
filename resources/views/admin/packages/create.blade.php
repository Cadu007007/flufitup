@extends('layouts.admin')
@section('content')
<Create-Package
title="Add Package"
date="{{Carbon\Carbon::now()->format('D, d F')}}"
:addedvalues="{{$added_values}}"
/>
@endsection
