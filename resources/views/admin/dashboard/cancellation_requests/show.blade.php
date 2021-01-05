@extends('layouts.admin')
@section('content')

<Show-Cancellation-Request 
:user="{{ $user }}"
/>
@endsection
