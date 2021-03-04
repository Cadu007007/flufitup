@extends('layouts.admin')
@section('content')
{{-- {{ dd(@$packages['adhoc'] == null) }} --}}
<p class="d-none">
    {{ $dummy = collect()}}
</p>
<Admin-Packages
title="Packages"
date="{{Carbon\Carbon::now()->format('D, d F')}}"
:adhocpackages="{{ @$packages['adhoc'] == null ? $dummy :  @$packages['adhoc']}}"
:biweeklypackages="{{ @$packages['bi_weekly'] == null ? $dummy :  @$packages['bi_weekly']}}"
:monthlypackages="{{ @$packages['monthly'] == null ? $dummy :  @$packages['monthly']}}"
{{-- :tailoredpackages="{{ [] }}" --}}
addpackageroute= "{{ route('admin.packages.add') }}"
showpackageroute="{{route('admin.packages.show','package_id')}}"
addtailoredpackageroute= "{{ route('admin.packages.tailored.create') }}"
edittailoredpackageroute= "{{ route('admin.packages.tailored.edit', 'package_id') }}"
/>
@endsection
