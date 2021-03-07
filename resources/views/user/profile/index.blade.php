@extends('layouts.user')
@section('content')
<Profile 
class="PageContentContainer" 
id="Profile" 
name="{{ 'Salah' }}"
lastlogin="Last Login : 08 / 25 / 2020, 09:35:21 PM"
profileimage="{{ asset('images/icons/profile.svg') }}"
email="{{ auth()->user()->email }}"
{{-- emailstatus="{{  $test=0 }}" --}}
phone="{{  auth()->user()->phone }}"
{{-- phonestatus="{{  $test=1 }}" --}}
address="{{  auth()->user()->address }}"
birthday="{{  auth()->user()->birth_date }}"
editprofileroute="{{ route('profile.edit') }}"
changepasswordroute="{{  route('profile.change_password') }}"

walletvalue="{{ $test="120" }}"
walletcurrency="{{ $test="USD" }}"
/>

@endsection
