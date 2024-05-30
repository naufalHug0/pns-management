@extends('pages.dashboard.layouts.main')

@section('body')
        <div class="my-5 px-8 py-6 shadow-[0_0_8px_0_rgba(0,0,0,.2)] rounded-md overflow-x-hidden">
            <form action="" method="get">
                <div class="flex gap-2 items-center w-full border rounded-md py-3 px-3">
                    <input type="search" name="search" id="search" class="grow self-stretch focus:outline-none" placeholder="Cari nama pegawai, agama, alamat...">
                    <button type="submit" class="border border-green-base rounded-sm bg-green-contrast text-green-base hover:bg-green-hover hover:text-white transition px-4 py-2">Cari</button>
                </div>
                @if ($user->role == 'admin')
                <div class="flex justify-between items-center">
                    <div class="flex gap-2 items-center mt-10">
                        <select name="unit-kerja" id="unit-kerja" class="appearance-none border-[0.5px] rounded-md py-2 px-3 focus:outline-none border-[rgba(0,0,0,.3)]">
                            <optgroup label="Unit Kerja">
                                <option value="all" {{ request()->get('unit-kerja') == 'all' ? 'selected':'' }}>Semua</option>
                                @foreach ($unit_kerjas as $unit_kerja)
                                    <option {{ request()->get('unit-kerja') == $unit_kerja->id ? 'selected':'' }} value="{{ $unit_kerja->id }}">{{ $unit_kerja->nama }}</option>
                                @endforeach
                            </optgroup>
                        </select>
                        <button type="submit" class="border border-green-base rounded-lg bg-green-contrast text-green-base hover:bg-green-hover hover:text-white transition px-4 py-2"><i class="bi bi-sliders mr-1"></i> Terapkan filter</button>
                    </div>
                </div>
                @endif
            </form>

            <div class="flex items-center gap-2 mt-2">
                
                @if ($user->role != 'pegawai')
                    <a href="/{{ $user->role }}/add" class="px-3 py-2 text-white text-sm bg-green-hover rounded-md font-semibold"><i class="bi bi-person-add mr-1"></i> Tambah Pegawai</a>

                    @if ($pegawais->total() > 0)
                        <a href="/{{ $user->role }}/print?{{ request()->get('search') ? 'search='.request()->get('search').'&' : '' }}{{ request()->get('unit-kerja') ? 'unit-kerja='.request()->get('unit-kerja') : '' }}" target="_blank" class="px-3 py-2 text-white text-sm bg-blue-600 rounded-md font-semibold"><i class="bi bi-printer mr-1"></i> Print</a>
                    @endif
                @endif
            </div>

            @if (request()->get('search'))
                <p class="mt-5">Hasil untuk pencarian "<span class="text-green-hover font-bold">{{ request()->get('search') }}</span>"</p>
                <a href="/{{ $user->role }}" class="underline text-green-hover">Kembali</a>
            @endif

            <div class="overflow-y-hidden overflow-x-scroll rounded-md mt-3">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-green-yellow uppercase bg-green-light border-b border-gray-300">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                #
                            <th scope="col" class="px-6 py-3">
                                NIP
                            </th>
                            <th scope="col" class="px-6 py-3">
                                NPWP
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Nama
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Tempat Tanggal Lahir
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Alamat
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Agama
                            </th>
                            <th scope="col" class="px-6 py-3">
                                L/P
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Gol
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Eselon
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Jabatan
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Tempat Tugas
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Unit Kerja
                            </th>
                            <th scope="col" class="px-6 py-3">
                                No HP
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <span class="sr-only">Edit</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($pegawais as $pegawai)
                            <tr class="bg-white border-b transition">
                                <td class="px-6 py-4">
                                    @if ($pegawai->foto_profil)
                                        <img src="{{ asset('/storage/'.$pegawai->foto_profil) }}" class="object-cover min-w-14 min-h-14 rounded-full"/>
                                    @else
                                        <i class="bi bi-person-circle" style="font-size: 50px;" class="text-[100px] text-green-light"></i>
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap font-bold text-green-light">
                                    {{ $pegawai->nip }}
                                </td>
                                <th scope="row" class="px-6 py-4 font-normal">
                                    {{ $pegawai->npwp }}
                                </th>
                                <th scope="row" class="px-6 py-4 font-normal">
                                    {{ $pegawai->nama }}
                                </th>
                                <th scope="row" class="px-6 py-4 font-normal">
                                    {{ $pegawai->tempat_lahir }}, {{ $pegawai->tanggal_lahir }}
                                </th>
                                <th scope="row" class="px-6 py-4 font-normal">
                                    {{ $pegawai->alamat }}
                                </th>
                                <th scope="row" class="px-6 py-4 font-normal">
                                    {{ $pegawai->agama->nama }}
                                </th>
                                <th scope="row" class="px-6 py-4 font-normal">
                                    {{ $pegawai->jenis_kelamin }}
                                </th>
                                <th scope="row" class="px-6 py-4 font-normal">
                                    {{ $pegawai->golongan->kode }}
                                </th>
                                <th scope="row" class="px-6 py-4 font-normal">
                                    {{ $pegawai->jabatan->eselon->nama }}
                                </th>
                                <th scope="row" class="px-6 py-4 font-normal">
                                    {{ $pegawai->jabatan->nama }}
                                </th>
                                <th scope="row" class="px-6 py-4 font-normal">
                                    {{ $pegawai->jabatan->unit_kerja->tempat_tugas->nama }}
                                </th>
                                <th scope="row" class="px-6 py-4 font-normal">
                                    {{ $pegawai->jabatan->unit_kerja->nama }}
                                </th>
                                <th scope="row" class="px-6 py-4 font-normal">
                                    {{ $pegawai->no_hp }}
                                </th>
                                <th class="px-6 py-4 text-right">
                                    <a href="/{{ $user->role }}/{{ $pegawai->id }}" class="font-medium bg-blue-600 text-white px-2 py-1 rounded-md w-max inline-block">Edit</a>
                                    <form action="/{{ $user->role }}/delete" method="get" class="inline-block">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $pegawai->id }}">
                                        <button type="submit" class="inline-block cursor-pointer font-medium w-max bg-red-600 text-white px-2 py-1 rounded-md">Delete</button>
                                    </form>
                                </th>
                            </tr>
                        @empty
                        <tr scope="row" class="text-lg">
                            <td>Data tidak ditemukan</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="flex justify-between items-center mt-4">
                <p class="mt-4">Showing <span class="font-bold text-green-hover">{{ $pegawais->count() }}</span> from <span class="font-bold text-green-hover">{{ $pegawais->total() }}</span> entries</p>
                <div class="flex gap-4 items-center">
                    <p>Page <span class="font-bold bg-green-hover py-1 px-2 rounded-sm text-white">{{ $pegawais->currentPage() }}</span> of <span class="font-bold text-green-hover">{{ $total_page }}</span></p>
                    {{ $pegawais->links() }}
                </div>
            </div>
        </div>
@endsection