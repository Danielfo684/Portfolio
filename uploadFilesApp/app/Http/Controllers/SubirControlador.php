<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SubirControlador extends Controller
{

function img (Request $request, $file) {
    return response()->file(storage_path('app/private/carpeta/') .$file);
}

    function index(){
        return view('index');
    }

    function subir(Request $request){
        //dd($request->file('file'));
        if ($request->hasFile('file') && $request->file('file')->isValid()) {
          $file = $request->file('file');
             $nombreOriginal = $file->getClientOriginalName();
          $path = $file->store('carpeta', 'public');
          echo $path;
          $nombre = date('Ymd_His') . '_' . $nombreOriginal;
        }
    }

    function subir1(Request $request){
        //dd($request->file('file'));
        if ($request->hasFile('file') && $request->file('file')->isValid()) {
          $file = $request->file('file');
          $nombreOriginal = $file->getClientOriginalName();
         $path = $file->storeAs('carpeta', 'nueva_' . $nombreOriginal);
        // $path = Storage::putFileAs('carpeta', $file, $nombreOriginal);
         echo $path;

        }
    }

    function subir2(Request $request){
        //dd($request->file('file'));
        if ($request->hasFile('file') && $request->file('file')->isValid()) {
          $file = $request->file('file');
          $nombreOriginal = $file->getClientOriginalName();
           $result = $file->move('storage/carpeta',$nombreOriginal);
          echo $result;
        }
    }

    function view() {
        return view('subir.view');
    }
}