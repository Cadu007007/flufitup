@extends('layouts.admin')
@section('content')

<Show-User 
:user="{{ $user }}"
editwalletroute="{{ route('admin.users') }}"
/>
@endsection
