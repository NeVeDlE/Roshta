<div>
    <form wire:submit.prevent="add" method="POST" enctype="multipart/form-data">
        @csrf

        <x-form.input wire="university" name="university" :value="old('university')"/>
        <div class="mb-6">
            <label for="specialization"
                   class="block mb-2 uppercase font-bold text-xs text-gray-700">Speciality</label>
            <select wire:model="specialization_id" name="speciality_id" id="speciality_id">
                @foreach(\App\Models\Specializations::all() as $Speciality)

                        <option value="{{$Speciality->id}}"
                            {{old('specialization_id')==$Speciality->id ?'selected':''}}
                        >{{ucwords($Speciality->name)}}</option>

                @endforeach
            </select>
            @error('specialization_id')
            <p class="text-red-500 text-xs mt-2">{{$message}}</p>
            @enderror
        </div>
        <x-form.input wire="graduate_date" name="graduate_date" type="date" :value="old('graduate_date')"/>
        <x-form.input wire="degree" name="degree" type="file" :value="old('degree')"/>
        <div class="justify-between flex">
            <a href="/"
               class="transition-colors duration-300 text-xs font-semibold bg-red-200 hover:bg-red-300 rounded-full py-2 px-8">
                Close
            </a>
            <button
                class="transition-colors duration-300 text-xs font-semibold bg-green-200 hover:bg-green-300 rounded-full py-2 px-8">
                Submit
            </button>
        </div>
    </form>
</div>
