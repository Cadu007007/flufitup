@extends('layouts.admin')
@section('content')
<Categories
title="Categories"
date="{{Carbon\Carbon::now()->format('D, d F')}}"
:categories="{{ $categories }}"
addformroute="{{ route('dummy') }}"
editformroute="{{ route('dummy') }}"
deleteformroute="{{ route('dummy') }}"
/>
@endsection
