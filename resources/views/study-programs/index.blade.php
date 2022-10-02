<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Kelola Program Studi') }}
            </h2>

            <x-link-button route="{{ route('study-programs.create') }}">Tambah Data</x-link-button>
        </div>
    </x-slot>

    <div class="p-3">
        <div class="py-12">
            @if (count($study_programs) > 0)
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm rounded-lg">
                    <div class="overflow-x-auto relative">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="py-3 px-6">
                                        #
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        Nama
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        Kode
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        Fakultas
                                    </th>
                                    <th scope="col" class="py-3 px-6"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($study_programs as $study_program)
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                        <th scope="row"
                                            class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $loop->iteration }}
                                        </th>
                                        <td class="py-4 px-6">
                                            {{ $study_program->name }}
                                        </td>
                                        <td class="py-4 px-6">
                                            {{ $study_program->code }}
                                        </td>
                                        <td class="py-4 px-6">
                                            {{ $study_program->faculty->name }}
                                        </td>
                                        <td class="py-4 px-6 text-right">
                                            <x-link-button route="{{ route('study-programs.edit', $study_program->id) }}"
                                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                                Edit
                                            </x-link-button>
                                            <x-link-button route="#" data-id="{{ $study_program->id }}"
                                                class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded btn-delete">
                                                Hapus
                                            </x-link-button>
                                        </td>
                                    </tr>

                                    <form action="{{ route('study-programs.destroy', $study_program->id) }}" method="post" id="delete-form-{{ $study_program->id }}">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                @endforeach
                            </tbody>
                        </table>

                        <div class="p-2">
                            {{ $study_programs->links() }}
                        </div>
                    </div>
                </div>
            </div>
            @else
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm rounded-lg">
                        <div class="p-6 bg-white border-b border-gray-200">
                            <p class="mt-1 max-w-2xl text-sm leading-5 text-gray-500">
                                Tidak ada data fakultas.
                            </p>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>

    <x-slot name="custom_js">
        <script>
            let deleteBtns = document.querySelectorAll('.btn-delete');
            
            deleteBtns.forEach(btn => {
                btn.addEventListener('click', function() {
                    let id = this.getAttribute('data-id');
                    let deleteForm = document.querySelector('#delete-form-'+ id);

                    Swal.fire({
                        title: 'Apakah Anda yakin?',
                        text: "Data yang dihapus tidak dapat dikembalikan. Data mahasiswa di dalamnya juga akan dihapus.",
                        icon: 'warning',
                        showCancelButton: true,
                        cancelButtonColor: '#3085d6',
                        confirmButtonColor: '#d33',
                        confirmButtonText: 'Hapus',
                        cancelButtonText: 'Batal'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            deleteForm.submit();
                        }
                    });
                });
            });
        </script>
    </x-slot>
</x-app-layout>
