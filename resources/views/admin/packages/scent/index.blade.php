@extends('layouts.admin')
@section('content')
<Scent-Booster
title="Scent Booster"
date="{{Carbon\Carbon::now()->format('D, d F')}}"
:items="{{ $scent_items }}"
:categories="{{ $categories }}"
addformroute="{{ route('admin.scent.store') }}"
editformroute="{{ route('admin.scent.update', 'item_id') }}"
deleteformroute="{{ route('admin.scent.delete', 'item_id') }}"
/>
@endsection
