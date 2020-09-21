@extends('layouts.user')
@section('content')

<Old-Order-Details
class="PageContentContainer" 
id="OldOrderDetails" 
date="18/09/2020"
:order="{{ $order }}"
feedbackactionroute="{{ route('dummy') }}"
/>

@endsection
