@extends('layouts.admin')
@section('content')
<Add-Driver 
title="Add New Driver"
date="{{Carbon\Carbon::now()->format('D, d F')}}"
/>
@endsection
