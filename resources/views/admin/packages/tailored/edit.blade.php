@extends('layouts.admin')
@section('content')
<Edit-Tailored-Package
title="Edit Tailored Package"
date="{{Carbon\Carbon::now()->format('D, d F')}}"
:questions="{{$questions}}"
/>
@endsection
