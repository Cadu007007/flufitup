@extends('layouts.admin')
@section('content')
<Admin-Packages
title="Packages"
date="{{Carbon\Carbon::now()->format('D, d F')}}"
:adhocpackages="{{ @$packages }}"
:biweeklypackages="{{ @$packages }}"
:monthlypackages="{{ @$packages }}"
:tailoredpackages="{{ @$packages }}"
addpackageroute= "{{ route('admin.packages.add') }}"
showpackageroute="{{route('admin.packages.show','package_id')}}"
addtailoredpackageroute= "{{ route('admin.packages.tailored.create') }}"
edittailoredpackageroute= "{{ route('admin.packages.tailored.edit', 'package_id') }}"
/>
@endsection
