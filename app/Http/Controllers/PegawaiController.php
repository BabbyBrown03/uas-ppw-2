<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use App\Models\Pekerjaan;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    public function index()
    {
        $data = Pegawai::with('pekerjaan')->paginate(5);
        return view('pegawai.index', compact('data'));
    }

    public function create()
    {
        $pekerjaan = Pekerjaan::all();
        return view('pegawai.add', compact('pekerjaan'));
    }

    public function store(Request $request)
    {
    $request->validate([
        'pekerjaan_id' => 'required|exists:pekerjaan,id',
        'nama' => 'required|string',
        'email' => 'required|email|unique:pegawai,email',
        'gender' => 'required',
    ]);

    Pegawai::create($request->all());

    return redirect()
        ->route('pegawai.index')
        ->with('success', 'Data pegawai berhasil ditambahkan');
    }


    public function edit($id)
    {
        $data = Pegawai::findOrFail($id);
        $pekerjaan = Pekerjaan::all();
        return view('pegawai.edit', compact('data', 'pekerjaan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'pekerjaan_id' => 'required',
            'nama' => 'required|string',
            'email' => 'required|email|unique:pegawai,email,' . $id,
            'gender' => 'required',
        ]);

        $data = Pegawai::findOrFail($id);
        $data->update($request->all());

        return redirect()->route('pegawai.index')
            ->with('success', 'Data pegawai berhasil diupdate');
    }

    public function destroy($id)
    {
        Pegawai::findOrFail($id)->delete();

        return redirect()->route('pegawai.index')
            ->with('success', 'Pegawai berhasil dihapus');
    }
}
