@extends('layouts.admin')
@section('content')
<Add-Promocode 
title="Add Promocode"
date="{{Carbon\Carbon::now()->format('D, d F')}}"
/>
@endsection
