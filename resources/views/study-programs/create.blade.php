<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Tambah Program Studi') }}
            </h2>

            <x-link-button route="{{ route('study-programs.index') }}">Kembali</x-link-button>
        </div>
    </x-slot>

    <div class="p-3">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm rounded-lg">
                    <div class="pt-2 pl-6">
                        <h5>Data Program Studi</h5>
                    </div>
                    <div class="p-6 bg-white border-b border-gray-200">
                        <form action="{{ route('study-programs.store') }}" method="POST">
                            @csrf

                            <div class="mb-3">
                                <x-input-label for="faculty_id" :value="__('Fakultas')" />

                                <select name="faculty_id" id="faculty_id" class="@error('faculty_id') border-1 border-red-600 @endif block mt-1 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer">
                                    <option selected disabled>Pilih Fakultas</option>
                                    @foreach ($faculties as $faculty)
                                        <option value="{{ $faculty->id }}"
                                            @if (old('faculty_id') == $faculty->id) selected @endif>{{ $faculty->name }}</option>
                                    @endforeach
                                </select>

                                @error('faculty_id')
                                <p id="outlined_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                                        error="{{ $errors->first('name') }}"
                                        :value="old('name')" required autofocus>{{ __('Nama Program Studi') }}</x-text-input>
                                </div>

                                <div>
                                    <x-text-input id="code" class="block mt-1 w-full" type="text" name="code"
                                        error="{{ $errors->first('code') }}"
                                        :value="old('code')" required>{{ __('Kode Program Studi') }}</x-text-input>
                                </div>
                            </div>

                            <div class="flex items-center justify-end mt-4">
                                <x-button type="submit">
                                    {{ __('Tambah') }}
                                </x-button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
