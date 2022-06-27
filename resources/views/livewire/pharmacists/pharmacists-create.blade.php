
<div>
    <div class="headerTitle ">
        <h1 class="text-2xl mb-3 font-bold">Join Us</h1>
        <ul class="pl-14 pageIndex flex gap-2 mb-4">
            <li>
                <a href="{{route('dashboard')}}">Dashboard</a>
            </li>
            <li class="chervon">
                <i class="fa-solid fa-chevron-right"></i>
            </li>
            <li class="active">
                <a href="{{route('pharmacists-register')}}">Pharmacy Registration</a>
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
                                <x-form.input wire="graduate_date" name="graduate_date" type="date"
                                              :value="old('graduate_date')"/>
                                <x-form.input wire="degree" name="degree" type="file" :value="old('degree')"/>
                                <div class="justify-between flex">
                                    <a href="/"
                                       class="transition-colors duration-300 text-xs font-semibold bg-red-400 hover:bg-red-500 rounded-full py-2 px-8">
                                        Close
                                    </a>
                                    <button
                                        class="transition-colors duration-300 text-xs font-semibold bg-blue-400 hover:bg-blue-500 rounded-full py-2 px-8">
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

