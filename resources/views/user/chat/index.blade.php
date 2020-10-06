@extends('layouts.user')
@section('content')
<Chat class="PageContentContainer" id="Chat"
date="{{Carbon\Carbon::now()->format('d/m/Y')}}"
:user = "{{ $user }}"
/>


@endsection
