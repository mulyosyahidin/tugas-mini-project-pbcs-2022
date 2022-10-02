<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Edit Fakultas') }}
            </h2>

            <x-link-button route="{{ route('faculties.index') }}">Kembali</x-link-button>
        </div>
    </x-slot>

    <div class="p-3">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm rounded-lg">
                    <div class="pt-2 pl-6">
                        <h5>Data Fakultas</h5>
                    </div>
                    <div class="p-6 bg-white border-b border-gray-200">
                        <form action="{{ route('faculties.update', $faculty->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                                        error="{{ $errors->first('name') }}"
                                        :value="old('name', $faculty->name)" required autofocus>{{ __('Nama Fakultas') }}</x-text-input>
                                </div>

                                <div>
                                    <x-text-input id="code" class="block mt-1 w-full" type="text" name="code"
                                        error="{{ $errors->first('code') }}"
                                        :value="old('code', $faculty->code)" required>{{ __('Kode Fakultas') }}</x-text-input>
                                </div>
                            </div>

                            <div class="flex items-center justify-end mt-4">
                                <x-button type="submit">
                                    {{ __('Simpan') }}
                                </x-button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
