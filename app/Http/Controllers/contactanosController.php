<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\contactanosMailable;


class contactanosController extends Controller
{
    //
    public function index (){
        return view('contactanos.index');

    }

    public function store(Request $request){
        $request->validate([
            'name'=>'required|min:5',
            'email'=>'required|email',
            'comments'=>'required'
        ]);

        //https://izitoast.marcelodolza.com/
        $correo= new contactanosMailable($request->all());
        Mail::to('ezequieltunar@gmail.com')->send($correo);
        $mensaje="<script> iziToast.show({
            position: 'topCenter',
            timeout: 5000,
            title: 'Hey',
            color:'green',
            message: 'Tu mensaje se ha enviado satisfactoriamente gracias, en breve lo leeremos'
        });</script>";

      return view('contactanos.index',compact('mensaje'));
        //return redirect()->route('contactanos.index',compact('mensaje'));
    }
}
