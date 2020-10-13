@extends('layouts.admin')
@section('content')
<Reports 
title="Delievery Planner"
date="{{Carbon\Carbon::now()->format('D, d F')}}"
/>
@endsection
