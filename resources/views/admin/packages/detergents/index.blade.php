@extends('layouts.admin')
@section('content')
<Reports
title="Detergents"
date="{{Carbon\Carbon::now()->format('D, d F')}}"
/>
@endsection
