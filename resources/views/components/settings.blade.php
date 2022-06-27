<section id="sideBar" class="h-full w-60 top-0 left-0 bg-white">
    <a href="#" class="brand flex justify-center items-center mt-2">
        <img class="w-36 my-3 mb-9" src="{{asset('images/Logo.png')}}">
    </a>

    <ul class="sidebarTopMenu w-full mt-10">

        <li class="{{request()->routeIs('dashboard')? 'active':'' }}">
            <a href="/dashboard">
                <i class="fa-solid fa-gauge sideBarIcon"></i>
                <span class="sideText">Dashboard</span>
            </a>
        </li>
        @can('admin')
            <h4 class="text-red-400 font-semibold text-center uppercase my-4">Admin</h4>

            <li class="{{request()->routeIs('job-requests')? 'active':'' }}">
                <a href="{{ route('job-requests') }}">
                    <i class="fa-solid fa-code-pull-request sideBarIcon"></i>
                    <span class="sideText">Job Requests @if(\App\Models\Doctor::where('status','pending')->count() >0
                             ||App\Models\Pharmacist::where('status','pending')->count())
                            {{\App\Models\Doctor::where('status','pending')->count()
                            + \App\Models\Pharmacist::where('status','pending')->count()}}
                        @endif </span>
                </a>
            </li>
            <li class="{{request()->routeIs('location-requests')? 'active':'' }}">
                <a href="{{ route('location-requests') }}">
                    <i class="fa-solid fa-people-group sideBarIcon"></i>
                    <span class="sideText">Location
                        Requests  @if(\App\Models\Location::where('status','pending')->count() >0)
                            {{\App\Models\Location::where('status','pending')->count()}}
                        @endif</span>
                </a>
            </li>


            <li class="{{request()->routeIs('roles')? 'active':'' }}">
                <a href="{{ route('roles') }}">
                    <i class="fa-solid fa-people-group sideBarIcon"></i>
                    <span class="sideText">Roles</span>
                </a>
            </li>
            <li class="{{request()->routeIs('diseases')? 'active':'' }}">
                <a href="{{ route('diseases') }}">
                    <i class="fa-solid fa-square-virus sideBarIcon"></i>
                    <span class="sideText">Diseases</span>
                </a>
            </li>
            <li class="{{request()->routeIs('medicines')? 'active':'' }}">
                <a href="{{ route('medicines') }}">
                    <i class="fa-solid fa-capsules sideBarIcon"></i>
                    <span class="sideText">Medicines</span>
                </a>
            </li>
        @endcan
        @can('pharmacist')
            <h4 class="text-red-400 font-semibold text-center uppercase my-4">Pharmacist</h4>

            @can('hasPharmacy')
                <li class="{{request()->routeIs('pharmacy-index')? 'active':'' }}">
                    <a href="{{ route('pharmacy-index') }}">
                        <i class="fa-solid fa-check-to-slot sideBarIcon"></i>
                        <span class="sideText">{{auth()->user()->locations->name}}</span>
                    </a>
                </li>
            @endcan
            <li class="{{request()->routeIs('locations-request-preview')? 'active':'' }}">
                <a href="{{ route('locations-request-preview') }}">
                    <i class="fa-solid fa-check-to-slot sideBarIcon"></i>
                    <span class="sideText">My Location
                        Requests</span>
                </a>
            </li>
            <li class="{{request()->routeIs('pharmacies-register')? 'active':'' }}">
                <a href="{{ route('pharmacies-register') }}">
                    <i class="fa-solid fa-check-to-slot sideBarIcon"></i>
                    <span class="sideText">Register a
                        Pharmacy</span>
                </a>
            </li>
        @endcan

        <h4 class="text-red-400 font-semibold text-center uppercase my-4">Patient</h4>
        <li class="{{request()->routeIs('examinations')? 'active':'' }}">
            <a href="{{ route('examinations') }}">
                <i class="fa-solid fa-check-to-slot sideBarIcon"></i>
                <span class="sideText">Examinations</span>
            </a>
        </li>
        <li class="{{request()->routeIs('examination-requests')? 'active':'' }}">
            <a href="{{ route('examination-requests') }}">
                <i class="fa-solid fa-notes-medical sideBarIcon"></i>
                <span class="sideText">Examinations Requests</span>
            </a>
        </li>
        <li class="{{request()->routeIs('QR')? 'active':'' }}">
            <a href="{{ route('QR') }}">
                <i class="fa-solid fa-id-card sideBarIcon"></i>
                <span class="sideText">Get My ID</span>
            </a>
        </li>

        @can('patient')
            <h4 class="text-red-400 font-semibold text-center uppercase my-4">Join Us!</h4>

            <li class="{{request()->routeIs('jobs-index')? 'active':'' }}">
                <a href="{{ route('jobs-index') }}">
                    <i class="fa-solid fa-code-pull-request sideBarIcon"></i>
                    <span class="sideText">My Job Requests</span>
                </a>
            </li>

            @if(!sizeof(\App\Models\Doctor::where('user_id', auth()->id())
            ->where('status', '!=', 'cancelled')->get())
            &&
            !sizeof(\App\Models\Pharmacist::where('user_id', auth()->id())
            ->where('status', '!=', 'cancelled')->get()))
                <li class="{{request()->routeIs('doctors-register')? 'active':'' }}">
                    <a href="{{ route('doctors-register') }}">
                        <i class="fa-solid fa-user-doctor sideBarIcon"></i>
                        <span class="sideText">Doctor</span>
                    </a>
                </li>
                <li class="{{request()->routeIs('pharmacists-register')? 'active':'' }}">
                    <a href="{{ route('pharmacists-register') }}">
                        <i class="fa-solid fa-prescription-bottle-medical sideBarIcon"></i>
                        <span class="sideText">Pharmacist</span>
                    </a>
                </li>
            @endif

        @endcan

    </ul>
    <ul class="sidebarDownMenu mt-4">
        <li>
            <a class="logout text-red-400 font-semibold text-center  my-4" href="#" x-data="{}"
               @click.prevent="document.querySelector('#logout-form').submit()">
                <i class="fa-solid fa-right-from-bracket sideBarIcon "></i>
                <span class="sideText">Log Out</span>
            </a>
        </li>
    </ul>
    <form id="logout-form" action="/logout" method="POST"
          class="text-xs font-semibold text-blue-500 ml-6 hidden">
        @csrf
    </form>
</section>

