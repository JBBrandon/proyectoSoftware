<?php

namespace App\Http\Controllers;

use App\Mail\ContactanosMailable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactanosController extends Controller
{
    public function index(){

        return view('contactanos.index');
    }
    public function store(Request $request)
    {
        $request->validate([
            'nombre'=>'required',
            'correo'=>'required|email',
            'mensaje'=>'required'
        ]);
        Mail::to('marana@edu.pe')->send(new ContactanosMailable($request->all()));  
        return "Mensaje Enviado";  
    }
}
