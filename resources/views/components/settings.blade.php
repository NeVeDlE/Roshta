<section id="sideBar" class="h-full w-60 top-0 left-0 bg-white">
    <a href="/dashboard" class="brand flex justify-center items-center mt-2">
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
                <a href="{{ route('job-requests') }}" class="relative">
                    <div
                        class="numNotfi absolute text-white bg-red-500 font-bold text-xs flex justify-center items-center">
                        @if(\App\Models\Doctor::where('status','pending')->count() >0
                             ||App\Models\Pharmacist::where('status','pending')->count())
                            {{\App\Models\Doctor::where('status','pending')->count()
                            + \App\Models\Pharmacist::where('status','pending')->count()}}
                        @endif</div>
                    <i class="fa-solid fa-code-pull-request sideBarIcon"></i>
                    <span class="sideText">Job Request </span>
                </a>
            </li>
            <li class="{{request()->routeIs('location-requests')? 'active':'' }}">
                <a href="{{ route('location-requests') }}" class="relative">
                    <div
                        class="numNotfi absolute text-white bg-red-500 font-bold text-xs flex justify-center items-center">
                        {{\App\Models\Location::where('status','pending')->count()}}</div>
                    <i class="fa-solid fa-people-group sideBarIcon"></i>
                    <span class="sideText">Location
                        Requests</span>
                </a>
            </li>
            <li class="{{request()->routeIs('roles')? 'active':'' }}">
                <a href="{{ route('roles') }}" class="relative">
                    <div
                        class="numNotfi absolute text-white bg-red-500 font-bold text-xs flex justify-center items-center">
                        {{\App\Models\Role::count()}}</div>
                    <i class="fa-solid fa-people-group sideBarIcon"></i>
                    <span class="sideText">Roles</span>
                </a>
            </li>
            <li class="{{request()->routeIs('diseases')? 'active':'' }}">
                <a href="{{ route('diseases') }}" class="relative">
                    <div
                        class="numNotfi absolute text-white bg-red-500 font-bold text-xs flex justify-center items-center">
                        {{\App\Models\Disease::count()}}</div>
                    <i class="fa-solid fa-square-virus sideBarIcon"></i>
                    <span class="sideText">Diseases</span>
                </a>
            </li>
            <li class="{{request()->routeIs('medicines')? 'active':'' }}">
                <a href="{{ route('medicines') }}" class="relative">
                    <div
                        class="numNotfi absolute text-white bg-red-500 font-bold text-xs flex justify-center items-center">
                        {{\App\Models\Medicine::count()}}</div>
                    <i class="fa-solid fa-capsules sideBarIcon"></i>
                    <span class="sideText">Medicines</span>
                </a>
            </li>
        @endcan
        @can('doctor')
            <h4 class="text-red-400 font-semibold text-center uppercase my-4">Doctor</h4>
            @can('hasClinic')
                <li class="{{request()->routeIs('clinic-management')? 'active':'' }}">
                    <a href="{{ route('clinic-management') }}" class="relative">
                        <div
                            class="numNotfi absolute text-white bg-red-500 font-bold text-xs flex justify-center items-center">
                           {{DB::table('location_users')->where('location_id',auth()->user()->locations->id)
                              ->where('status','pending')->count()}}</div>
                        <i class="fa-solid fa-check-to-slot sideBarIcon"></i>
                        <span class="sideText">{{auth()->user()->locations->name}}</span>
                    </a>
                </li>
            @endcan
            <li class="{{request()->routeIs('locations-request-preview')? 'active':'' }}">
                <a href="{{ route('locations-request-preview') }}" class="relative">
                    <i class="fa-solid fa-check-to-slot sideBarIcon"></i>
                    <span class="sideText">My Location
                        Requests</span>
                </a>
            </li>
            <li class="{{request()->routeIs('clinics-register')? 'active':'' }}">
                <a href="{{ route('clinics-register') }}" class="relative">
                    <i class="fa-solid fa-check-to-slot sideBarIcon"></i>
                    <span class="sideText">Register a
                       Clinic</span>
                </a>
            </li>
        @endcan
        @can('pharmacist')
            <h4 class="text-red-400 font-semibold text-center uppercase my-4">Pharmacist</h4>

            @can('hasPharmacy')
                <li class="{{request()->routeIs('pharmacy-index')? 'active':'' }}">
                    <a href="{{ route('pharmacy-index') }}" class="relative">
                        <i class="fa-solid fa-check-to-slot sideBarIcon"></i>
                        <span class="sideText">{{auth()->user()->locations->name}}</span>
                    </a>
                </li>
            @endcan
            <li class="{{request()->routeIs('locations-request-preview')? 'active':'' }}">
                <a href="{{ route('locations-request-preview') }}" class="relative">
                    <i class="fa-solid fa-check-to-slot sideBarIcon"></i>
                    <span class="sideText">My Location
                        Requests</span>
                </a>
            </li>
            <li class="{{request()->routeIs('pharmacies-register')? 'active':'' }}">
                <a href="{{ route('pharmacies-register') }}" class="relative">
                    <i class="fa-solid fa-check-to-slot sideBarIcon"></i>
                    <span class="sideText">Register a
                        Pharmacy</span>
                </a>
            </li>
        @endcan

        <h4 class="text-red-400 font-semibold text-center uppercase my-4">Patient</h4>
        <li class="{{request()->routeIs('examinations')? 'active':'' }}">
            <a href="{{ route('examinations') }}" class="relative">
                <div
                    class="numNotfi absolute text-white bg-red-500 font-bold text-xs flex justify-center items-center">
                    {{auth()->user()->examinations()->count()}}</div>
                <i class="fa-solid fa-check-to-slot sideBarIcon"></i>
                <span class="sideText">Examinations</span>
            </a>
        </li>
        <li class="{{request()->routeIs('examination-requests')? 'active':'' }}">
            <a href="{{ route('examination-requests') }}" class="relative">
                <div
                    class="numNotfi absolute text-white bg-red-500 font-bold text-xs flex justify-center items-center">
                    {{DB::table('location_users')->where('user_id',auth()->id())->count()}}</div>
                <i class="fa-solid fa-notes-medical sideBarIcon"></i>
                <span class="sideText">Exams Reqs</span>
            </a>
        </li>
        <li class="{{request()->routeIs('QR')? 'active':'' }}">
            <a href="{{ route('QR') }}" class="relative">
                <i class="fa-solid fa-id-card sideBarIcon"></i>
                <span class="sideText">Get My ID</span>
            </a>
        </li>

        @can('patient')
            <h4 class="text-red-400 font-semibold text-center uppercase my-4">Join Us!</h4>

            <li class="{{request()->routeIs('jobs-index')? 'active':'' }}">
                <a href="{{ route('jobs-index') }}" class="relative">
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
                    <a href="{{ route('doctors-register') }}" class="relative">
                        <i class="fa-solid fa-user-doctor sideBarIcon"></i>
                        <span class="sideText">Doctor</span>
                    </a>
                </li>
                <li class="{{request()->routeIs('pharmacists-register')? 'active':'' }}">
                    <a href="{{ route('pharmacists-register') }}" class="relative">
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

