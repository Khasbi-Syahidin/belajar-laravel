@extends('layouts.app')

@section('head')
    <title>List Data Staff</title>
@endsection

@section('content')
    @extends('components.navbar')

    <section class="w-full">
        <div class="container mx-auto w-full">
            <div class="border border-slate-500 rounded-xl w-fit mx-auto my-20 p-10 shadow-xl">
                <div class="flex w-fit h-fit gap-2 mb-8">
                    <div class="w-2 rounded-xl bg-red-500">
                    </div>
                    <h1 class="text-black font-bold  text-center text-3xl">
                        Buat Staff
                    </h1>
                </div>
                <form action={{ route('staff.store') }} method="POST" enctype="multipart/form-data" class="flex flex-col gap-7">
                    @csrf
                    <div class="flex gap-1 flex-col">
                        <label for="avatar" class="font-bold text-slate-800">Photo Staff</label>
                        <input type="file" id="avatar" name="avatar" value="{{ old('avatar') }}"
                            placeholder="Masukan Nama Staff"
                            class="w-full px-3 h-12 rounded-xl shadow-sm border border-slate-300">
                        @error('avatar')
                            <div class="text-red-500 text-xs mt-1">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="flex gap-1 flex-col">
                        <label for="name" class="font-bold text-slate-800">Nama Staff</label>
                        <input type="text" id="name" name="name" value="{{ old('name') }}"
                            placeholder="Masukan Nama Staff"
                            class="w-full px-3 h-12 rounded-xl shadow-sm border border-slate-300">
                        @error('name')
                            <div class="text-red-500 text-xs mt-1">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="flex gap-1 flex-col">
                        <label for="email" class="font-bold text-slate-800">Email Staff</label>
                        <input type="email" id="email" name="email" placeholder="Masukan Email Staff"
                            value="{{ old('email') }}"
                            class="w-full px-3 h-12 rounded-xl shadow-sm border border-slate-300">
                        @error('email')
                            <div class="text-red-500 text-xs mt-1">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="flex gap-7">
                        <div class="flex gap-1 flex-col w-1/2">
                            <label for="weight" class="font-bold text-slate-800">Berat Badan Staff</label>
                            <input type="number" id="weight" name="weight" placeholder="Masukan Berat Badan"
                                value="{{ old(key: 'weight') }}"
                                class="w-full px-3 h-12 rounded-xl shadow-sm border border-slate-300">
                            @error('weight')
                                <div class="text-red-500 text-xs mt-1">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="flex gap-1 flex-col w-1/2">
                            <label for="height" class="font-bold text-slate-800">Tinggi Badan Staff</label>
                            <input type="numer" id="height" name="height" placeholder="Masukan Tinggi Badan"
                                value="{{ old(key: 'height') }}"
                                class="w-full px-3 h-12 rounded-xl shadow-sm border border-slate-300">
                            @error('height')
                                <div class="text-red-500 text-xs mt-1">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="flex gap-1 flex-col">
                        <label for="age" class="font-bold text-slate-800">Umur Staff</label>
                        <input type="number" id="age" name="age" placeholder="Masukan Umur Staff"
                            value="{{ old(key: 'age') }}"
                            class="w-full px-3 h-12 rounded-xl shadow-sm border border-slate-300">
                        @error('age')
                            <div class="text-red-500 text-xs mt-1">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="flex gap-1 flex-col">
                        <label for="phone" class="font-bold text-slate-800">Phone Staff</label>
                        <input type="number" id="phone" name="phone" placeholder="Masukan Phone Staff"
                            value="{{ old(key: 'phone') }}"
                            class="w-full px-3 h-12 rounded-xl shadow-sm border border-slate-300">
                        @error('phone')
                            <div class="text-red-500 text-xs mt-1">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="flex gap-1 flex-col">
                        <label for="gender" class="font-bold text-slate-800">Jenis Kelamin Staff</label>
                        <select name="gender" id="gender" placeholder="Masukan Email Staff"
                            value="{{ old(key: 'gender') }}"
                            class="w-full px-3 h-12 rounded-xl shadow-sm border border-slate-300">
                            <option value="male">Laki Laki</option>
                            <option value="female">Perempuan</option>
                        </select>
                        @error('gender')
                            <div class="text-red-500 text-xs mt-1">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="flex gap-1 flex-col">
                        <label for="status" class="font-bold text-slate-800">Status Menikah</label>
                        <select name="status" id="status" placeholder="Masukan Email Staff"
                            value="{{ old(key: 'status') }}"
                            class="w-full px-3 h-12 rounded-xl shadow-sm border border-slate-300">
                            <option value="married">Sudah Menikah</option>
                            <option value="single">Belum Menikah</option>
                        </select>
                        @error('status')
                            <div class="text-red-500 text-xs mt-1">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="flex gap-1 flex-col">
                        <label for="address" class="font-bold text-slate-800">Alamat Staff</label>
                        <textarea name="address" id="address" placeholder="Masukan Alamat Staff" value="{{ old(key: 'address') }}"
                            class="w-full px-3 py-3 h-30 rounded-xl shadow-sm border border-slate-300"> {{ old('address') }} </textarea>
                        @error('address')
                            <div class="text-red-500 text-xs mt-1">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <button type="submit"
                        class="rounded-xl bg-blue-500 text-white font-bold py-2 flex justify-center shadow-sm hover:shadow cursor-ponter hover:bg-blue-600">
                        Buat Staff
                    </button>
                </form>
            </div>
        </div>
    </section>
@endsection
