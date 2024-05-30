@extends('pages.layouts.main')

@section('content')
<div class="w-[90%] m-auto py-14">
    <div class="bg-green-dark rounded-md w-full py-7 px-6">
        <p class="font-extrabold text-4xl text-green-yellow">Welcome, {{ $user->nama }}</p>
        <div class="bg-light-berry px-2 py-1 mt-2 rounded-md text-white w-max">{{ ucfirst($user->role) }}</div>
        <a href="/{{ $user->role }}/profile" class="px-3 py-2 text-white text-sm bg-purple-500 rounded-md font-semibold mt-2 inline-block"><i class="bi bi-gear-fill mr-1"></i> Edit Profil Diri</a>
        <form action="/logout" method="get" class="mt-3 w-full">
            @csrf
            <button type="submit" class="w-full py-3 bg-red-50 cursor-pointer text-red-500 rounded-md text-center hover:text-white transition hover:bg-red-500">Logout</button>
        </form>
    </div>
    @yield('body')
</div>
@endsection