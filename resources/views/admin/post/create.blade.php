
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Admin dashboard - post create') }}
        </h2>
    </x-slot>

    @if(Session::has('msg'))
        <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('msg') }}</p>
    @endif
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form action="{{ route('admin.post.store')}}" method="POST" enctype="multipart/form-data">
                @csrf

                <div>
                    <x-input-label for="title" :value="__('Title')" />
                    <x-text-input id="title" name="title" type="test" class="mt-1 block w-full" :value="old('title')" required autocomplete="on" />
                    <x-input-error class="mt-2" :messages="$errors->get('title')" />
                </div>
                
                <div>
                    <textarea name="detail" cols="30" rows="10">{{ old('detail') }}</textarea>
                    <x-input-error class="mt-2" :messages="$errors->get('detail')" />
                </div>
                
                <div>
                    <x-input-label for="category_id" :value="__('Category')" />
                    <select name="category_id" required>
                        <option value="0" disabled selected>{{ __('Select category') }}</option>
                        @foreach ($categories as $item)
                            <option value="{{ $item->id }}">{{  $item->name }}</option>
                        @endforeach                    
                    </select>
                    <x-input-error class="mt-2" :messages="$errors->get('category')" />
                </div>

                <input type="file" name="preview" accept="image/*">
                <label for="">
                    <input type="checkbox" name="active">
                </label>
                <input type="submit" value="send">
                <x-primary-button>{{ __('Save') }}</x-primary-button>

            </form>
        </div>
    </div>
</x-app-layout>
