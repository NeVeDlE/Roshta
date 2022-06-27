<x-dashboard-layout>
    <div class="headerTitle ">
        <h1 class="text-2xl mb-3 font-bold">Examination</h1>
        <ul class="pl-14 pageIndex flex gap-2">
            <li>
                <a href="{{route('dashboard')}}">Dashboard</a>
            </li>
            <li class="chervon">
                <i class="fa-solid fa-chevron-right"></i>
            </li>
            <li class="">
                <a href="{{route('clinic-management')}}">{{$clinic->name}}</a>
            </li>
            <li class="chervon">
                <i class="fa-solid fa-chevron-right"></i>
            </li>
            <li class="">
                <a href="/dashboard/clinics/{{$clinic->id}}/examine">Examine Patient</a>
            </li>
            <li class="chervon">
                <i class="fa-solid fa-chevron-right"></i>
            </li>
            <li class="active">
                <a href="/dashboard/clinics/{{$clinic->id}}/examine/{{$patient->id}}">{{$patient->name}}'s Examination's
                    Process</a>
            </li>
        </ul>
    </div>
    <div class="tableOfContent flex flex-wrap gap-6 mt-7 w-full">
        <div class="flex justify-center items-center" style="width: 75%">
            <div class="flex flex-col p-3 items-center w-full bg-white rounded-xl shadow" style="width: 75%">
                <main class=" mt-6  space-y-6" style="width: 75%;">
                    <div class="flex flex-col">
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                <div class="mb-6">
                                    <x-form.label name="Patient's Name"/>
                                    <input class="border border-gray-200 p-2 rounded-xl w-full bg-gray-100"
                                           type="text" value="{{$patient->name}}" disabled>
                                </div>
                                <div class="mb-6">
                                    <x-form.label name="Age"/>
                                    <input class="border border-gray-200 p-2 rounded-xl w-full bg-gray-100"
                                           type="text" value="{{2022-(int)($patient->birthday[0].$patient->birthday[1]
.$patient->birthday[2].$patient->birthday[3])}}" disabled>
                                </div>
                                <form action="/dashboard/clinics/{{$clinic->id}}/examine/{{$patient->id}}" method="post">
                                    @csrf
                                    <div class="mb-6">
                                        <x-form.textarea name="report" size="200">{{old('report')}}</x-form.textarea>
                                    </div>
                                    <div class="mb-6">
                                        <label for="diseases"
                                               class="ml-2 mr-2 block mb-2 uppercase font-bold text-xs text-gray-400">Diseases</label>
                                        <select multiple
                                                id="diseases" name="diseases[]" required class="form-select appearance-none block w-full px-3 py-1.5 text-base font-normal text-gray-700
                    bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded
                    transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none mb-3">
                                            @foreach(\App\Models\Disease::all() as $disease)
                                                <option value="{{$disease->id}}">{{ucwords($disease->name)}}</option>
                                            @endforeach
                                        </select>
                                        <x-form.error name="diseases"/>
                                    </div>
                                    <div class="mb-6">
                                        <label for="medicines"
                                               class="ml-2 mr-2 block mb-2 uppercase font-bold text-xs text-gray-400">medicines</label>
                                        <select multiple
                                                id="medicines" name="medicines[]" required class="form-select appearance-none block w-full px-3 py-1.5 text-base font-normal text-gray-700
                    bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded
                    transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none mb-3">
                                            @foreach(\App\Models\medicine::all() as $medicine)
                                                <option value="{{$medicine->id}}">{{ucwords($medicine->name)}}</option>
                                            @endforeach
                                        </select>

                                        <x-form.error name="medicines"/>

                                    </div>
                                    <div class="mb-6 flex ">

                                        <button type="submit"
                                                class="transition-colors duration-300 text-xs
                                                text-white text-center font-semibold bg-red-400 hover:bg-red-500
                                                w-auto  rounded-full py-2 px-8">
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


</x-dashboard-layout>
