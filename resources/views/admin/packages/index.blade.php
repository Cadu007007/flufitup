@extends('layouts.admin')
@section('content')
<Admin-Packages
title="Packages"
date="{{Carbon\Carbon::now()->format('D, d F')}}"
/>
@endsection
