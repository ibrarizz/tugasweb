<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Siswa;
use App\Models\Project;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "Project";
        $data = Siswa::paginate(5);
        return view('admin-pages.master-project', compact('title', 'data') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function tambah($id){
        $siswa = Siswa::find($id);
        $title = "Create-Project";
        return view('admin-pages.project.CreateProject', compact('title', 'siswa'));
    }

    public function create($id)
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // custom pesan error
        $massages = [
            'required' => ':attribute tidak boleh kosong'
        ];
        // validasi data yang dimaksukkan
        $this->validate($request, [
            'nama' => 'required',
            'deskripsi' => 'required',
            'tanggal' => 'required'
        ], $massages);
        // masukkan data ke dalam database
        $data = [
            'id_siswa' => $request->id_siswa,
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'tanggal' => $request->tanggal
        ];
        Project::create($data);
        // kembalikan ke route masterproject dengan membawa session success
        Session::flash('success', 'Project baru berhasil ditambahkan!!');
        return redirect('/masterproject');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $title = "Master Project";
        $project = Siswa::find($id)->project()->get();
        return view('admin-pages.project.ShowProject', compact('title', 'project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = "Edit-Project";
        $project = Project::find($id);
        return view('admin-pages.project.EditProject', compact('title', 'project'));
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
        // custom pesan error
        $massages = [
            'required' => ':attribute tidak boleh kosong'
        ];
        // validasi data
        $this->validate($request, [
            'nama' => 'required',
            'deskripsi' => 'required',
            'tanggal' => 'required'
        ], $massages);
        // update data project
        $project = Project::find($id);
        $project->nama = $request->nama;
        $project->deskripsi = $request->deskripsi;
        $project->tanggal = $request->tanggal;
        $project->save();
        // kembalikan ke route awal dengan membawa session successUpdate
        return redirect('/masterproject')->with('successUpdate', 'Data Project berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Project::find($id)->delete();
        return back()->with('successDelete', 'Data berhasil dihapus');
    }
}
