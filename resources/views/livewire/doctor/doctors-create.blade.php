<div>
    <div class="headerTitle mb-4">
        <h1 class="text-2xl mb-3 font-bold">Join Us</h1>
        <ul class="pl-14 pageIndex flex gap-2">
            <li>
                <a href="{{route('dashboard')}}">Dashboard</a>
            </li>
            <li class="chervon">
                <i class="fa-solid fa-chevron-right"></i>
            </li>
            <li class="active">
                <a href="{{route('doctors-register')}}">Doctor Registration</a>
            </li>

        </ul>
    </div>
    <div class="flex justify-center items-center">
        <div class="flex flex-col p-3 items-center w-full bg-white rounded-xl shadow" style="width: 75%">
            <main class=" mt-6  space-y-6">
                <div class="flex flex-col">
                    <div class="my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                            <form wire:submit.prevent="add" method="POST" enctype="multipart/form-data">
                                @csrf
                                <x-form.input wire="university" name="university" :value="old('university')"/>
                                <div class="mb-6">
                                    <x-form.label name="Speciality"/>
                                    <select class="form-select appearance-none block w-full px-3 py-1.5 text-base font-normal text-gray-700
                    bg-gray-100 bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded-xl
                    transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none mb-3"
                                            wire:model="specialization_id" name="speciality_id" id="speciality_id">
                                        @foreach(\App\Models\Specialization::all() as $Speciality)

                                            <option value="{{$Speciality->id}}"
                                                {{old('specialization_id')==$Speciality->id ?'selected':''}}
                                            >{{ucwords($Speciality->name)}}</option>

                                        @endforeach
                                    </select>
                                    @error('specialization_id')
                                    <p class="text-red-500 text-xs mt-2">{{$message}}</p>
                                    @enderror
                                </div>
                                <x-form.input wire="graduate_date" name="graduate_date" type="date"
                                              :value="old('graduate_date')"/>
                                <x-form.input wire="degree" name="degree" type="file" :value="old('degree')"/>
                                <div class="justify-between flex">
                                    <a href="/"
                                       class="transition-colors duration-300 text-xs font-semibold text-white bg-red-400 hover:bg-red-500 rounded-full py-2 px-8">
                                        Close
                                    </a>
                                    <button
                                        class="transition-colors duration-300 text-xs font-semibold text-white bg-blue-400 hover:bg-blue-500 rounded-full py-2 px-8">
                                        Submit
                                    </button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>

            </main>
        </div>
    </div>
</div>
