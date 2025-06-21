@extends('layouts.app')

@section('head')
    <title>List Data Staff</title>
@endsection

@section('content')
    {{-- @extends('components.navbar') --}}

    <section class="w-screen h-screen flex justify-center items-center">
        <div class="container mx-auto w-full">
            <div class="border border-slate-500 rounded-xl w-fit mx-auto my-20 p-10 shadow-xl">
                <div class="flex w-fit h-fit gap-2 mb-8">
                    <div class="w-2 rounded-xl bg-red-500">
                    </div>
                    <h1 class="text-black font-bold  text-center text-3xl">
                        Login
                    </h1>
                </div>
                <form action={{ route('process.login') }} method="POST"
                    class="flex flex-col gap-7 w-86">
                    @csrf
                    <div class="flex gap-1 flex-col">
                        <label for="email" class="font-bold text-slate-800">Email</label>
                        <input type="email" id="email" name="email" placeholder="Masukan Email"
                            value="{{ old('email') }}"
                            class="w-full px-3 h-12 rounded-xl shadow-sm border border-slate-300">
                        @error('email')
                            <div class="text-red-500 text-xs mt-1">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="flex gap-1 flex-col">
                        <label for="password" class="font-bold text-slate-800">Password</label>
                        <input type="password" id="password" name="password" placeholder="Masukan Password"
                            value="{{ old(key: 'password') }}"
                            class="w-full px-3 h-12 rounded-xl shadow-sm border border-slate-300">
                        @error('password')
                            <div class="text-red-500 text-xs mt-1">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <button type="submit"
                        class="rounded-xl bg-blue-500 text-white font-bold py-2 flex justify-center shadow-sm hover:shadow cursor-ponter hover:bg-blue-600">
                        Masuk
                    </button>
                </form>
            </div>
        </div>
    </section>
@endsection
