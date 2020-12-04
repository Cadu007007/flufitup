@include('components.admin.header')

<div id="app">
        <div class="Navbar">
            <Admin-Navbar
            viewallchatroute="{{ route('admin.dashboard') }}"
            viewallnotificationsroute="{{ route('admin.dashboard') }}"
            showprofileroute=""
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
                
                routetopackages="{{ route('admin.packages') }}"
                routetodryclean="{{ route('admin.packages.dry_clean') }}"
                routetohouseholditems="{{ route('admin.packages.household_items') }}"
                routetodetergents="{{ route('admin.packages.detergents') }}"

                routetousers="{{ route('admin.users') }}"

                routetopickupplanner="{{ route('admin.planner.pickup') }}"
                routetopickdelieveryplanner="{{ route('admin.planner.delievery') }}"
                routetoadmins="{{ route('admin.employees.admins') }}"
                routetodrivers="{{ route('admin.employees.drivers') }}"
                routetolaunderystaff="{{ route('admin.employees.laundery_staff') }}"
                routetopromocodes="{{ route('admin.promocodes') }}"
                routetozones="{{ route('admin.zones') }}"
                />
            </div>

            <div class="PageContainer">
                @yield('content')
            </div>
        </div>
</div>

@include('components.admin.footer')