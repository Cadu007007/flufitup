@extends('layouts.admin')
@section('content')
<Reports 
title="Reports"
date="{{Carbon\Carbon::now()->format('D, d F')}}"
/>
@endsection
