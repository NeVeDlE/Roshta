<div>
    @if(!$page_id)
        <div class="mb-6">
            <label class="block mb-2 uppercase font-bold text-xs text-gray-700">Name</label>
            <h2 class="border border-gray-200 p-2 w-full rounded">{{$pharmacy->name}}</h2>
        </div>
        <div class="mb-6">
            <label class="block mb-2 uppercase font-bold text-xs text-gray-700">Place</label>
            <a
                target="_blank"
                href="https://www.google.com/maps/place/27%C2%B044'25.7%22N+30%C2%B050'21.9%22E/@27.740413,30.8413008,17z/data=!4m5!3m4!1s0x0:0x399e449f79a096aa!8m2!3d
                                                {{$pharmacy->lat}}!4d{{$pharmacy->lng}}"
                class="transition-colors duration-300 text-xs font-semibold bg-blue-200 hover:bg-blue-300 rounded-full py-2 px-8">
                View Place
            </a>
        </div>
        <div class="mb-6">
            <label class="block mb-2 uppercase font-bold text-xs text-gray-700">Published</label>
            <h2 class="border border-gray-200 p-2 w-full rounded">{{$pharmacy->created_at->diffForHumans()}}</h2>
        </div>
        <div class="mb-6">
            <label class="block mb-2 uppercase font-bold text-xs text-gray-700">Owner</label>
            <h2 class="border border-gray-200 p-2 w-full rounded">{{$pharmacy->owner->name}}</h2>
        </div>
        <div class="mb-6">
            <label class="block mb-2 uppercase font-bold text-xs text-gray-700">Total Different Medicine type</label>
            <h2 class="border border-gray-200 p-2 w-full rounded">{{$pharmacy->medicines()->count()}}</h2>
        </div>
        <div class="mb-6">
            <label class="block mb-2 uppercase font-bold text-xs text-gray-700">Total Different Medicine
                Quantity</label>
            <h2 class="border border-gray-200 p-2 w-full rounded">{{$totalMedicines}}</h2>
        </div>
        <div class="mb-6">
            <label class="block mb-2 uppercase font-bold text-xs text-gray-700">Expected Money After Selling Every
                thing</label>
            <h2 class="border border-gray-200 p-2 w-full rounded">{{$totalMoney}} ج.م</h2>
        </div>
        <div class="mb-6 items-center justify-center">
            <label class="block mb-2 uppercase font-bold text-xs text-gray-700">Add a Medicine To Your Pharmacy
                ?</label>
            <button wire:click="setPage(1)"
                    class="transition-colors duration-300 text-xs font-semibold bg-green-200 hover:bg-green-300 rounded-full py-2 px-8">
                Add
            </button>
        </div>
    @else
        <div class="mb-4">
            <button wire:click="setPage(0)"
                    class="transition-colors duration-300 text-xs font-semibold bg-white-200 ml-2 hover:bg-blue-300 rounded-full py-2 px-8"
            > <--Return To Pharmacy's Info
            </button>
        </div>
        <div class="flex justify-center">
            <div class="mb-3 xl:w-96">
                <label class="ml-2 mr-2 block mb-2 uppercase font-bold text-xs text-gray-400">Use This input to adjust
                    the values in the select</label>
                <input wire:model.debounce.500="search" class="border border-gray-200 mb-2 p-2 w-full rounded"
                       type="text" name="search">
                <label class="ml-2 mr-2 block mb-2 uppercase font-bold text-xs text-gray-400">Medicine</label>
                <select
                    class="form-select appearance-none block w-full px-3 py-1.5 text-base font-normal text-gray-700
                    bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded
                    transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none mb-3"
                    wire:model="medicine">


                    @if(sizeof($medicines))
                        @foreach($medicines as $medicine)
                            <option value="">-- Select Medicine --</option>
                            <option
                                value="{{ $medicine->id }}">{{ $medicine->name }}</option>
                        @endforeach
                    @else
                        <option value="">-- No Matching Results --</option>
                    @endif
                </select>
                <label class="ml-2 mr-2 block mb-2 uppercase font-bold text-xs text-gray-400">Quantity</label>
                <input wire:model.debounce.500="quantity" class="border border-gray-200 mb-2 p-2 w-full rounded"
                       type="number" name="search" value="0" required>
                <button wire:click="addMedicineToPharmacy" type="submit"
                        class="bg-blue-500 text-white uppercase font-semibold text-xs py-2 px-10 rounded-2xl hover:bg-blue-600 ">
                    Submit
                </button>
            </div>

        </div>


    @endif
</div>
