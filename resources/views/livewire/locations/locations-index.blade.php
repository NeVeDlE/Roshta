<div>
    <div class="headerTitle ">
        <h1 class="text-2xl mb-3 font-bold">Locations</h1>
        <ul class="pl-14 pageIndex flex gap-2">
            <li>
                <a href="{{route('dashboard')}}">Dashboard</a>
            </li>
            <li class="chervon">
                <i class="fa-solid fa-chevron-right"></i>
            </li>
            <li class="active">
                <a href="{{route('location-requests')}}">Location Requests</a>
            </li>
        </ul>
    </div>
    <div class="tableOfContent flex flex-wrap gap-6 mt-7 w-full">
        <div class="flex gap-6 headofTable shadow-md">
            <input wire:model="search" type="search" placeholder="Find Something" class="rounded-xl bg-gray-100">
            @if(!$bool)
                <button wire:click="change"
                        class="transition-colors duration-300 text-xs text-white font-semibold bg-blue-400 ml-2 hover:bg-blue-500 rounded-full py-2 px-8"
                >Manage Pharmacies
                </button>
            @else
                <button wire:click="change"
                        class="transition-colors duration-300 text-xs text-white font-semibold bg-red-400 ml-2 hover:bg-red-500 rounded-full py-2 px-8"
                >Manage Clinics
                </button>
            @endif
        </div>
    </div>
</div>
