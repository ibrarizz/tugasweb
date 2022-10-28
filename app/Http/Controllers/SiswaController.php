<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;

use App\Models\Siswa;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "Master Siswa";
        $data_siswa = Siswa::all();
        return view('admin-pages.master-siswa', compact('title', 'data_siswa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin-pages.siswa.CreateSiswa', [
            "title" => "Tambah Siswa"
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //custom massage error
        $message=[
            'required' => ':attribute harus diisi gaess',
            'min' => ':attribute minimal :min karakter ya coy',
            'max' => ':attribute maksimal :max karakter gaess',
            'numeric' => ':attribute kudu diisi angka coy!!',
            'mimes' => 'file :attribute harus bertipe jpg,jpeg,png'
        ];

        // validasi form
        $this->validate($request, [
            'nama' => 'required|min:7|max:30',
            'nisn' => 'required|numeric|min:6',
            'alamat' => 'required',
            'jk' => 'required',
            'foto' => 'required|mimes:jpg,png,jpeg',
            'about' => 'required|min:10'
        ], $message);

        // ambil informasi file yang diupload
        $file = $request->file('foto');
        // set nama file
        $nama_file = time()."_".$file->getClientOriginalName();
        // tujuan file
        $tujuan_upload = "./templete/img";
        // pindahkan file
        $file->move($tujuan_upload, $nama_file);

        // insert data
        Siswa::create([
            'nama' => $request->nama,
            'nisn' => $request->nisn,
            'alamat' => $request->alamat,
            'jk' => $request->jk,
            'foto' => $nama_file,
            'about' => $request->about
        ]);
        
        Session::flash('success', 'Data berhasil ditambahkan!!');

        return redirect('/mastersiswa');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $title = "Tampilkan Siswa";
        $siswa = Siswa::findOrFail($id);
        $kontaks = $siswa->kontak()->get();
        
        return view('admin-pages.siswa.Showsiswa', compact('title', 'siswa', 'kontaks'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = "Edit Siswa";
        $siswa = Siswa::find($id);

        return view('admin-pages.siswa.EditSiswa', compact('title', 'siswa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $message=[
            'required' => ':attribute harus diisi!!',
            'min' => ':attribute minimal :min karakter!!',
            'max' => ':attribute maksimal :max karakter!!',
            'numeric' => ':attribute harus berupa angka!!',
            'mimes' => 'file :attribute harus bertipe jpg,jpeg,png'
        ];

        $this->validate($request, [
            'nama' => 'required|min:5|max:100',
            'nisn' => 'required|numeric',
            'alamat' => 'required',
            'jk' => 'required',
            'foto' => 'required|mimes:jpg,png,jpeg',
            'about' => 'required|min:10'
        ], $message);

        if($request->foto != '') {
            // delete foto yang sudah ada
            $siswa = Siswa::find($id);
            file::delete('./templete/img/'. $siswa->foto);

            // ambil foto dari request
            $file = $request->file('foto');

            $nama_file = time()."_".$file->getClientOriginalName();

            $tujuan_upload = './templete/img';
            $file->move($tujuan_upload, $nama_file);

            // rename nama data
            $siswa->nama = $request-> nama;
            $siswa->nisn = $request -> nisn;
            $siswa->alamat = $request -> alamat;
            $siswa->jk = $request -> jk;
            $siswa->foto = $nama_file;
            $siswa->about = $request -> about;
            $siswa->save();

            return redirect('/mastersiswa');

        } else {

            $siswa = Siswa::find($id);
            $siswa->nama = $request-> nama;
            $siswa->nisn = $request -> nisn;
            $siswa->alamat = $request -> alamat;
            $siswa->jk = $request -> jk;
            $siswa->about = $request -> about;
            $siswa->save();

            return redirect('/mastersiswa');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function hapus($id)
    {
        Siswa::find($id)->delete();
        session()->flash('successDelete', "Data berhasil di hapus!!");
        return redirect('/mastersiswa');
    }
}
