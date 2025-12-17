@extends('base')
@section('title','Tambah Pegawai')
@section('menupegawai', 'underline decoration-4 underline-offset-7')

@section('content')
<section class="p-4 bg-white rounded-lg min-h-[50vh]">
    <h1 class="text-3xl font-bold text-[#C0392B] mb-6 text-center">
        Tambah Pegawai
    </h1>

    <div class="mx-auto max-w-screen-md">
        <form action="{{ route('pegawai.store') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label class="block text-sm font-medium mb-1">Pekerjaan</label>
                <select name="pekerjaan_id" required
                    class="w-full rounded-md border px-3 py-2 text-sm">
                    <option value="">-- Pilih Pekerjaan --</option>
                    @foreach($pekerjaan as $p)
                        <option value="{{ $p->id }}">{{ $p->nama }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block text-sm font-medium mb-1">Nama</label>
                <input type="text" name="nama" required
                    class="w-full rounded-md border px-3 py-2 text-sm">
            </div>

            <div>
                <label class="block text-sm font-medium mb-1">Email</label>
                <input type="email" name="email" required
                    class="w-full rounded-md border px-3 py-2 text-sm">
            </div>

            <div>
                <label class="block text-sm font-medium mb-1">Gender</label>
                <select name="gender" required
                    class="w-full rounded-md border px-3 py-2 text-sm">
                    <option value="">-- Pilih Gender --</option>
                    <option value="male">Laki-laki</option>
                    <option value="female">Perempuan</option>
                </select>
            </div>

            <div class="flex justify-end gap-2">
                <a href="{{ route('pegawai.index') }}"
                   class="border px-4 py-2 rounded text-sm">
                    Batal
                </a>
                <button type="submit"
                    class="bg-green-600 text-white px-4 py-2 rounded text-sm">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</section>
@endsection