@extends('layouts.user')
@section('content')
<Packages class="PageContentContainer" 
id="Packages" 
date="18/09/2020"
:packageslist="{{ $packages}}"
/>

@endsection
