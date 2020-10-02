@extends('layouts.admin')
@section('content')

<Show-User 
:user="{{ $user }}"
/>
@endsection
