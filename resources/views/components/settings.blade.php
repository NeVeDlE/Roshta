@props(['heading'])
<section class="py-8 max-w-4xl mx-auto">
    <h1 class="text-lg font-bold mb-8 pb-2 border-b">
        {{$heading}}
    </h1>
    <div class="flex">
        <aside class="w-48 flex-shrink-0">
            <h4 class="font-semibold mb-4">Admin</h4>
            <ul>
                <li class="mb-2">
                    <a href="/dashboard/roles" class="{{request()->routeIs('roles')? 'text-blue-500':'' }}">Roles</a>
                </li>
                <li class="mb-2">
                    <a href="/dashboard/diseases" class="{{request()->routeIs('diseases')? 'text-blue-500':'' }}">Diseases</a>
                </li>
                <li class="mb-2">
                    <a href="/dashboard/medicines" class="{{request()->routeIs('medicines')? 'text-blue-500':'' }}">Medicines</a>
                </li>
            </ul>

        </aside>

        <main class="flex-1">
            <x-panel>
                {{$slot}}
            </x-panel>
        </main>
    </div>
</section>
