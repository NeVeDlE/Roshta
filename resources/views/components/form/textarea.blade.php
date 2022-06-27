@props(['name','wire'=>''])
<div class="mb-6">
    <x-form.label :name="$name"/>
    <textarea wire:model="{{$wire}}" class="border border-gray-200 rounded-xl bg-gray-100 p-2 w-full" name="{{$name}}" id="{{$name}}"
              required>{{$slot ?? old($name)}}</textarea>
    <x-form.error :name="$name"/>
</div>
