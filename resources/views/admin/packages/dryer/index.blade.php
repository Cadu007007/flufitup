@extends('layouts.admin')
@section('content')
<Dryer-Sheets
title="Dryer Sheets"
date="{{Carbon\Carbon::now()->format('D, d F')}}"
:items="{{ $dryer_items }}"
:categories="{{ $categories }}"
addformroute="{{ route('admin.dryer.store') }}"
editformroute="{{ route('admin.dryer.update', 'item_id') }}"
deleteformroute="{{ route('admin.dryer.delete', 'item_id') }}"
/>
@endsection
