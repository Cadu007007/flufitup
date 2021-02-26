@extends('layouts.admin')
@section('content')
<Detergents
title="Detergents"
date="{{Carbon\Carbon::now()->format('D, d F')}}"
:items="{{$detergents_items}}"
addformroute="{{ route('dummy') }}"
editformroute="{{ route('dummy') }}"
deleteformroute="{{ route('dummy') }}"
/>
@endsection
