<?php

namespace App\Http\Controllers;

use App\Models\pages;
use App\Models\contactus;
use App\Mail\GuestMessage;
use App\Models\experience;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class homeController extends Controller
{
    public function index(){
        $about_data = pages::select('*')->get();
        $experience_data = experience::select('*')->get();
        $datapesan = contactus::select('*')->get();
        return view('home.index')->with([
            'aboutdata'=>$about_data,
            'experience' => $experience_data,
            'datapesan' => $datapesan
        
        ]);
        

    }

    public function store(Request $request)
    {

        $datapesan = contactus::select('*')->get();
        Session::flash('namaguest',$request->namaguest);
        Session::flash('emailguest',$request->emailguest);
        Session::flash('pesanguest',$request->pesanguest);

        $request->validate(
            [
                'namaguest' => 'required',
                'emailguest' => 'required',
                'pesanguest' => 'required',
            ],
            [
                'namaguest.required' => 'Nama wajib diisi',
                'emailguest.required' => 'Email wajib diisi',
                'pesanguest.required' => 'Pesan wajib diisi',
            ]
        );

        $datapesan = [
            'namaguest' => $request->namaguest,
            'emailguest' => $request->emailguest,
            'pesanguest' => $request->pesanguest,
        ];
        
        contactus::create($datapesan);
        Mail::to('affandi.p5@gmail.com')->send(new GuestMessage($datapesan));
        return redirect()->route('home.index')->with('success','Terimakasih sudah mengirimkan pesan.');
    }

}
