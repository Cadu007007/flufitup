@extends('layouts.admin')
@section('content')
<Scent-Booster
title="Scent Booster"
date="{{Carbon\Carbon::now()->format('D, d F')}}"
:items="{{ $scent_items }}"
/>
@endsection
