@extends('layouts.admin')
@section('content')
<Edit-Zone 
title="Edit Zone"
date="{{Carbon\Carbon::now()->format('D, d F')}}"
/>
@endsection
