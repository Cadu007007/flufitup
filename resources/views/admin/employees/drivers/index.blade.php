@extends('layouts.admin')
@section('content')
<Admins 
title="Drivers"
date="{{Carbon\Carbon::now()->format('D, d F')}}"
/>
@endsection
