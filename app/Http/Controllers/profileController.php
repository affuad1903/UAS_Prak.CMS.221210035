<?php

namespace App\Http\Controllers;

use App\Models\metadata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
class profileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.profiles.index');
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $request->validate([
            '_foto' => 'mimes:jpeg,jpg,png,gif',
            '_email' => 'required|email'
        ], [
            '_foto.mimes' => 'Foto yang dimasukkan hanya diperbolehkan berkestensi JPEG, JPG, PNG, dan GIF',
            '_email.required' => 'Email wajib diisi',
            '_email.email' => 'Format email yang dimasukkan tidak valid'
        ]);

        if ($request->hasFile('_foto')) {
            $foto_file = $request->file('_foto');
            $foto_ekstensi = $foto_file->extension();
            $foto_baru = date('ymdhis') . ".$foto_ekstensi";
            $foto_file->move(public_path('foto'), $foto_baru);
            // kalau ada update foto
            $foto_lama = get_meta_value('_foto');
            File::delete(public_path('foto') . "/" . $foto_lama);

            metadata::updateOrCreate(['meta_key' => '_foto'], ['meta_value' => $foto_baru]);
        }

        metadata::updateOrCreate(['meta_key' => '_email'], ['meta_value' => $request->_email]);
        metadata::updateOrCreate(['meta_key' => '_kota'], ['meta_value' => $request->_kota]);
        metadata::updateOrCreate(['meta_key' => '_provinsi'], ['meta_value' => $request->_provinsi]);
        metadata::updateOrCreate(['meta_key' => '_nohp'], ['meta_value' => $request->_nohp]);


        metadata::updateOrCreate(['meta_key' => '_instagram'], ['meta_value' => $request->_instagram]);
        metadata::updateOrCreate(['meta_key' => '_github'], ['meta_value' => $request->_github]);
  

        return redirect()->route('profile.index')->with('success', 'Berhasil update data profile');
    }
}
