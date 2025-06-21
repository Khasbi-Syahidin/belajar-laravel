<nav class="bg-red-500 h-fit w-full">
    <div class="container flex gap-3 px-4 py-5 mx-auto justify-between">
        <ul class="flex gap-6 mx-auto items-center">
            <li><a href="{{ route('staff.index') }}" class="font-bold text-white">Home</a></li>
            <li><a href="{{ route('staff.create') }}" class="font-bold text-white">Create</a></li>
        </ul>
        <form action="{{ route('process.logout') }}" method="POST">
            @csrf
            <button type="submit" class="font-bold text-red-500 bg-white rounded-[8px] px-3 py-2 coursor-pointer">Logout
                </button">
        </form>
    </div>
</nav>
