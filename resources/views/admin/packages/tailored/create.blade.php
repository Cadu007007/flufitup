@extends('layouts.admin')
@section('content')
<Create-Tailored-Package
title="Create Tailored Package"
date="{{Carbon\Carbon::now()->format('D, d F')}}"
/>
@endsection
