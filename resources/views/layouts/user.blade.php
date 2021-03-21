@include('components.user.header')

<div id="app">
    <div class="Sidebar-container">

        <Sidebar active={{ $active }} routetohome={{ route('home') }} routetopackages={{ route('packages') }}
            routetoprofile={{ route('profile.index') }} routetochat={{ route('chat') }}
            routetooldorders={{ route('old_orders') }} routetologout="{{ route('logout') }}" {{-- {{ route('user.login') }} --}}>
        </Sidebar>
    </div>
    <div class="d-flex flex-column">
        <div class="w-100 px-4 mb-0" style="  background: #FAFAFA;">
            <div
            class="alert alert-success mt-3 text-center d-none  successMessage"
        ></div>
        </div>
        @yield('content')
    </div>
</div>

@include('components.user.footer')
