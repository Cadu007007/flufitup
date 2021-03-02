@extends('layouts.admin')
@section('content')
<Dry-Clean
title="Dry Clean"
date="{{Carbon\Carbon::now()->format('D, d F')}}"
:items="{{$dry_clean_items}}"
addformroute="{{ route('admin.packages.dry.cleans.store') }}"
editformroute="{{ route('admin.packages.dry.cleans.update', 'item_id') }}"
deleteformroute="{{ route('admin.packages.dry.cleans.delete', 'item_id') }}"
/>
@endsection
