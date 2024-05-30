@extends('pages.dashboard.layouts.form')

@section('form')
    <form action="" method="post" enctype="multipart/form-data" class="px-5 py-4 shadow-[0_0_8px_0_rgba(0,0,0,.2)] rounded-md">
        @csrf
        <div class="flex flex-col gap-2 mt-5">
        <label class="font-light" for="nip">Nomor Induk Pegawai (NIP)</label>
        <input type="text" name="nip" id="nip" placeholder="NIP Pegawai" maxlength="11" required class="border-[0.5px] rounded-md py-2 px-3 focus:outline-none border-[rgba(0,0,0,.3)] placeholder:font-light font-bold text-green-light focus:border-green-base transition @error('nip') invalid @enderror">
        @error('nip')
                <p class="text-red-500 font-light text-sm">{{ $message }}</p>
        @enderror
        </div>

        <div class="flex flex-col gap-2 mt-5">
        <label for="npwp">Nomor Pokok Wajib Pajak (NPWP)</label>
        <input required type="text" name="npwp" id="npwp" placeholder="NPWP Pegawai" maxlength="25" class="border-[0.5px] rounded-md py-2 px-3 focus:outline-none border-[rgba(0,0,0,.3)] placeholder:font-light font-bold text-green-light focus:border-green-base transition @error('npwp') invalid @enderror">
        @error('npwp')
                <p class="text-red-500 font-light text-sm">{{ $message }}</p>
        @enderror
        </div>

        <div class="flex flex-col gap-2 mt-5">
        <label for="nama">Nama</label>
        <input type="text" name="nama" id="nama" placeholder="Nama Pegawai" required class="border-[0.5px] rounded-md py-2 px-3 focus:outline-none border-[rgba(0,0,0,.3)] placeholder:font-light font-bold text-green-light focus:border-green-base transition @error('nama') invalid @enderror">
        @error('nama')
                <p class="text-red-500 font-light text-sm">{{ $message }}</p>
        @enderror
        </div>

        <div class="flex flex-col gap-2 mt-5">
        <label for="password">Password</label>
        <input type="password" name="password" id="password" placeholder="Tambahkan Password Baru" required class="border-[0.5px] rounded-md py-2 px-3 focus:outline-none border-[rgba(0,0,0,.3)] placeholder:font-light font-bold text-green-light focus:border-green-base transition @error('password') invalid @enderror">
        @error('password')
                <p class="text-red-500 font-light text-sm">{{ $message }}</p>
        @enderror
        </div>

        <div class="flex flex-col gap-2 mt-5">
        <label for="no_hp">Nomor Telepon</label>
        <input type="text" name="no_hp" id="no_hp" placeholder="Nomor Telepon Pegawai" required class="border-[0.5px] rounded-md py-2 px-3 focus:outline-none border-[rgba(0,0,0,.3)] placeholder:font-light font-bold text-green-light focus:border-green-base transition @error('no_hp') invalid @enderror">
        @error('no_hp')
                <p class="text-red-500 font-light text-sm">{{ $message }}</p>
        @enderror
        </div>

        <div class="flex flex-col gap-2 mt-5">
        <label for="alamat">Alamat</label>
        <textarea name="alamat" id="alamat" cols="30" placeholder="Alamat Pegawai" required class="resize-none border rounded-md py-2 px-3 focus:outline-none border-[rgba(0,0,0,.3)] placeholder:font-light font-bold text-green-light focus:border-berry transition @error('alamat') invalid @enderror"></textarea>
        @error('alamat')
                <p class="text-red-500 font-light text-sm">{{ $message }}</p>
        @enderror
        </div>

        <div class="flex flex-col gap-2 mt-5">
        <label for="tanggal_lahir">Tanggal Lahir</label>
        <input type="date" name="tanggal_lahir" id="tanggal_lahir" required class="border-[0.5px] rounded-md py-2 px-3 focus:outline-none border-[rgba(0,0,0,.3)] placeholder:font-light font-bold focus:border-green-base transition @error('tanggal_lahir') invalid @enderror">
        @error('tanggal_lahir')
                <p class="text-red-500 font-light text-sm">{{ $message }}</p>
        @enderror
        </div>

        <div class="flex flex-col gap-2 mt-5">
        <label for="tempat_lahir">Tempat Lahir</label>
        <input type="text" name="tempat_lahir" id="tempat_lahir" placeholder="Tempat Lahir Pegawai" required class="border-[0.5px] rounded-md py-2 px-3 focus:outline-none border-[rgba(0,0,0,.3)] placeholder:font-light font-bold text-green-light focus:border-green-base transition @error('tempat_lahir') invalid @enderror">
        @error('tempat_lahir')
                <p class="text-red-500 font-light text-sm">{{ $message }}</p>
        @enderror
        </div>

        <div class="flex flex-col gap-2 mt-5 w-full">
        <label>Jenis Kelamin <span class="text-slate-300 font-light">(Pilih salah satu)</span></label>

        <div class="radio-option">
            <input type="radio" name="jenis_kelamin" id="laki" value="L" class="appearance-none">
            <label for="laki">
                Laki-laki
                <span class="rounded-full border border-[rgba(0,0,0,.3)] p-2 box-content">
                    <div class="bg-green-500 w-full h-full p-[6px] rounded-full hidden"></div>
                </span>
            </label>
        </div>
        <div class="radio-option">
            <input type="radio" name="jenis_kelamin" id="perempuan" value="P" class="appearance-none">
            <label for="perempuan">
                Perempuan
                <span class="rounded-full border border-[rgba(0,0,0,.3)] p-2 box-content">
                    <div class="bg-green-500 w-full h-full p-[6px] rounded-full hidden"></div>
                </span>
            </label>
        </div>
        @error('jenis_kelamin')
                <p class="text-red-500 font-light text-sm">{{ $message }}</p>
        @enderror
        </div>

        <div class="flex flex-col gap-2 mt-5">
        <label>Agama</label>
        <select name="agama_id" id="agama_id" required class="appearance-none border-[0.5px] rounded-md py-2 px-3 focus:outline-none border-[rgba(0,0,0,.3)] font-bold cursor-pointer transition @error('agama_id') invalid @enderror">
                @foreach ($agamas as $agama)
                        <option value="{{ $agama->id }}">{{ $agama->nama }}</option>
                @endforeach
        </select>
        @error('agama_id')
                <p class="text-red-500 font-light text-sm">{{ $message }}</p>
        @enderror
        </div>

        <div class="flex flex-col gap-2 mt-5">
        <label>Jabatan</label>
        <select name="jabatan_id" id="jabatan_id" required class="appearance-none border-[0.5px] rounded-md py-2 px-3 focus:outline-none border-[rgba(0,0,0,.3)] font-bold cursor-pointer transition @error('jabatan_id') invalid @enderror">
                @foreach ($unit_kerjas as $unit_kerja)
                <optgroup label="{{ $unit_kerja->nama }}">
                        @foreach ($unit_kerja->jabatan as $jabatan)
                        <option value="{{ $jabatan->id }}">{{ $jabatan->nama }} - Eselon {{ $jabatan->eselon->nama }}</option>
                        @endforeach
                </optgroup>
                @endforeach
        </select>
        @error('jabatan_id')
                <p class="text-red-500 font-light text-sm">{{ $message }}</p>
        @enderror
        </div>

        <div class="flex flex-col gap-2 mt-5">
        <label>Golongan</label>
        <select name="golongan_id" id="golongan_id" required class="appearance-none border-[0.5px] rounded-md py-2 px-3 focus:outline-none border-[rgba(0,0,0,.3)] font-bold cursor-pointer transition @error('golongan_id') invalid @enderror">
        @foreach ($golongans as $golongan)
                <option value="{{ $golongan->id }}">{{ $golongan->kode }} ({{ $golongan->nama }})</option>
        @endforeach
        </select>
        @error('golongan_id')
                <p class="text-red-500 font-light text-sm">{{ $message }}</p>
        @enderror
        </div>

        <div class="flex flex-col gap-2 mt-5 w-full">
        <label>Role (Peran Pengguna)</label>
        <div class="radio-option">
            <input type="radio" name="role" id="pegawai" value="pegawai" class="appearance-none">
            <label for="pegawai">
                <div>
                    <p>Sebagai Pegawai</p>
                    <p class="text-xs mt-[2px] font-light">Dapat melihat profil diri, Memperbarui informasi pribadi, dan meliha daftar pegawai di unit kerja sendiri</p>
                </div>
                <span class="rounded-full border border-[rgba(0,0,0,.3)] p-2 box-content">
                    <div class="bg-green-500 w-full h-full p-[6px] rounded-full hidden"></div>
                </span>
            </label>
        </div>
        <div class="radio-option">
            <input type="radio" name="role" id="petugas" value="petugas" class="appearance-none">
            <label for="petugas">
                <div>
                    <p>Sebagai Petugas</p>
                    <p class="text-xs mt-[2px] font-light">Dapat melakukan CRUD pegawai di unit kerja sendiri dan mencetak daftar pegawai</p>
                </div>
                <span class="rounded-full border border-[rgba(0,0,0,.3)] p-2 box-content">
                    <div class="bg-green-500 w-full h-full p-[6px] rounded-full hidden"></div>
                </span>
            </label>
        </div>
        <div class="radio-option">
            <input type="radio" name="role" id="admin" value="admin" class="appearance-none">
            <label for="admin">
                <div>
                    <p>Sebagai Administrator</p>
                    <p class="text-xs mt-[2px] font-light">Dapat melakukan CRUD pegawai di unit kerja manapun, CRUD admin, dan mencetak daftar pegawai</p>
                </div>
                <span class="rounded-full border border-[rgba(0,0,0,.3)] p-2 box-content">
                    <div class="bg-green-500 w-full h-full p-[6px] rounded-full hidden"></div>
                </span>
            </label>
        </div>
        @error('role')
                <p class="text-red-500 font-light text-sm">{{ $message }}</p>
        @enderror
        </div>

        <div class="flex flex-col gap-2 mt-5">
            <label>Foto Profil Pegawai <span class="text-slate-300 font-light">*Opsional</span></label>
            <img id="image-prev" class="rounded-lg max-w-40"></img>
            <label for="image" class="border-[0.5px] rounded-md py-2 px-3 border-[rgba(0,0,0,.3)] cursor-pointer block font-bold text-green-light hover:bg-green-50 transition">Upload Gambar</label>
            <input type="file" accept="image/*" name="foto_profil" id="image" class="hidden"/>
            @error('foto_profil')
                <p class="text-red-500 font-light text-sm">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="py-3 w-full mt-8 rounded-md bg-green-contrast text-green-base font-medium transition border border-green-base hover:bg-green-hover hover:text-white">Tambah Pegawai</button>
    </form>
@endsection

@section('additional_scripts')
    @include('utils.preview-image.script')
@endsection