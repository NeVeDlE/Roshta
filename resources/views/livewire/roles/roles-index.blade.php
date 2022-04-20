<div>
    @if($page_id==0)
        @can('admin')
            <button wire:click="setPage(1)"
                    class="transition-colors duration-300 text-xs font-semibold bg-blue-200 ml-2 hover:bg-blue-300 rounded-full py-2 px-8"
            >Add a Role
            </button>
        @endcan
        <input
            class="relative flex lg:inline-flex items-center bg-gray-100 rounded-xl px-3 py-2 bg-transparent placeholder-black font-semibold text-sm"
            placeholder="Search For Something!" type="search" id="search" wire:model.debounce.400="search">
        @if($message!=null)
            <p wire:click="$set('message',null)" class="text-red-500 text-xs mt-2">{{$message}}</p>
        @endif
        <div class="flex flex-col">
            <main class="max-w-6xl mt-6  space-y-6">
                <h1>Problems page</h1>

                <div class="flex flex-col">
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach($roles as $role)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <div class="text-sm font-medium text-gray-900">
                                                        <p>
                                                            {{$role->name}}
                                                        </p>
                                                    </div>
                                                </div>
                                            </td>
                                            @can('admin')

                                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                    <button wire:click="editPage({{$role}})"
                                                            class="transition-colors duration-300 text-xs font-semibold bg-green-200 hover:bg-green-300 rounded-full py-2 px-8">
                                                        Edit
                                                    </button>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                    <button wire:click="deleteRole({{$role}})"
                                                            class="transition-colors duration-300 text-xs font-semibold bg-red-200 hover:bg-red-300 rounded-full py-2 px-8">
                                                        Delete
                                                    </button>
                                                </td>
                                            @endcan
                                        </tr>
                                    @endforeach
                                    <!-- More people... -->
                                    </tbody>

                                </table>
                                {{$roles->links()}}
                            </div>
                        </div>
                    </div>
                </div>

            </main>
        </div>
    @elseif($page_id==1)
        <div class="mb-4">
            <button wire:click="setPage(0)"
                    class="transition-colors duration-300 text-xs font-semibold bg-white-200 ml-2 hover:bg-blue-300 rounded-full py-2 px-8"
            > <--Return to Roles table
            </button>
        </div>
        <form wire:submit.prevent="addRole" method="POST">
            @csrf
            <x-form.input wire="name" name="name" :value="old('name')"/>
            <button
                class="transition-colors duration-300 text-xs font-semibold bg-green-200 hover:bg-green-300 rounded-full py-2 px-8">
                Add
            </button>
        </form>
    @else
        <div class="mb-4">
            <button wire:click="setPage(0)"
                    class="transition-colors duration-300 text-xs font-semibold bg-white-200 ml-2 hover:bg-blue-300 rounded-full py-2 px-8"
            > <--Return to Roles table
            </button>
        </div>
        <form wire:submit.prevent="editRole" method="POST">
            @csrf
            <x-form.input wire="name" name="name" :value="old('name',$role->name)"/>
            <button
                class="transition-colors duration-300 text-xs font-semibold bg-green-200 hover:bg-green-300 rounded-full py-2 px-8">
                Edit
            </button>
        </form>
    @endif

</div>
