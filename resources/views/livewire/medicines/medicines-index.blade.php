<div>
    <div class="headerTitle ">
        <h1 class="text-2xl mb-3 font-bold">Medicines</h1>
        <ul class="pl-14 pageIndex flex gap-2">
            <li>
                <a href="{{route('dashboard')}}">Dashboard</a>
            </li>
            <li class="chervon">
                <i class="fa-solid fa-chevron-right"></i>
            </li>
            <li class="active">
                <a href="{{route('medicines')}}">Medicines</a>
            </li>
        </ul>
    </div>
    @if($page_id==0)
        <div class="tableOfContent flex flex-wrap gap-6 mt-7 w-full">
            <div class="flex gap-6 headofTable shadow-md">
                <input wire:model="search" type="search" placeholder="Find Something" class="rounded-xl bg-gray-100">
                <button wire:click="setPage(1)"
                        class="transition-colors duration-300 text-xs text-white font-semibold bg-blue-400 ml-2 hover:bg-blue-500 rounded-full py-2 px-8"
                >Add a Medicine
                </button>
            </div>
            @if($message!=null)
                <p wire:click="$set('message',null)" class="text-green-500 text-xs mt-2">{{$message}}</p>
            @endif
            <div class="flex flex-col" >
                <main class=" mt-6  space-y-6">
                    <div class="flex flex-col">
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                    <table class="min-w-full divide-y rounded-xl divide-gray-200">
                                        <thead class="bg-white divide-y divide-gray-200">
                                        <th class="px-6 py-4 whitespace-nowrap">Name</th>
                                        <th class="px-6 py-4 whitespace-nowrap">Medicine Details</th>
                                        <th class="px-6 py-4 whitespace-nowrap">Price</th>
                                        <th class="px-6 py-4 whitespace-nowrap"></th>
                                        <th class="px-6 py-4 whitespace-nowrap"></th>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-gray-200">
                                        @foreach($medicines as $medicine)
                                            <tr>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="flex items-center">
                                                        <div class="text-sm font-medium text-gray-900">
                                                            <p>
                                                                {{$medicine->name}}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="flex items-center">
                                                        <div class="text-sm font-medium text-gray-900">
                                                            <p>
                                                                {{$medicine->description}}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="flex items-center">
                                                        <div class="text-sm font-medium text-gray-900">
                                                            <p>
                                                                {{$medicine->price}} ج.م
                                                            </p>
                                                        </div>
                                                    </div>
                                                </td>
                                                @can('admin')

                                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                        <button wire:click="editPage({{$medicine}})"
                                                                class="transition-colors duration-300 text-xs font-semibold text-white bg-blue-400 hover:bg-blue-500 rounded-full py-2 px-8">
                                                            Edit
                                                        </button>
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                        <button wire:click="deleteMedicine({{$medicine}})"
                                                                class="transition-colors duration-300 text-xs font-semibold text-white bg-red-400 hover:bg-red-500 rounded-full py-2 px-8">
                                                            Delete
                                                        </button>
                                                    </td>
                                                @endcan
                                            </tr>
                                        @endforeach
                                        <!-- More people... -->
                                        </tbody>

                                    </table>
                                    {{$medicines->links()}}
                                </div>
                            </div>
                        </div>
                    </div>

                </main>
            </div>
            @elseif($page_id==1)
                <div class="my-4 flex flex-col  items-center">

                    <div style="width: 75%">
                        <button wire:click="setPage(0)"
                                class="transition-colors duration-300 text-xs text-white font-semibold bg-white-200 ml-2 bg-blue-400 hover:bg-blue-500 rounded-full py-2 px-8"
                        > <--Return Medicines table
                        </button>
                    </div>
                </div>
                <div class="flex justify-center items-center">

                    <div class="flex flex-col p-3 items-center w-full bg-white rounded-xl shadow" style="width: 75%">
                        <main class=" mt-6  space-y-6">
                            <div class="flex flex-col">
                                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">

                                        <form wire:submit.prevent="addMedicine" method="POST"
                                              enctype="multipart/form-data">
                                            @csrf
                                            <x-form.input wire="name" name="name" :value="old('name')"/>
                                            <x-form.textarea name="description"
                                                             wire="description">{{old('description')}}</x-form.textarea>
                                            <x-form.input wire="price" name="price" :value="old('price')"/>
                                            <x-form.input wire="photo" name="photo" type="file" :value="old('photo')"/>
                                            <button
                                                class="transition-colors duration-300 text-xs font-semibold bg-red-400 hover:bg-red-500 rounded-full py-2 px-8">
                                                Add
                                            </button>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </main>
                    </div>
                </div>
            @else
                <div class="my-4 flex flex-col  items-center">

                    <div style="width: 75%">
                        <button wire:click="setPage(0)"
                                class="transition-colors duration-300 text-xs text-white font-semibold bg-white-200 ml-2 bg-blue-400 hover:bg-blue-500 rounded-full py-2 px-8"
                        > <--Return Medicines table
                        </button>
                    </div>
                </div>
                <div class="flex justify-center items-center">

                    <div class="flex flex-col p-3 items-center w-full bg-white rounded-xl shadow" style="width: 75%">
                        <main class=" mt-6  space-y-6">
                            <div class="flex flex-col">
                                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">

                                        <form wire:submit.prevent="editMedicine" method="POST"
                                              enctype="multipart/form-data">
                                            @csrf
                                            <x-form.input wire="name" name="name" :value="old('name',$medicine->name)"/>
                                            <x-form.textarea name="description"
                                                             wire="description">{{old('description',$medicine->description)}}</x-form.textarea>
                                            <x-form.input wire="price" name="price"
                                                          :value="old('price',$medicine->price)"/>
                                            <div class="flex mt-6">
                                                <p>{{$photo}}</p>
                                                <div class="flex-1">
                                                    <x-form.input wire="photo" name="photo" type="file"
                                                                  :value="old('photo',$medicine->photo)"/>
                                                </div>
                                                @if($photo)
                                                    <img src="{{$photo->temporaryUrl()}}" alt="temp" width="100">
                                                @elseif($medicine->photo)
                                                    <img src="{{asset('storage/'.$medicine->photo)}}"
                                                         alt="{{$medicine->name}}'photo"
                                                         class="rounded-xl ml-6" width="100">
                                                @endif

                                            </div>
                                            <button
                                                class="transition-colors duration-300 text-xs font-semibold bg-green-200 hover:bg-green-300 rounded-full py-2 px-8">
                                                Edit
                                            </button>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </main>
                    </div>
                </div>

            @endif

        </div>
</div>
