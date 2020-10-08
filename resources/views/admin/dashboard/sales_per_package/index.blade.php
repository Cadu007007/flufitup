@extends('layouts.admin')
@section('content')

<Sales-Per-Package 
title="Sales Per Package"
date="{{Carbon\Carbon::now()->format('D, d F')}}"
/>
@endsection
