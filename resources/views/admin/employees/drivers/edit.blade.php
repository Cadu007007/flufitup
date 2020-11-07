@extends('layouts.admin')
@section('content')
<Edit-Driver
title="Edit Driver"
date="{{Carbon\Carbon::now()->format('D, d F')}}"
:driver="{{ $driver }}"
/>
@endsection
