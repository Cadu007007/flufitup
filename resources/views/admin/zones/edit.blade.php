@extends('layouts.admin')
@section('content')
{{-- {{ dd($zone) }} --}}
{{-- {{ dd($cities) }} --}}
<Edit-Zone 
title="Edit Zone"
date="{{Carbon\Carbon::now()->format('D, d F')}}"
:zone="{{ $zone }}"
updatezoneroute="{{ route('admin.zones.update',$zone->id ) }}"
:cities="{{ $cities }}"
/>
@endsection
