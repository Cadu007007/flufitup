@extends('layouts.admin')
@section('content')
<Dryer-Sheets
title="Dryer Sheets"
date="{{Carbon\Carbon::now()->format('D, d F')}}"
:items="{{ $dryer_items }}"
/>
@endsection
