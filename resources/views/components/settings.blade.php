@props(['heading'])
<section class="py-8 max-w-4xl mx-auto">
    <h1 class="text-lg font-bold mb-8 pb-2 border-b">
        {{$heading}}
    </h1>
    <div class="flex">
        <aside class="w-48 flex-shrink-0">
            @can('admin')
                <h4 class="font-semibold mb-4">Admin</h4>
                <ul>

                    <li class="mb-2">
                        <a href="/dashboard/jobRequests"
                           class="{{request()->routeIs('job-requests')? 'text-blue-500':'' }}">Job
                            Requests
                            @if(\App\Models\Doctor::where('status','pending')->count() >0
                                 ||App\Models\Pharmacist::where('status','pending')->count())
                                {{\App\Models\Doctor::where('status','pending')->count()
                                + \App\Models\Pharmacist::where('status','pending')->count()}}
                            @endif</a>
                    </li>
                    <li class="mb-2">
                        <a href="/dashboard/locations"
                           class="{{request()->routeIs('location-requests')? 'text-blue-500':'' }}">Location
                            Requests @if(\App\Models\Location::where('status','pending')->count() >0)
                                {{\App\Models\Location::where('status','pending')->count()}}
                            @endif</a>
                    </li>
                    <li class="mb-2">
                        <a href="/dashboard/roles"
                           class="{{request()->routeIs('roles')? 'text-blue-500':'' }}">Roles</a>
                    </li>
                    <li class="mb-2">
                        <a href="/dashboard/diseases" class="{{request()->routeIs('diseases')? 'text-blue-500':'' }}">Diseases</a>
                    </li>
                    <li class="mb-2">
                        <a href="/dashboard/medicines" class="{{request()->routeIs('Medicine')? 'text-blue-500':'' }}">Medicines</a>
                    </li>
                </ul>
            @endcan
            @can('doctor')
                <h4 class="font-semibold mb-4">Doctor</h4>
                <ul>
                    @can('hasClinic')
                        <li class="mb-2">
                            <a href=" /dashboard/clinics/index"
                               class="{{request()->routeIs('clinic-management')? 'text-blue-500':'' }}">{{auth()->user()->locations->name}}</a>
                        </li>
                    @endcan
                    <li class="mb-2">
                        <a href="/dashboard/locations/preview"
                           class="{{request()->routeIs('locations-request-preview')? 'text-blue-500':'' }}">My Location
                            Requests</a>
                    </li>
                    <li class="mb-2">
                        <a href="/dashboard/clinics/register"
                           class="{{request()->routeIs('clinics-register')? 'text-blue-500':'' }}">Register a
                            Clinic</a>
                    </li>

                </ul>
            @endcan
            @can('pharmacist')
                <h4 class="font-semibold mb-4">Pharmacist</h4>
                <ul>
                    @if($pharmacy = \App\Models\Location::where('owner_id', auth()->id())
                      ->where('type', 'pharmacy')->where('status','accepted')->first())
                        <li class="mb-2">
                            <a href="/dashboard/pharmacy/index"
                               class="{{request()->routeIs('pharmacy-index')? 'text-blue-500':'' }}">
                                {{$pharmacy->name}}</a>
                        </li>
                    @endif
                    <li class="mb-2">
                        <a href="/dashboard/locations/preview"
                           class="{{request()->routeIs('locations-request-preview')? 'text-blue-500':'' }}">My Location
                            Requests</a>
                    </li>
                    <li class="mb-2">
                        <a href="/dashboard/pharmacies/register"
                           class="{{request()->routeIs('pharmacies-register')? 'text-blue-500':'' }}">Register a
                            Pharmacy</a>
                    </li>


                </ul>
            @endcan

            @can('patient')
                <h4 class="font-semibold mb-4">Join Us!</h4>
                <ul>
                    <li class="mb-2">
                        <a href="/dashboard/jobs/index"
                           class="{{request()->routeIs('jobs-index')? 'text-blue-500':'' }}">My Job Requests</a>
                    </li>

                    @if(!sizeof(\App\Models\Doctor::where('user_id', auth()->id())
                    ->where('status', '!=', 'cancelled')->get())
                    &&
                    !sizeof(\App\Models\Pharmacist::where('user_id', auth()->id())
                    ->where('status', '!=', 'cancelled')->get()))
                        <li class="mb-2">
                            <a href="/dashboard/doctors/register"
                               class="{{request()->routeIs('doctors-register')? 'text-blue-500':'' }}">Doctor</a>
                        </li>
                        <li class="mb-2">
                            <a href="/dashboard/pharmacists/register"
                               class="{{request()->routeIs('pharmacists-register')? 'text-blue-500':'' }}">Pharmacist</a>
                        </li>
                    @endif
                </ul>
            @endcan

        </aside>

        <main class="flex-1">
            <x-panel>
                {{$slot}}
            </x-panel>
        </main>
    </div>
</section>
