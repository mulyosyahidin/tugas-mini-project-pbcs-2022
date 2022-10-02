<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="p-3">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="bg-white overflow-hidden shadow-sm rounded-lg">
                        <div class="p-6 bg-white border-b border-gray-200">
                            <a href="{{ route('faculties.index') }}">
                                <p class="mt-1 max-w-2xl text-sm leading-5 text-gray-500">
                                    {{ $total['faculty'] }}
                                </p>
                                <h3 class="text-lg leading-6 font-medium text-gray-900">
                                    Fakultas
                                </h3>
                            </a>
                        </div>
                    </div>
                    <div class="bg-white overflow-hidden shadow-sm rounded-lg">
                        <div class="p-6 bg-white border-b border-gray-200">
                            <a href="{{ route('study-programs.index') }}">
                                <p class="mt-1 max-w-2xl text-sm leading-5 text-gray-500">
                                    {{ $total['study_program'] }}
                                </p>
                                <h3 class="text-lg leading-6 font-medium text-gray-900">
                                    Program Studi
                                </h3>
                            </a>
                        </div>
                    </div>
                    <div class="bg-white overflow-hidden shadow-sm rounded-lg">
                        <div class="p-6 bg-white border-b border-gray-200">
                            <a href="{{ route('students.index') }}">
                                <p class="mt-1 max-w-2xl text-sm leading-5 text-gray-500">
                                    {{ $total['student'] }}
                                </p>
                                <h3 class="text-lg leading-6 font-medium text-gray-900">
                                    Mahasiswa
                                </h3>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
