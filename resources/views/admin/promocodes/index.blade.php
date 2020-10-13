@extends('layouts.admin')
@section('content')
<Admins 
title="Promocodes"
date="{{Carbon\Carbon::now()->format('D, d F')}}"
/>
@endsection
