@extends('layouts.admin')
@section('content')
<Detergents
title="Detergents"
date="{{Carbon\Carbon::now()->format('D, d F')}}"
:items="{{$detergents_items}}"
:categories="{{ $categories }}"
addformroute="{{ route('admin.detergent.store') }}"
editformroute="{{ route('admin.detergent.update', 'item_id') }}"
deleteformroute="{{ route('admin.detergent.delete', 'item_id') }}"
/>
@endsection
