@extends('layouts.admin')
@section('content')
{{ dd($package) }}
<Edit-Package
title="Edit Package"
date="{{Carbon\Carbon::now()->format('D, d F')}}"
:addedvalues="{{$added_values}}"
:package="{{$package}}"
updatepackageroute="{{ route('admin.packages.update', 'package_id') }}"
/>
@endsection
