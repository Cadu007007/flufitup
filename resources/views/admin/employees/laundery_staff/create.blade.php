@extends('layouts.admin')
@section('content')
<Add-Laundery-Staff 
title="Add Laundery Staff"
date="{{Carbon\Carbon::now()->format('D, d F')}}"
/>
@endsection
