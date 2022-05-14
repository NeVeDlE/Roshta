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
                            Requests</a>
                    </li>
                    <li class="mb-2">
                        <a href="/dashboard/roles"
                           class="{{request()->routeIs('roles')? 'text-blue-500':'' }}">Roles</a>
                    </li>
                    <li class="mb-2">
                        <a href="/dashboard/diseases" class="{{request()->routeIs('diseases')? 'text-blue-500':'' }}">Diseases</a>
                    </li>
                    <li class="mb-2">
                        <a href="/dashboard/medicines" class="{{request()->routeIs('medicines')? 'text-blue-500':'' }}">Medicines</a>
                    </li>
                </ul>
            @endcan
            @can('patient')
                <h4 class="font-semibold mb-4">Join Us!</h4>
                <ul>
                    <li class="mb-2">
                        <a href="/dashboard/jobs/index"
                           class="{{request()->routeIs('jobs-index')? 'text-blue-500':'' }}">My Requests</a>
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
