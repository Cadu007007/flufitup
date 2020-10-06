@extends('layouts.user')
@section('content')

<Package-Summary
class="PageContentContainer" 
id="PackageSummary" 
date="{{Carbon\Carbon::now()->format('d/m/Y')}}"
:package="{{ $package }}"
paymentroute="{{ route('package.payment', 'package_id') }}"
/>

@endsection
