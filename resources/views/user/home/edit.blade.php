
@extends('layouts.user')
@section('content')

<Edit-Order 
class="PageContentContainer"
id="Edit Order" 
date="18/09/2020"
:weekonepickupone="{{ $order->week_one->pickup_one }}"
:weekonepickuptwo="{{ $order->week_one->pickup_two }}"
:weektwopickupone="{{ $order->week_two->pickup_one }}"
:weektwopickuptwo="{{ $order->week_two->pickup_two }}"
:weekthreepickupone="{{ $order->week_three->pickup_one }}"
:weekthreepickuptwo="{{ $order->week_three->pickup_two }}"
:weekfourpickupone="{{ $order->week_three->pickup_one }}"
:weekfourpickuptwo="{{ $order->week_three->pickup_two }}"
/>
@endsection
