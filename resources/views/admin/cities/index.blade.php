@extends('layouts.admin')
@section('content')
<Cities 
title="Cities"
date="{{Carbon\Carbon::now()->format('D, d F')}}"
:cities="{{ $cities }}"
/>
@endsection
