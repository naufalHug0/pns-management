@extends('pages.layouts.main')

@section('content')
    <div class="bg-base max-h-screen h-screen flex px-24 items-center justify-between">
        <div class="flex flex-col justify-center relative">
            <p class="text-5xl text-green-light font-extrabold mb-2">PNS Management</p>
            <p class="font-light text-green-base text-lg mb-8">Kelola data Pegawai Negeri Sipil dengan <span class="font-bold text-green-contrast">Mudah</span> dan <span class="font-bold text-green-constrast">Aman</span></p>
            <div id="role-option-toggler" class="px-12 py-3 bg-green-contrast text-green-dark w-max rounded-lg transition hover:bg-green-hover hover:text-white border border-green-dark font-medium text-lg cursor-pointer select-none">Masuk</div>
            <div id="role-option" class="absolute border border-green-dark rounded-lg py-2 -bottom-[130%] opacity-0 scale-90 left-0 w-80 bg-white">
                <a href="login/admin" class="flex items-center gap-2 py-4 px-5 w-full hover:bg-green-dark transition font-extrabold hover:text-green-yellow">
                    <i class="bi bi-database-fill text-lg"></i>
                    Sebagai Admin
                </a>
                <a href="login/petugas" class="flex items-center gap-2 py-4 px-5 w-full hover:bg-green-dark transition font-extrabold hover:text-green-yellow">
                    <i class="bi bi-person-fill-gear text-lg"></i>
                    Sebagai Petugas
                </a>
                <a href="login/pegawai" class="flex items-center gap-2 py-4 px-5 w-full hover:bg-green-dark transition font-extrabold hover:text-green-yellow">
                    <i class="bi bi-person-fill text-lg"></i>
                    Sebagai Pegawai
                </a>
            </div>
        </div>
        <i class="bi bi-database-fill-gear text-[330px] text-green-light"></i>
    </div>
@endsection

@section('additional_scripts')
    @include('utils.login-button-animation.script')
@endsection
