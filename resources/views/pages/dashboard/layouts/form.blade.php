@extends('pages.layouts.main')

@section('content')
    <div class="mt-8 bg-white rounded-md w-[90%] m-auto py-6 px-6">
        <a href="/{{ strtolower($user->role) }}" class="w-max rounded-md text-white bg-green-light hover:bg-green-hover transition font-bold px-3 py-2 flex items-center gap-2">
            <i class="bi bi-arrow-left-circle-fill"></i>
            Kembali
        </a>
        <p class="text-green-light text-3xl font-bold mt-8">{{ ucfirst($title) }}</p>
        <div class="mt-4">
            @yield('form')
        </div>
    </div>
@endsection