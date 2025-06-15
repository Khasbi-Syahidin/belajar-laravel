@extends('layouts.app')

@section('head')
    <title>List Data Staff</title>
@endsection

@section('content')
    @extends('components.navbar')

    {{-- start content --}}

    <section class="w-full">
        <div class="container mx-auto w-full">
            <div class="w-full mx-auto my-20 p-7 flex flex-col gap-4">
                <div class="header py-4 mx-auto">
                    <h1 class="text-black font-bold text-center text-3xl">
                        List Staff
                    </h1>
                </div>
                @if (session('success'))
                    <div class="w-full p-5 bg-green-300">
                        {{ session('success') }}
                    </div>
                @endif
                <table cellspacing="3" class="table-auto  w-full h-ful border-collapse border border-gray-500">
                    <tr class="bg-blue-200 w-full h-fit text-start">
                        <th class="px-2 py-1 w-5  text-start">No </th>
                        <th class="px-2 py-1 w-5 min-w-20  text-start">Nama </th>
                        <th class="px-2 py-1 w-5 min-w-20  text-start">Jenis Kelamin </th>
                        <th class="px-2 py-1 w-5 min-w-20  text-start">Jabatan</th>
                        <th class="px-2 py-1 w-5 min-w-20  text-start">Status</th>
                        <th class="px-2 py-1 w-5 min-w-20  text-start">Aksi</th>
                    </tr>
                    @foreach ($staffs as $key => $staff)
                        <tr class="text-start px-2 py-1">
                            <td class="px-2 py-1 w-5">{{ $key + 1 }}</td>
                            <td class="px-2 py-1 w-5 min-w-20">
                                <div class="flex gap-3 items-center">
                                    <img src="{{ $staff->avatar ? asset('storage/' . $staff->avatar) : asset('storage/default-avatar.png') }}"
                                        alt="" class="w-14 h-14 rounded-2xl overflow-hidden">
                                    <span>{{ $staff->name }}</span>
                                </div>
                            </td>
                            <td class="px-2 py-1 w-5 min-w-20">{{ $staff->gender == 'male' ? 'Laki Laki' : 'Perempuan' }}
                            </td>
                            <td class="px-2 py-1 w-5 min-w-20">
                                {{ $staff->status == 'married' ? 'Sudah Menikah' : 'Belum Menikah' }}</td>
                            <td class="px-2 py-1 w-5 min-w-20">-</td>
                            <td class="px-2 py-1 w-5 flex gap-2">
                                <a href="{{ route('staff.edit', $staff->id) }}">
                                    <button href="{{ route('staff.edit', $staff->id) }}"
                                        class="p-2 cursor-pointer rounded-[8px] text-xs text-white bg-blue-500">
                                        <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                        </svg>
                                    </button>
                                </a>
                                <form action="{{ route('staff.delete', $staff->id) }}" method="POST"
                                    onsubmit="confirmDelete() ">
                                    @csrf
                                    <button class="p-2 cursor-pointer rounded-[8px] text-xs text-white bg-red-500">
                                        <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                        </svg>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </table>

            </div>
        </div>
    </section>


    <script>
        function confirmDelete() {
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
                    Swal.fire({
                        title: "Deleted!",
                        text: "Your file has been deleted.",
                        icon: "success"
                    });
                }
            });
        }
    </script>
    {{-- end content --}}
@endsection
