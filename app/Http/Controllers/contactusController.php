<?php

namespace App\Http\Controllers;



use App\Models\contactus;



class contactusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = contactus::orderBy('id','asc')->get();
        return view('dashboard.contactus.index')->with(['data' => $data]);
        
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        contactus::where('id', $id)->delete();
        return redirect()->route('contactus.index')->with('success', 'Berhasil melakukan delete data ini');
    }
}
