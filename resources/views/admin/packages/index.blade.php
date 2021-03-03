@extends('layouts.admin')
@section('content')
{{-- {{ dd($packages)}} --}}
<Admin-Packages
title="Packages"
date="{{Carbon\Carbon::now()->format('D, d F')}}"
:adhocpackages="{{ @$packages ['adhoc']}}"
:biweeklypackages="{{ @$packages['bi_weekly'] }}"
:monthlypackages="{{ @$packages['monthly'] }}"
{{-- :tailoredpackages="{{ [] }}" --}}
addpackageroute= "{{ route('admin.packages.add') }}"
showpackageroute="{{route('admin.packages.show','package_id')}}"
addtailoredpackageroute= "{{ route('admin.packages.tailored.create') }}"
edittailoredpackageroute= "{{ route('admin.packages.tailored.edit', 'package_id') }}"
/>
@endsection
