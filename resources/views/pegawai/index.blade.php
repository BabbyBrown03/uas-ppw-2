@extends('base')

@section('title', 'Pegawai')
@section('menupegawai', 'font-bold underline')

@section('content')
<section class="p-6 bg-white rounded-lg shadow">

    <div class="flex items-center justify-between mb-6">
        <h1 class="text-3xl font-bold text-[#C0392B]">Pegawai</h1>

        <a href="{{ route('pegawai.add') }}"
           class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded">
            Tambah Data
        </a>
    </div>

    @if(session('success'))
        <div class="mb-4 p-3 bg-green-100 text-green-800 rounded">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto">
        <table class="w-full border border-gray-200 rounded-lg overflow-hidden">
            <thead class="bg-gray-100">
                <tr class="text-left">
                    <th class="px-4 py-3 border">No</th>
                    <th class="px-4 py-3 border">Nama</th>
                    <th class="px-4 py-3 border">Email</th>
                    <th class="px-4 py-3 border">Gender</th>
                    <th class="px-4 py-3 border">Pekerjaan</th>
                    <th class="px-4 py-3 border text-center">Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($data as $item)
                <tr class="hover:bg-gray-50">
                    <td class="px-4 py-2 border">
                        {{ $loop->iteration + ($data->currentPage()-1) * $data->perPage() }}
                    </td>
                    <td class="px-4 py-2 border font-semibold">
                        {{ $item->nama }}
                    </td>
                    <td class="px-4 py-2 border">
                        {{ $item->email }}
                    </td>
                    <td class="px-4 py-2 border capitalize">
                        {{ $item->gender }}
                    </td>
                    <td class="px-4 py-2 border">
                        {{ $item->pekerjaan->nama ?? '-' }}
                    </td>
                    <td class="px-4 py-2 border">
                        <div class="flex justify-center gap-2">

                            {{-- Edit --}}
                            <a href="{{ route('pegawai.edit', $item->id) }}"
                               class="px-3 py-1 border rounded text-blue-600 hover:bg-blue-50">
                                Edit
                            </a>

                            {{-- Delete --}}
                            <form action="{{ route('pegawai.destroy', $item->id) }}"
                                  method="POST"
                                  onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                @csrf
                                @method('DELETE')
                                <button
                                    class="px-3 py-1 border rounded text-red-600 hover:bg-red-50">
                                    Delete
                                </button>
                            </form>

                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center py-4 text-gray-500">
                        Data pegawai belum tersedia
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">
            {{ $data->links() }}
        </div>

</section>
@endsection