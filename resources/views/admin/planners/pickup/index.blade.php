@extends('layouts.admin')
@section('content')
<Reports 
title="Pickup Planner"
date="{{Carbon\Carbon::now()->format('D, d F')}}"
/>
@endsection
