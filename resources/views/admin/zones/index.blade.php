@extends('layouts.admin')
@section('content')
<Admins 
title="Zones"
date="{{Carbon\Carbon::now()->format('D, d F')}}"
/>
@endsection
