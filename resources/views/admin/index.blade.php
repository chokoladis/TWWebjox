<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Admin dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="list-group">
                <a href="{{ route('admin.post.index') }}" class="list-group-item list-group-item-action">{{ __('Posts') }}</a>
              </div>
        </div>
    </div>
</x-app-layout>
