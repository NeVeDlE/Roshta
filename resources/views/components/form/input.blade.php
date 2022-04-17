@props(['name','type'=>'text','wire'=>'','show'=>false])
<div class="form-group mt-3 mb-5 w-full flex-col">
    <x-form.label :name="$name"/>
    <input wire:model.debounce.500="{{$wire}}" class="ml-5 mr-5 border border-gray-200 p-2 lg:w-96 sm:max-w-md rounded"
           type="{{$type}}" name="{{$name}}"
        {{$attributes(['value'=>old($name)])}}>

    <x-form.error :name="$name"/>

</div>
