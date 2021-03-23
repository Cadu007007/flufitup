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
            @if (session()->get('message') != null)
                <div class="alert alert-success mt-3 text-center successMessage">{{ session()->get('message') }}</div>
            @endif
            @if (count($errors) > 0)
                <div class="alert alert-danger mt-3 text-center errorMessage">
                    {!! implode('', $errors->all('<div>:message</div>')) !!}
                </div>
            @endif
        </div>
        @yield('content')
    </div>
</div>

@include('components.user.footer')
