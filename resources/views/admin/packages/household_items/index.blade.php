@extends('layouts.admin')
@section('content')
<Reports
title="Household Items"
date="{{Carbon\Carbon::now()->format('D, d F')}}"
/>
@endsection
