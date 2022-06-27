<x-dashboard-layout>
    <div class="headerTitle ">
        <h1 class="text-2xl mb-3 font-bold">Location Requests</h1>
        <ul class="pl-14 pageIndex flex gap-2">
            <li>
                <a href="{{route('dashboard')}}">Dashboard</a>
            </li>
            <li class="chervon">
                <i class="fa-solid fa-chevron-right"></i>
            </li>
            <li class="active">
                <a href="{{route('locations-request-preview')}}">My Location Requests</a>
            </li>
        </ul>
    </div>
    <div class="tableOfContent flex flex-wrap gap-6 mt-7 w-full">
        <div class="flex justify-center items-center" style="width: 75%">
            <div class="flex flex-col p-3 items-center w-full bg-white rounded-xl shadow" style="width: 75%">
                <main class=" mt-6  space-y-6">
                    <div class="flex flex-col">
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                @if(isset($req))


                                    <div class="mb-6">
                                        <x-form.label name="Name"/>
                                        <input class="border border-gray-200 p-2 rounded-xl w-full bg-gray-100"
                                               type="text" value="{{$req->name}}" disabled>
                                    </div>
                                    <div class="mb-6">
                                        <x-form.label name="Published"/>
                                        <input class="border border-gray-200 p-2 rounded-xl w-full bg-gray-100"
                                               type="text" value="{{$req->created_at->diffForHumans()}}" disabled>
                                    </div>

                                    <div class="mb-6 flex flex-col">
                                        <x-form.label name="Position On GPS"/>
                                        <a target="_blank"
                                           href="https://www.google.com/maps/place/27%C2%B044'25.7%22N+30%C2%B050'21.9%22E/{{'@'.$req->lat}},{{$req->lng}},17z/data=!4m5!3m4!1s0x0:0x399e449f79a096aa!8m2!3d
                                                {{$req->lat}}!4d{{$req->lng}}"
                                           class="transition-colors duration-300 text-xs text-white text-center font-semibold bg-blue-500 hover:bg-blue-600 rounded-full py-2 px-8">
                                            View On Maps
                                        </a>
                                    </div>

                                    <div class="mb-6">
                                        <x-form.label name="Status"/>
                                        @if($req->status=='accepted')
                                            <input
                                                class="border border-gray-200 text-center text-green-500 p-2 rounded-xl w-full bg-gray-100"
                                                type="text" value="{{ucwords($req->status)}}" disabled>
                                        @elseif($req->status=='pending')
                                            <input
                                                class="border border-gray-200 text-center text-yellow-600 p-2 rounded-xl w-full bg-gray-100"
                                                type="text" value="{{ucwords($req->status)}}" disabled>
                                        @else
                                            <input
                                                class="border border-gray-200 text-center text-red-500 p-2 rounded-xl w-full bg-gray-100"
                                                type="text" value="{{ucwords($req->status)}}" disabled>
                                        @endif

                                    </div>

                                @else
                                    No Reqs.
                                @endif
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>


    </div>



</x-dashboard-layout>
