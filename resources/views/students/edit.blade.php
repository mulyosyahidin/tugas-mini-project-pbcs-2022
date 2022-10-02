<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Edit Mahasiswa') }}
            </h2>

            <x-link-button route="{{ route('students.index') }}">Kembali</x-link-button>
        </div>
    </x-slot>

    <div class="p-3">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm rounded-lg">
                    <div class="pt-2 pl-6">
                        <h5>Data Mahasiswa</h5>
                    </div>
                    <div class="p-6 bg-white border-b border-gray-200">
                        <form action="{{ route('students.update', $student->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <x-input-label for="study_program_id" :value="__('Program Studi')" />

                                <select name="study_program_id" id="study_program_id" class="@error('study_program_id') border-1 border-red-600 @endif block mt-1 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer">
                                    <option selected disabled>Pilih Program Studi</option>
                                    @foreach ($study_programs as $study_program)
                                        <option value="{{ $study_program->id }}"
                                            @if (old('study_program_id', $student->study_program_id) == $study_program->id) selected @endif>
                                            {{ $study_program->faculty->name }} > {{ $study_program->name }}
                                        </option>
                                    @endforeach
                                </select>

                                @error('study_program_id')
                                <p id="outlined_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                                        error="{{ $errors->first('name') }}"
                                        :value="old('name', $student->name)" required autofocus>{{ __('Nama Mahasiswa') }}</x-text-input>
                                </div>

                                <div>
                                    <x-text-input id="npm" class="block mt-1 w-full" type="text" name="npm"
                                        error="{{ $errors->first('npm') }}"
                                        :value="old('npm', $student->npm)" required>{{ __('NPM Mahasiswa') }}</x-text-input>
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
