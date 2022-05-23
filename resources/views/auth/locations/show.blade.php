<x-dashboard-layout>

    <x-settings heading="{{auth()->user()->name}}'s Dashboard">
        <div>
            <div class="flex flex-col">
                <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">

                    @if($location->type=='clinic')
                        <div class="mb-6">
                            <label class="block mb-2 uppercase font-bold text-xs text-gray-700">Name</label>
                            <h2 class="border border-gray-200 p-2 w-full rounded">{{$location->name}}</h2>
                        </div>
                        <div class="mb-6">
                            <label class="block mb-2 uppercase font-bold text-xs text-gray-700">Dr.Name</label>
                            <h2 class="border border-gray-200 p-2 w-full rounded">{{$location->owner->name}}</h2>
                        </div>
                        <div class="mb-6">
                            <label class="block mb-2 uppercase font-bold text-xs text-gray-700">Dr.Speciality</label>
                            <h2 class="border border-gray-200 p-2 w-full rounded">{{$speciality[0]->name}}</h2>
                        </div>
                        <div class="mb-6">
                            <label class="block mb-2 uppercase font-bold text-xs text-gray-700">Distance From
                                You</label>
                            <h2 class="border border-gray-200 p-2 w-full rounded">{{$distance}} km</h2>
                        </div>

                        <div class="mb-6">
                            <label class="block mb-2 uppercase font-bold text-xs text-gray-700">Published</label>
                            <h2 class="border border-gray-200 p-2 w-full rounded">{{$location->created_at->diffForHumans()}}</h2>
                        </div>
                        <form action="/dashboard/clinics/{{$location->id}}/reserve" method="post">
                            @csrf
                            <x-submit-button>Examination Reserve</x-submit-button>
                        </form>
                    @else
                        <div class="mb-6">
                            <label class="block mb-2 uppercase font-bold text-xs text-gray-700">Name</label>
                            <h2 class="border border-gray-200 p-2 w-full rounded">{{$location->name}}</h2>
                        </div>
                        <div class="mb-6">
                            <label class="block mb-2 uppercase font-bold text-xs text-gray-700">Dr.Name</label>
                            <h2 class="border border-gray-200 p-2 w-full rounded">{{$location->owner->name}}</h2>
                        </div>
                        <div class="mb-6">
                            <label class="block mb-2 uppercase font-bold text-xs text-gray-700">Distance From
                                You</label>
                            <h2 class="border border-gray-200 p-2 w-full rounded">{{$distance}} km</h2>
                        </div>

                        <div class="mb-6">
                            <label class="block mb-2 uppercase font-bold text-xs text-gray-700">Published</label>
                            <h2 class="border border-gray-200 p-2 w-full rounded">{{$location->created_at->diffForHumans()}}</h2>
                        </div>
                        <div class="mb-6">
                            <a target="_blank"
                               href="https://www.google.com/maps/dir/{{$currentLat}},{{$currentLng}}/{{$location->lat}},{{$location->lng}}/{{'@'.$currentLat}},{{$currentLng}},17z"
                               class="bg-blue-500 text-white uppercase font-semibold text-xs py-2 px-10 rounded-2xl mt-2 hover:bg-blue-600">
                                Visit
                            </a>
                        </div>

                    @endif


                </main>
            </div>
        </div>


    </x-settings>
</x-dashboard-layout>
