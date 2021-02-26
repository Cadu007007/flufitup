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

                routetopackages="{{ route('admin.packages') }}"
                routetodryclean="{{ route('admin.packages.dry_clean') }}"
                routetohouseholditems="{{ route('admin.packages.household_items') }}"
                routetodetergents="{{ route('admin.packages.detergents') }}"
                routetofabricsoftener="{{ route('admin.packages.fabric') }}"
                routetodryersheets="{{ route('admin.packages.dryer') }}"
                routetoscentbooster="{{ route('admin.packages.scent') }}"

                routetousers="{{ route('admin.users') }}"

                routetopickupplanner="{{ route('admin.planner.pickup') }}"
                routetopickdelieveryplanner="{{ route('admin.planner.delievery') }}"
                routetoadmins="{{ route('admin.employees.admins') }}"
                routetodrivers="{{ route('admin.employees.drivers') }}"
                routetolaunderystaff="{{ route('admin.employees.laundery_staff') }}"
                routetopromocodes="{{ route('admin.promocodes') }}"
                routetozones="{{ route('admin.zones') }}"
                routetocities="{{ route('admin.cities') }}"
                />
            </div>

            <div class="PageContainer">
                @yield('content')
            </div>
        </div>
</div>

@include('components.admin.footer')