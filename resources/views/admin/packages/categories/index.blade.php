@extends('layouts.admin')
@section('content')
<Categories
title="Categories"
date="{{Carbon\Carbon::now()->format('D, d F')}}"
:categories="{{ $categories }}"
/>
@endsection
