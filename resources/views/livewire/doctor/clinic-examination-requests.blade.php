<div>
    <a href="/dashboard/clinics/{{$clinic->id}}/examine"
       class="transition-colors duration-300 text-xs font-semibold bg-blue-200 ml-2 hover:bg-blue-300 rounded-full py-2 px-8"
    >Examine a Patient
    </a>
    <input
        class="relative flex lg:inline-flex items-center bg-gray-100 rounded-xl px-3 py-2 bg-transparent placeholder-black font-semibold text-sm"
        placeholder="Search For Something!" type="search" id="search" wire:model.debounce.400="search">
    <div class="flex flex-col">
        <main class="max-w-6xl mt-6  space-y-6">
            <h1>Requests Page</h1>
            <div class="flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-200">
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
                                        @if($req->status!='accepted')
                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                <button wire:click="accept({{$req->id}})"
                                                        class="transition-colors duration-300 text-xs font-semibold bg-green-200 hover:bg-green-300 rounded-full py-2 px-8">
                                                    Accept
                                                </button>
                                            </td>
                                        @endif
                                        @if($req->status!='cancelled')
                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                <button wire:click="decline({{$req->id}})"
                                                        class="transition-colors duration-300 text-xs font-semibold bg-red-200 hover:bg-red-300 rounded-full py-2 px-8">
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
