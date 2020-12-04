@extends('layouts.admin')
@section('content')
<Admin-Packages
title="Packages"
date="{{Carbon\Carbon::now()->format('D, d F')}}"
:adhocpackages="{{ $packages->adhoc }}"
:biweeklypackages="{{ $packages->bi_weekly }}"
:monthlypackages="{{ $packages->monthly }}"
:tailoredpackages="{{ $packages->tailored }}"
addpackageroute= "{{ route('admin.packages.add') }}"
/>
@endsection
