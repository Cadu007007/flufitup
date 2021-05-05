@include('components.admin.header')

<div id="app">
        <div class="Navbar">
            <Admin-Navbar
            viewallchatroute="{{ route('admin.dashboard') }}"
            viewallnotificationsroute="{{ route('admin.dashboard') }}"
            showprofileroute="{{ route('admin.users.show','user_id') }}"
            settingsroute=""
            logoutroute="{{ route('admin.login') }}"
            userimage="/images/icons/profile.svg"
            />
        </div>
        <div class="AdminPageContainer">
            <div class="AdminSidebar">
                <Admin-Sidebar
                active="{{ $active }}"
                routetodashboard="{{ route('admin.dashboard') }}"
                routetoreports="{{ route('admin.reports') }}"
                
                routetocategories="{{ route('admin.packages.categories') }}"

                routetopackages="{{ route('admin.packages.index') }}"
                routetodryclean="{{ route('admin.packages.dry.cleans.index') }}"
                routetohouseholditems="{{ route('admin.packages.households.index') }}"
                routetodetergents="{{ route('admin.packages.detergents.index') }}"
                routetofabricsoftener="{{ route('admin.packages.fabrics.index') }}"
                routetodryersheets="{{ route('admin.packages.dryers.index') }}"
                routetoscentbooster="{{ route('admin.packages.scents.index') }}"
                routetofreshener="{{ route('admin.packages.fresheners.index') }}"

                routetousers="{{ route('admin.users') }}"

                routetopickupplanner="{{ route('admin.planner.pickup') }}"
                routetopickdelieveryplanner="{{ route('admin.planner.delievery') }}"
                routetoadmins="{{ route('admin.employees.admins') }}"
                routetodrivers="{{ route('admin.employees.drivers') }}"
                routetolaunderystaff="{{ route('admin.employees.laundery_staff') }}"
                routetopromocodes="{{ route('admin.promocodes') }}"
                routetozones="{{ route('admin.zones.index') }}"
                routetocities="{{ route('admin.cities.index') }}"
                />
            </div>

            <div class="PageContainer">
                @if($message ?? '')
                <p class="alert alert-success successMessageAlert">{{ $message }}</p>
                @endif
                @yield('content')
            </div>
        </div>
</div>

@include('components.admin.footer')