@extends('layouts.admin')
@section('content')
<Detergents
title="Detergents"
date="{{Carbon\Carbon::now()->format('D, d F')}}"
:items="{{$detergents_items}}"
/>
@endsection
