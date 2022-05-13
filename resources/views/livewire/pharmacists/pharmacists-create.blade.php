<div>
    <form wire:submit.prevent="add" method="POST" enctype="multipart/form-data">
        @csrf

        <x-form.input wire="university" name="university" :value="old('university')"/>
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
