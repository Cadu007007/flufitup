@extends('layouts.admin')
@section('content')
<Admins 
title="Admins"
date="{{Carbon\Carbon::now()->format('D, d F')}}"
/>
@endsection
