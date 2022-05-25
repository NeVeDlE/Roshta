<x-dashboard-layout>

    <x-settings heading="{{$clinic->name}}'s Examination Process">

        <div>
            <div class="flex flex-col">
                <main class="max-w-6xl mx-auto mt-6 space-y-6">
                    <h4 class="block mb-2 uppercase font-bold text-xs text-gray-700">Patient</h4>
                    <div class="mb-6">
                        <label class="block mb-2 uppercase font-bold text-xs text-gray-700">Name</label>
                        <h2 class="border border-gray-200 p-2 w-full rounded">{{$patient->name}}</h2>
                    </div>
                    <div class="mb-6">
                        <label class="block mb-2 uppercase font-bold text-xs text-gray-700">Age</label>
                        <h2 class="border border-gray-200 p-2 w-full rounded">{{2022-(int)($patient->birthday[0].$patient->birthday[1]
.$patient->birthday[2].$patient->birthday[3])}}</h2>
                    </div>

                    <h4 class="block mb-2 uppercase font-bold text-xs text-gray-700">Make An Examination</h4>
                    <form action="/dashboard/clinics/{{$clinic->id}}/examine/{{$patient->id}}" method="post">
                        @csrf
                        <div class="mb-6">
                            <x-form.textarea name="report">{{old('report')}}</x-form.textarea>
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
                        <x-submit-button>Submit</x-submit-button>

                    </form>


                </main>
            </div>
        </div>


    </x-settings>

</x-dashboard-layout>
