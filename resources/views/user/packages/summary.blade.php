@extends('layouts.user')
@section('content')

<Package-Order-Summary
class="PageContentContainer" 
id="PackageOderSummary" 
date="{{Carbon\Carbon::now()->format('m-d-Y')}}"
:package="{{ $package }}"
paymentroute="{{ route('package.payment', 'package_id') }}"

/>

@endsection
