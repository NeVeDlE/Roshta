<x-dashboard-layout>

    <x-settings heading="{{auth()->user()->name}}'s Location Requests">
        <div>
            @if(isset($req))
                <div class="flex flex-col">
                    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">

                        <div class="mb-6">
                            <label class="block mb-2 uppercase font-bold text-xs text-gray-700">Name</label>
                            <h2 class="border border-gray-200 p-2 w-full rounded">{{$req->name}}</h2>
                        </div>
                        <div class="mb-6">
                            <label class="block mb-2 uppercase font-bold text-xs text-gray-700">Place</label>
                            <a
                                target="_blank"
                                href="https://www.google.com/maps/place/27%C2%B044'25.7%22N+30%C2%B050'21.9%22E/{{'@'.$req->lat}},{{$req->lng}},17z/data=!4m5!3m4!1s0x0:0x399e449f79a096aa!8m2!3d
                                                {{$req->lat}}!4d{{$req->lng}}"
                                class="transition-colors duration-300 text-xs font-semibold bg-blue-200 hover:bg-blue-300 rounded-full py-2 px-8">
                                View Place
                            </a>
                        </div>
                        <div class="mb-6">
                            <label class="block mb-2 uppercase font-bold text-xs text-gray-700">Published</label>
                            <h2 class="border border-gray-200 p-2 w-full rounded">{{$req->created_at->diffForHumans()}}</h2>
                        </div>
                        <div class="mb-6">
                            <label class="block mb-2 uppercase font-bold text-xs text-gray-700">Status</label>
                            @if($req->status=='accepted')
                                <h2 class="border text-green-600 border-gray-200 p-2 w-full rounded">{{ucwords($req->status)}}</h2>
                            @elseif($req->status=='pending')
                                <h2 class="border text-yellow-600 border-gray-200 p-2 w-full rounded">{{ucwords($req->status)}}</h2>
                            @else
                                <h2 class="border text-red-600 border-gray-200 p-2 w-full rounded">{{ucwords($req->status)}}</h2>
                            @endif
                        </div>
                    </main>
                </div>
            @else
                <p>No Reqs yet</p>
            @endif
        </div>


    </x-settings>
</x-dashboard-layout>
