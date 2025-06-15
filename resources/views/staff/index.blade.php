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
                            <td class="px-2 py-1 w-5 min-w-20">{{ $staff->name }}</td>
                            <td class="px-2 py-1 w-5 min-w-20">{{ $staff->gender == 'male' ? 'Laki Laki' : 'Perempuan' }}
                            </td>
                            <td class="px-2 py-1 w-5 min-w-20">
                                {{ $staff->status == 'married' ? 'Sudah Menikah' : 'Belum Menikah' }}</td>
                            <td class="px-2 py-1 w-5 min-w-20">-</td>
                            <td class="px-2 py-1 w-5 min-w-20 flex gap-2">
                                <a href="{{ route('staff.edit', $staff->id) }}">
                                    <button href="{{ route('staff.edit', $staff->id) }}"
                                        class="px-2 py-1 cursor-pointer rounded-[8px] text-xs text-white bg-blue-500">Edit</button>
                                </a>
                                <button class="px-2 py-1 rounded-[8px] text-xs text-white bg-red-500">Hapus</button>
                            </td>
                        </tr>
                    @endforeach
                </table>

            </div>
        </div>
    </section>

    {{-- end content --}}
@endsection
