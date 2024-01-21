<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Admin dashboard - posts') }}
        </h2>
    </x-slot>

    @if(Session::has('msg'))
        <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('msg') }}</p>
    @endif
    {{-- sort, perpage --}}
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @foreach ($posts as $post)
                @php
                    $detail = (mb_strlen($post->detail) > 30) 
                        ? mb_substring($post->detail,0, 30).'...'
                        : $post->detail;
                @endphp
                <div class="card" style="width: 18rem;">
                    <img src="{{ '/storage/'.$post->file->path }}" class="card-img-top" alt="{{ $post->title }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $post->title }}</h5>
                        <p class="card-text">{{ $detail }}</p>
                        @can('edit',auth()->user())
                            <a href="{{ route('admin.post.edit', $post)  }}" class="btn btn-primary">Edit</a>
                        @endcan
                    </div>
                </div>
            @endforeach
            
            {{-- pagination --}}
            <div class="actions">
                @can('create', auth()->user())
                    <a href="{{ route('admin.post.create') }}" class="btn btn-success">{{ __('Post create') }}</a>
                @endcan
            </div>
        </div>
    </div>

</x-app-layout>
