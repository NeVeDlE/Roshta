<div>

    @if(!$page_id)
        <div class="headerTitle ">
            <h1 class="text-2xl mb-3 font-bold">Examinations</h1>
            <ul class="pl-14 pageIndex flex gap-2">
                <li>
                    <a href="{{route('dashboard')}}">Dashboard</a>
                </li>
                <li class="chervon">
                    <i class="fa-solid fa-chevron-right"></i>
                </li>
                <li class="active">
                    <a href="{{route('pharmacy-index')}}">{{$pharmacy->name}}'s Control Panel</a>
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
                                    <div class="mb-6">
                                        <x-form.label name="Name"/>
                                        <input class="border border-gray-200 p-2 rounded-xl w-full bg-gray-100"
                                               type="text" value="{{$pharmacy->name}}" disabled>
                                    </div>
                                    <div class="mb-6 flex flex-col">
                                        <x-form.label name="Position on GPS"/>
                                        <a
                                            target="_blank"
                                            href="https://www.google.com/maps/place/27%C2%B044'25.7%22N+30%C2%B050'21.9%22E/{{'@'.$pharmacy->lat}},{{$pharmacy->lng}},17z/data=!4m5!3m4!1s0x0:0x399e449f79a096aa!8m2!3d
                                                {{$pharmacy->lat}}!4d{{$pharmacy->lng}}"
                                            class="transition-colors duration-300 w-auto
                                              text-xs font-semibold bg-blue-400 text-white text-center hover:bg-blue-500 rounded-full py-2 px-8">
                                            View On Map
                                        </a>
                                    </div>
                                    <div class="mb-6">
                                        <x-form.label name="Published"/>
                                        <input class="border border-gray-200 p-2 rounded-xl w-full bg-gray-100"
                                               type="text" value="{{$pharmacy->created_at->diffForHumans()}}" disabled>
                                    </div>
                                    <div class="mb-6">
                                        <x-form.label name="Owner"/>
                                        <input class="border border-gray-200 p-2 rounded-xl w-full bg-gray-100"
                                               type="text" value="{{$pharmacy->owner->name}}" disabled>
                                    </div>
                                    <div class="mb-6">
                                        <x-form.label name="Total Different Medicine type"/>
                                        <input class="border border-gray-200 p-2 rounded-xl w-full bg-gray-100"
                                               type="text" value="{{$pharmacy->medicines()->count()}}" disabled>
                                    </div>

                                    <div class="mb-6">
                                        <x-form.label name="Total Different Medicine Quantity"/>
                                        <input class="border border-gray-200 p-2 rounded-xl w-full bg-gray-100"
                                               type="text" value="{{$totalMedicines}}" disabled>
                                    </div>
                                    <div class="mb-6">
                                        <x-form.label name="Expected Money After Selling Every Thing"/>
                                        <input class="border border-gray-200 p-2 rounded-xl w-full bg-gray-100"
                                               type="text" value="{{$totalMoney}} ج.م" disabled>
                                    </div>
                                    <div class="mb-6 flex flex-col">
                                        <x-form.label name="Add a Medicine To Your Pharmacy ?"/>
                                        <button wire:click="setPage(1)"
                                                class="transition-colors duration-300 text-xs
                                                text-white text-center font-semibold bg-red-400 hover:bg-red-500
                                                w-auto  rounded-full py-2 px-8">
                                            Add
                                        </button>
                                    </div>
                                    <div class="mb-6 flex flex-col">
                                        <x-form.label name="Have A Customer ?"/>
                                        <a href="/dashboard/pharmacies/roshta/qr"
                                           class="transition-colors duration-300 text-xs
                                           text-center text-white font-semibold bg-green-400 hover:bg-green-500 rounded-full py-2 px-8">
                                            Scan his QR for the Roshta
                                        </a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </main>
                </div>
            </div>
        </div>
    @else
        <div class="headerTitle ">
            <h1 class="text-2xl mb-3 font-bold">Examinations</h1>
            <ul class="pl-14 pageIndex flex gap-2">
                <li>
                    <a href="{{route('dashboard')}}">Dashboard</a>
                </li>
                <li class="chervon">
                    <i class="fa-solid fa-chevron-right"></i>
                </li>
                <li class="">
                    <a href="{{route('pharmacy-index')}}">{{$pharmacy->name}}'s Control Panel</a>
                </li>
                <li class="chervon">
                    <i class="fa-solid fa-chevron-right"></i>
                </li>
                <li class="active">
                    <a href="{{route('pharmacy-index')}}">Add Medicine</a>
                </li>

            </ul>
            <button wire:click="setPage(0)"
                    class="transition-colors duration-300 text-xs mt-4 bg-blue-400  text-white font-semibold bg-white-200 ml-2 hover:bg-blue-500 rounded-full py-2 px-8"
            > < Return To Pharmacy's Control Panel
            </button>
        </div>
        <div class="tableOfContent flex flex-wrap gap-6 mt-7 w-full">
            <div class="flex justify-center items-center" style="width: 75%">
                <div class="flex flex-col p-3 items-center w-full bg-white rounded-xl shadow" style="width: 75%">
                    <main class=" mt-6  space-y-6">
                        <div class="flex flex-col">
                            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                    <label class="ml-2 mr-2 block mb-2 uppercase font-bold text-xs text-gray-400">Use
                                        This input to adjust
                                        the values in the select</label>
                                    <input wire:model.debounce.500="search"
                                           class="border border-gray-200 mb-2 p-2 w-full rounded"
                                           type="text" name="search">
                                    <label class="ml-2 mr-2 block mb-2 uppercase font-bold text-xs text-gray-400">Medicine</label>
                                    <select
                                        class="form-select appearance-none block w-full px-3 py-1.5 text-base font-normal text-gray-700
                    bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded
                    transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none mb-3"
                                        wire:model="medicine">


                                        @if(sizeof($medicines))
                                            <option value="">-- Select Medicine --</option>
                                            @foreach($medicines as $medicine)

                                                <option
                                                    value="{{ $medicine->id }}">{{ $medicine->name }}</option>
                                            @endforeach
                                        @else
                                            <option value="">-- No Matching Results --</option>
                                        @endif
                                    </select>
                                    <label class="ml-2 mr-2 block mb-2 uppercase font-bold text-xs text-gray-400">Quantity</label>
                                    <input wire:model.debounce.500="quantity"
                                           class="border border-gray-200 mb-2 p-2 w-full rounded"
                                           type="number" name="search" value="0" required>
                                    <button wire:click="addMedicineToPharmacy" type="submit"
                                            class="bg-red-500 text-white w-full uppercase font-semibold text-xs py-2 px-10 rounded-2xl hover:bg-red-600 ">
                                        Submit
                                    </button>

                                </div>
                            </div>
                        </div>
                    </main>
                </div>
            </div>
        </div>



    @endif
</div>
