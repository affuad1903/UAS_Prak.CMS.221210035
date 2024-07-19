<?php

namespace App\Http\Controllers;

use App\Models\pages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class pageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = pages::orderBy('judul','asc')->get();
        return view('dashboard.greating.index')->with('data',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.greating.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        Session::flash('judul', $request->judul);
        Session::flash('isi', $request->isi);

        $request->validate(
            [
                'judul' => 'required',
                'isi' => 'required',
            ],
            [
                'judul.required' => 'Judul wajib diisi',
                'isi.required' => 'Isian tulisan wajib diisi',
            ]
        );

        $data = [
            'judul' => $request->judul,
            'isi' => $request->isi
        ];
        pages::create($data);

        return redirect()->route('page.index')->with('success', 'Berhasil menambahkan data');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = pages::where('id', $id)->first();
        return view('dashboard.greating.edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $request->validate(
            [
                'judul' => 'required',
                'isi' => 'required',
            ],
            [
                'judul.required' => 'Judul wajib diisi',
                'isi.required' => 'Isian tulisan wajib diisi',
            ]
        );

        $data = [
            'judul' => $request->judul,
            'isi' => $request->isi
        ];
        pages::where('id',$id)->update($data);

        return redirect()->route('page.index')->with('success', 'Berhasil Melakukan Update Data');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        pages::where('id', $id)->delete();
        return redirect()->route('page.index')->with('success', 'Berhasil melakukan delete data');
    }
}
