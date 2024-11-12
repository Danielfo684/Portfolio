<?php

namespace App\Http\Controllers;

// import de la clase Request
use Illuminate\Http\Request;

class MainController extends Controller
{
    function login(Request $request) {
        // flash hace que solo muestre una vez el mensaje
        $request->session()->flash('message', 'User logged in');
        // put guarda un valor todo el tiempo que quiera
        $request->session()->put('user', true);
        // redirige a la página de donde viene
        return back();
    }

    function logout(Request $request) {
        $request->session()->flash('message', 'User logged out');
        //forget hace que se olvide
        $request->session()->forget('user');
        return back();
    }

    function main() {
        // devuelve la vista main.main con el valor lihome activo
        return view('main.main', ['lihome' => 'active']);
    }
}
