@extends('layouts.admin')
@section('content')
{{-- {{ dd($package) }} --}}
<Show-Package
title="Show Package"
date="{{Carbon\Carbon::now()->format('D, d F')}}"
:package="{{ $package }}"
editpackageroute="{{ route('admin.packages.edit', 'package_id') }}"
/>
@endsection
