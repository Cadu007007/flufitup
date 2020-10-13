@extends('layouts.admin')
@section('content')
<Admins 
title="Laundery Stuff"
date="{{Carbon\Carbon::now()->format('D, d F')}}"
/>
@endsection
