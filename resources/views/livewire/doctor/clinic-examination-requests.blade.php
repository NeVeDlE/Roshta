<div>
    <div class="headerTitle ">
        <h1 class="text-2xl mb-3 font-bold">{{auth()->user()->locations->name}}'s Examinations Requests</h1>
        <ul class="pl-14 pageIndex flex gap-2">
            <li>
                <a href="{{route('dashboard')}}">Dashboard</a>
            </li>
            <li class="chervon">
                <i class="fa-solid fa-chevron-right"></i>
            </li>
            <li class="active">
                <a href="{{route('clinic-management')}}">{{auth()->user()->locations->name}}'s Control Panel</a>
            </li>
        </ul>
    </div>
    <div class="tableOfContent flex flex-wrap gap-6 mt-7 w-full">
        <div class="flex gap-6 headofTable shadow-md">
            <input wire:model="search" type="search" placeholder="Find Something" class="rounded-xl bg-gray-100">
            <a href="/dashboard/clinics/{{$clinic->id}}/examine"
               class="transition-colors duration-300 text-xs font-semibold bg-blue-400 text-white ml-2 hover:bg-blue-500 rounded-full py-2 px-8"
            >Examine a Patient
            </a>

        </div>
        <div class="flex flex-col">
            <main class="mt-6 space-y-6">
                <div class="flex flex-col">
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                <table class="min-w-full divide-y rounded-xl divide-gray-200">
                                    <thead class="bg-white divide-y divide-gray-200">
                                    <th class="px-6 py-4 whitespace-nowrap">Patient's Name</th>
                                    <th class="px-6 py-4 whitespace-nowrap">Status</th>
                                    <th class="px-6 py-4 whitespace-nowrap">Accept</th>
                                    <th class="px-6 py-4 whitespace-nowrap">Decline</th>
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
                                            @if($req->status=='accepted')
                                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                    <button wire:click="accept({{$req->id}})" disabled
                                                            class="transition-colors duration-300 text-white text-xs font-semibold bg-blue-400 hover:bg-blue-500 rounded-full py-2 px-8">
                                                        Accept
                                                    </button>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                    <button wire:click="decline({{$req->id}})"
                                                            class="transition-colors duration-300 text-white text-xs font-semibold bg-red-400 hover:bg-red-500 rounded-full py-2 px-8">
                                                        Decline
                                                    </button>
                                                </td>
                                            @elseif($req->status=='declined')
                                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                    <button wire:click="accept({{$req->id}})"
                                                            class="transition-colors duration-300 text-white text-xs font-semibold bg-blue-400 hover:bg-blue-500 rounded-full py-2 px-8">
                                                        Accept
                                                    </button>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                    <button wire:click="decline({{$req->id}})" disabled
                                                            class="transition-colors duration-300 text-white text-xs font-semibold bg-red-400 hover:bg-red-500 rounded-full py-2 px-8">
                                                        Decline
                                                    </button>
                                                </td>
                                            @else
                                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                    <button wire:click="accept({{$req->id}})" disabled
                                                            class="transition-colors duration-300 text-white text-xs font-semibold bg-blue-400 hover:bg-blue-500 rounded-full py-2 px-8">
                                                        Accept
                                                    </button>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                    <button wire:click="decline({{$req->id}})" disabled
                                                            class="transition-colors duration-300 text-white text-xs font-semibold bg-red-400 hover:bg-red-500 rounded-full py-2 px-8">
                                                        Decline
                                                    </button>
                                                </td>
                                            @endif
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
    </div>


</div>
