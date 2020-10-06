@extends('layouts.user')
@section('content')
<Home class="PageContentContainer"
 id="Home" 
date="{{Carbon\Carbon::now()->format('d/m/Y')}}"
 :orders="{{ $orders }}"
 editorderroute="{{ route('order.edit', 'order_id') }}"
 />
@endsection
