

    @include('components.landing.header')
    @include('components.landing.navbar')
    <div id="app">
        <Landing-Page         
        :packagesadhoclist="{{ $packages->adhoc}}"
        :packagebiweeklylist="{{ $packages->bi_weekly}}"
        :packagesmonthlylist="{{ $packages->monthly}}"
        packageshowroute="{{ route('package.show', 'package_id') }}"
        packagecreateroute="{{ route('package.create') }}"
/>
    </div>
    @include('components.landing.footer')
