@extends('layouts.admin')
@section('content')
<Zones 
title="Zones"
date="{{Carbon\Carbon::now()->format('D, d F')}}"
:zones="{{ $zones }}"
addzoneroute="{{ route('admin.zones.add') }} "
editzoneroute="{{ route('admin.zones.edit', 'zone_id') }} "
deletezoneroute="{{ route('admin.zones.delete', 'zone_id') }} "
/>
@endsection
