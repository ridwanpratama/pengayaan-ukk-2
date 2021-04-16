<?php

namespace App\Http\Controllers;

use App\Siswa;
use Illuminate\Http\Request;

class ListController extends Controller
{
    public function index()
    {
        $siswa = Siswa::paginate(5);
        return view('list.index', compact('siswa'))
            ->with('i',(request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        return view('list.create');
    }

    public function validation(Request $request)
    {
        $request->validate([
            'nis' => 'required',
            'nama' => 'required',
            'jk' => 'required',
            'temp_lahir' => 'required',
            'tgl_lahir' => 'required',
            'alamat' => 'required',
            'asal_sekolah' => 'required',
            'kelas' => 'required',
            'jurusan' => 'required'
        ]);
    }

    public function store(Request $request)
    {
        $this->validation($request);
        Siswa::create([
            'nis' => $request->nis,
            'nama' => $request->nama,
            'jk' => $request->jk,
            'temp_lahir' => $request->temp_lahir,
            'tgl_lahir' => $request->tgl_lahir,
            'alamat' => $request->alamat,
            'asal_sekolah' => $request->asal_sekolah,
            'kelas' => $request->kelas,
            'jurusan' => $request->jurusan
        ]);

        return redirect('list');
    }

    public function edit($id)
    {
        $siswa = Siswa::findorFail($id);
        return view('list.edit',compact('siswa'));
    }

    public function update(Request $request, $id)
    {
        $this->validation($request);
        $siswa = Siswa::findorFail($id);
        $siswa->update($request->all());
        return redirect('list');
    }

    public function destroy($id)
    {
        $siswa = Siswa::findorFail($id);
        $siswa->delete();
        return back();
    }
}
