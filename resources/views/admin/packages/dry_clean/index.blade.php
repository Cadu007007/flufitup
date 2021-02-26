@extends('layouts.admin')
@section('content')
<Dry-Clean
title="Dry Clean"
date="{{Carbon\Carbon::now()->format('D, d F')}}"
:items="{{$dry_clean_items}}"
addformroute="/dummy"
editformroute="/dummy"
deleteformroute="{{ route('dummy') }}"
/>
@endsection
