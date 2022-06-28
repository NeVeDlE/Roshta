<x-dashboard-layout>
    <div class="tableOfContent flex flex-wrap gap-6 mt-7 w-full">
        <div class="flex justify-center items-center" style="width: 75%">
            <div class="flex flex-col p-3 items-center w-full bg-white rounded-xl shadow" style="width: 75%">
                <main class=" mt-6  space-y-6">
                    <div class="flex flex-col">
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                @if(isset($medicine->photo))
                                    <img src="{{asset('storage/'.$medicine->photo)}}" alt="{{$medicine->name}}'photo"
                                         class="rounded-xl ml-6 my-2 mx-2 w-full " >
                                @endif
                                    <div class="mb-6">
                                        <x-form.label name="Name"/>
                                        <input class="border border-gray-200 p-2 rounded-xl w-full bg-gray-100"
                                               type="text" value="{{$medicine->name}}" disabled>
                                    </div>
                                    <div class="mb-6">
                                        <x-form.label name="Description"/>
                                        <input class="border border-gray-200 p-2 rounded-xl w-full bg-gray-100"
                                               type="text" value=" {{$medicine->description}}" disabled>
                                    </div>
                                    <div class="mb-6">
                                        <x-form.label name="Price"/>
                                        <input class="border border-gray-200 p-2 rounded-xl w-full bg-gray-100"
                                               type="text" value=" {{$medicine->price}} ج.م" disabled>
                                    </div>

                                    @if(sizeof($pos))
                                    <div class="mb-6 flex flex-col">
                                        <x-form.label name="Position on GPS"/>
                                        <a
                                            target="_blank"
                                            href="https://www.google.com/maps/dir/{{$currentLat}},{{$currentLng}}/{{$pos[0]->lat}},{{$pos[0]->lng}}/{{'@'.$currentLat}},{{$currentLng}},17z"

                                            class="transition-colors duration-300 w-auto
                                              text-xs font-semibold bg-red-400 text-white text-center hover:bg-red-500 rounded-full py-2 px-8">
                                            Buy Medicine
                                        </a>
                                    </div>
                                    @else
                                        <div class="mb-6">
                                            <x-form.label name="Availability"/>
                                            <input class="border border-gray-200 p-2 rounded-xl w-full bg-gray-100"
                                                   type="text" value="Not found in any pharmacy" disabled>
                                        </div>
                                        @endif



                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
    </div>

</x-dashboard-layout>
