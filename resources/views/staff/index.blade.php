@extends('layouts.app')

@section('head')
    <title>List Data Staff</title>
@endsection

@section('content')
    @extends('components.navbar')

    {{-- start content --}}

    <section class="w-full">
        <div class="container mx-auto w-full">
            <div class="w-full mx-auto my-10 p-7 flex flex-col gap-4">
                <div class="header py-4 mx-auto w-full flex justify-between ">
                    <div class="flex w-fit h-fit gap-2">
                        <div class="w-2 rounded-xl bg-red-500">
                        </div>
                        <h1 class="text-black font-bold  text-center text-3xl">
                            List Staff
                        </h1>
                    </div>
                    <div class="right flex gap-2">
                        <input id="search" placeholder="Cari..." type="text"
                            class="w-58 px-3 h-full rounded-[8px] border border-slate-300">
                        <button class="px-3 py-2 rounded-[8px] cursor-pointer bg-red-500 text-white"><a
                                href="{{ route('staff.create') }}"> Tambah Staff</a></button>
                    </div>
                </div>
                @if (session('success'))
                    <script>
                        Swal.fire({
                            title: "{{ session('success') }}",
                            icon: "success"
                        });
                    </script>
                @endif
                <div class="overflow-x-auto rounded-xl shadow-md border border-gray-300">
                    <table class="min-w-full text-left border-collapse">
                        <thead class="bg-blue-100 text-gray-700">
                            <tr>
                                <th class="px-4 py-6">No</th>
                                <th class="px-4 py-6 min-w-[150px]">Nama</th>
                                <th class="px-4 py-6">Jenis Kelamin</th>
                                <th class="px-4 py-6">Status</th>
                                <th class="px-4 py-6">Jabatan</th>
                                <th class="px-4 py-6 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="staffTable" class="bg-white divide-y divide-gray-200">
                            @foreach ($staffs as $key => $staff)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-4 py-3 ">{{ $key + 1 }}</td>
                                    <td class="px-4 py-3">
                                        <div class="flex items-center gap-3">
                                            <img src="{{ $staff->avatar ? asset('storage/' . $staff->avatar) : asset('storage/default-avatar.png') }}"
                                                alt="Avatar"
                                                class="w-12 h-12 object-cover rounded-xl border border-gray-200" />
                                            <span>{{ $staff->name }}</span>
                                        </div>
                                    </td>
                                    <td class="px-4 py-3">
                                        {{ $staff->gender == 'male' ? 'Laki-laki' : 'Perempuan' }}
                                    </td>
                                    <td class="px-4 py-3">
                                        {{ $staff->status == 'married' ? 'Sudah Menikah' : 'Belum Menikah' }}
                                    </td>
                                    <td class="px-4 py-3">-</td>
                                    <td class="px-4 py-3">
                                        <div class="flex justify-center gap-2">
                                            <a href="{{ route('staff.edit', $staff->id) }}">
                                                <button
                                                    class="p-2 bg-blue-500 hover:bg-blue-600 text-white rounded-md transition">
                                                    <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Z" />
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M19.5 7.125 18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                                    </svg>
                                                </button>
                                            </a>
                                            <form id="delete-form-{{ $staff->id }}"
                                                action="{{ route('staff.delete', $staff->id) }}" method="POST">
                                                @csrf
                                                <button onclick="confirmDelete({{ $staff->id }})" type="button"
                                                    class="p-2 bg-red-500 hover:bg-red-600 text-white rounded-md transition">
                                                    <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M14.74 9l-.346 9m-4.788 0L9.26 9M9 3.75V4.5h6v-.75m-6 0A2.25 2.25 0 0 0 6.75 6.75H17.25A2.25 2.25 0 0 0 15 3.75H9Z" />
                                                    </svg>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            <tr class="bg-gray-50">
                                <td colspan="6" class="px-4 py-2 text-center">
                                    {{ $staffs->links('pagination::tailwind') }}
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <div id="empty" class="bg-blue-200 hidden w-full h-32 flex items-center justify-center">
                        <h1 class="font-medium text-base">Tidak ada data yang di temukan</h1>
                    </div>
                </div>


            </div>
        </div>
    </section>


    <script>
        const searchInput = document.getElementById('search');
        const staffTable = document.querySelectorAll('#staffTable tr');
        const empty = document.getElementById('empty');

        searchInput.addEventListener('keyup', () => {
            const keyword = searchInput.value.toLowerCase();
            let visibleCount = 0;

            staffTable.forEach((row) => {
                const name = row.querySelectorAll('td')[1].textContent.toLowerCase();
                if (name.includes(keyword)) {
                    row.style.display = '';
                    visibleCount++;
                } else {
                    row.style.display = 'none';
                }

                empty.classList.toggle('hidden', visibleCount > 0);
            })

        })

        function confirmDelete(id) {
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form-' + id).submit();
                }
            });
        }
    </script>
    {{-- end content --}}
@endsection
