<div class="flex-1 flex items-center justify-center px-2 lg:ml-6 ">
    <div class="max-w-lg w-full lg:max-w-xs">

        <div class="relative">
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <svg class="h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                          d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                          clip-rule="evenodd"/>
                </svg>
            </div>
            <input wire:model.debounce.300ms="search"
                   id="search"
                   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500
                    focus:border-blue-500 w-full p-2.5 dark:bg-gray-700 dark:border-gray-600
                    dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                   placeholder="      Search" type="search" autocomplete="off">

            @if (strlen($search) > 2)
                <ul
                    class="absolute z-50 bg-white border border-gray-300 w-full rounded-md mt-1 text-gray-700 text-sm divide-y divide-gray-200">

                    @if(sizeof($searchResults)>0)
                        @if($type=='pharmacy')
                            @foreach ($searchResults as $result)
                                <li>
                                    <a
                                        href="/dashboard/locations/{{$result->id}}/{{$lat}}/{{$lng}}"
                                        class="flex items-center px-4 py-4 hover:bg-gray-200 transition ease-in-out duration-150">
                                        <div class="ml-4 leading-tight">
                                            <div class="font-semibold">
                                                {{ $result->name}}
                                            </div>
                                            <div class="text-gray-600">
                                                {{(float)$result->distance}} km
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            @endforeach
                        @elseif($type=='clinic')

                            @foreach ($searchResults as $result)

                                <li>
                                    <a
                                        href="/dashboard/locations/{{$result->id}}/{{$lat}}/{{$lng}}"
                                        class="flex items-center px-4 py-4 hover:bg-gray-200 transition ease-in-out duration-150">
                                        <div class="ml-4 leading-tight">
                                            <div class="font-semibold">
                                                {{$result->LName}}
                                                ,Owned By {{$result->name}}
                                            </div>

                                            <div class="text-gray-600">
                                                For {{$result->SName}},
                                                Distance
                                                {{(float)$result->distance}} km
                                            </div>
                                        </div>
                                    </a>
                                </li>

                            @endforeach
                        @else
                            @foreach ($searchResults as $result)

                                <li>
                                    <a
                                        href="/dashboard/medicines/{{$result->id}}/{{$lat}}/{{$lng}}"
                                        class="flex items-center px-4 py-4 hover:bg-gray-200 transition ease-in-out duration-150">
                                        @if(isset($result->photo))
                                            <img src="{{asset('storage/'.$result->photo )}}"
                                                 alt="album art" class="w-10">
                                        @endif
                                        <div class="ml-4 leading-tight">
                                            <div class="ml-4 leading-tight">
                                                <div class="font-semibold">
                                                    {{$result->name}}
                                                </div>
                                                <div class="text-gray-600">
                                                    {{Str::limit($result->description,100)}}
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </li>

                            @endforeach

                        @endif
                    @else
                        <li class="px-4 py-4">No results found for "{{ $search }}"</li>
                    @endif
                </ul>
            @endif
            <select wire:model="type" name="type" style="left: 73%; border: none "
                    class="absolute bg-gray-50 text-gray-900 text-sm rounded-lg
                     focus:outline-none p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option value="clinic">Clinic</option>
                <option value="pharmacy">Pharmacy</option>
                <option value="medicine">Medicine</option>
            </select>
        </div>
    </div>

    <script>
        let f = 0;
        document.getElementById('search').addEventListener("keyup", () => {
            // Try HTML5 geolocation.

            if (!f && navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(
                    (position) => {
                        const pos = {
                            lat: position.coords.latitude,
                            lng: position.coords.longitude,
                        };
                        Livewire.emit('changeLat', pos.lat);
                        Livewire.emit('changeLng', pos.lng);
                        f = 1;

                    },
                    () => {
                    }
                );
            }
        });
    </script>

</div>


