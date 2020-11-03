@extends('layouts.admin')
@section('content')
<Add-Zone 
title="Add Zone"
date="{{Carbon\Carbon::now()->format('D, d F')}}"
/>
@endsection
