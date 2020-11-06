@extends('layouts.admin')
@section('content')
<Edit-Promocode 
title="Edit Promocode"
date="{{Carbon\Carbon::now()->format('D, d F')}}"
:promocode="{{ $promocode }} "
/>
@endsection
