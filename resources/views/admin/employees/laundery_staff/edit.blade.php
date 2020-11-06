@extends('layouts.admin')
@section('content')
<Edit-Laundery-Staff
title="Edit Laundery Staff"
date="{{Carbon\Carbon::now()->format('D, d F')}}"
:staff="{{ $staff }}"
/>
@endsection
