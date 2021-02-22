@include('components.user.header')

<div id="app">
    <div class="Sidebar-container">

        <Sidebar active={{ $active }} 
        routetohome={{ route('home') }}
        routetopackages={{ route('packages') }}
        routetoprofile={{ route('profile') }}
        routetochat={{ route('chat') }}
        routetooldorders={{ route('old_orders') }}
<<<<<<< HEAD
        routetologout={{ route('logout') }}
=======
        routetologout="#"{{-- {{ route('user.login') }} --}}
>>>>>>> 04f8f22b3c9362871fb4672d462399773c3ed7fa
        ></Sidebar>
    </div>
    @yield('content')
</div>

@include('components.user.footer')