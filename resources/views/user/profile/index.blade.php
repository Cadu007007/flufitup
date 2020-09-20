@extends('layouts.user')
@section('content')

<Profile 
class="PageContentContainer" 
id="Profile" 
lastlogin="Last Login : 08 / 25 / 2020, 09:35:21 PM"
profileimage="{{ asset('images/icons/profile.svg') }}"
email="{{  $test="MohamedSamir@gmail.com" }}"
emailstatus="{{  $test=0 }}"
phone="{{  $test="( 000 ) 000 0000" }}"
phonestatus="{{  $test=1 }}"
address="{{  $test="12 - Amr Ibn El Aass - Miami - Alexandria" }}"
birthday="{{  $test="Not Added" }}"
editprofileroute="{{ route('profile.edit') }}"
changepasswordroute="{{  route('profile.change_password') }}"

walletvalue="{{ $test="120" }}"
walletcurrency="{{ $test="USD" }}"
/>

@endsection
