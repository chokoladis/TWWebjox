<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Admin dashboard - posts') }}
        </h2>
    </x-slot>

    @if(Session::has('msg'))
        <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('msg') }}</p>
    @endif
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{ dump($posts); }}
            
            <div class="actions">
                @can('create', auth()->user())
                    <a href="{{ route('admin.post.create') }}">{{ __('Post create') }}</a>
                @endcan
            </div>
        </div>
    </div>

</x-app-layout>
