@extends('layouts.admin')
@section('content')
<Fabric-Softener
title="Fabric Softener"
date="{{Carbon\Carbon::now()->format('D, d F')}}"
:items="{{ $fabric_items }}"
/>
@endsection