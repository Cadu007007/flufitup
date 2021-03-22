@extends('layouts.user')
@section('content')
{{-- {{dd($user[0])}} --}}
{{-- {{ $messages ?? '' }} --}}
<Profile-Edit 
class="PageContentContainer" 
id="ProfileEdit" 
date="{{Carbon\Carbon::now()->format('d/m/Y')}}"
formactionroute="{{ route('profile.update') }}"
{{-- profileimage="{{ (auth()->user()->avatar) ? asset(auth()->user()->avatar) : asset('images/icons/profile.svg') }}" --}}
:user="{{ $user }}"

/>

@endsection
