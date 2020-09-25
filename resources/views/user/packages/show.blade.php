@extends('layouts.user')
@section('content')

<Package-Summary
class="PageContentContainer" 
id="PackageSummary" 
date="21/09/2020"
:package="{{ $package }}"
paymentroute="{{ route('package.payment', 'package_id') }}"
/>

@endsection
