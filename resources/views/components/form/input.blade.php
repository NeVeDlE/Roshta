@props(['name','type'=>'text','wire'=>''])
<div class="mb-6">
    <x-form.label :name="$name"/>
    <input wire:model.debounce.500="{{$wire}}" class="border border-gray-200 p-2 w-full rounded"
           type="{{$type}}" name="{{$name}}"
        {{$attributes(['value'=>old($name)])}}>

    <x-form.error :name="$name"/>

</div>
