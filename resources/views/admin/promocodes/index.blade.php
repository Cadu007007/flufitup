@extends('layouts.admin')
@section('content')
<Promocodes 
title="Promocodes"
date="{{Carbon\Carbon::now()->format('D, d F')}}"
:promocodes="{{ $promocodes }}"
editpromocoderoute="{{ route('admin.promocodes.edit','promocode_id') }}"
addpromocoderoute="{{ route('admin.promocodes.add') }} "
/>
@endsection
