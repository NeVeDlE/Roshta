<div>
    <div class="headerTitle ">
        <h1 class="text-2xl mb-3 font-bold">Examinations</h1>
        <ul class="pl-14 pageIndex flex gap-2">
            <li>
                <a href="{{route('examination-requests')}}">Dashboard</a>
            </li>
            <li class="chervon">
                <i class="fa-solid fa-chevron-right"></i>
            </li>
            <li class="active">
                <a href="{{route('examination-requests')}}">Examinations Requests</a>
            </li>
        </ul>
    </div>
    <div class="tableOfContent flex flex-wrap gap-6 mt-7 w-full">
        <div class="flex gap-6 headofTable shadow-md">
            <input wire:model="search" type="search" placeholder="Find Something" class="rounded-xl bg-gray-100">
        </div>
        <div class="flex flex-col">
            <main class=" mt-6  space-y-6">
                <div class="flex flex-col">
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                <table class="min-w-full divide-y rounded-xl divide-gray-200">
                                    <thead class="bg-white divide-y divide-gray-200">
                                    <th class="px-6 py-4 whitespace-nowrap">Location's Name</th>
                                    <th class="px-6 py-4 whitespace-nowrap">Status</th>
                                    <th class="px-6 py-4 whitespace-nowrap">Place On GPS</th>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach($reqs as $req)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <div class="text-sm font-medium text-gray-900">
                                                        <p>
                                                            {{$req->name}}
                                                        </p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    @if($req->status=='accepted')
                                                        <div class="text-sm font-medium text-green-600">
                                                            <p>
                                                                {{ucwords($req->status)}}
                                                            </p>
                                                        </div>
                                                    @elseif($req->status=='pending')
                                                        <div class="text-sm font-medium text-yellow-600">
                                                            <p>
                                                                {{ucwords($req->status)}}
                                                            </p>
                                                        </div>
                                                    @else
                                                        <div class="text-sm font-medium text-red-600">
                                                            <p>
                                                                {{ucwords($req->status)}}
                                                            </p>
                                                        </div>
                                                    @endif
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap  text-sm font-medium">
                                                <a target="_blank"
                                                   href="https://www.google.com/maps/dir/{{$lat}},{{$lng}}/{{$req->lat}},{{$req->lng}}/{{'@'.$lat}},{{$lng}},17z"
                                                   class="bg-blue-500 text-white uppercase font-semibold text-xs py-2 px-10 rounded-2xl hover:bg-blue-600">
                                                    Drive Me</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    <!-- More people... -->
                                    </tbody>

                                </table>
                                {{$reqs->links()}}
                            </div>
                        </div>
                    </div>
                </div>

            </main>
        </div>
        <script>
            window.onload = function () {
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(
                        (position) => {
                            const pos = {
                                lat: position.coords.latitude,
                                lng: position.coords.longitude,
                            };
                            Livewire.emit('changeLat', pos.lat);
                            Livewire.emit('changeLng', pos.lng);

                        },
                        () => {
                        }
                    );
                }
            }

        </script>
    </div>
</div>
