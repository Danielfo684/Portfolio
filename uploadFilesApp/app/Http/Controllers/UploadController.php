<?php

namespace App\Http\Controllers;

use App\Models\Upload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('upload.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('upload.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->hasFile('file') && $request->file('file')->isValid()) {
            $file = $request->file('file');
            $nombre_original = $file->getClientOriginalName();
            $fileExtension = $file->getClientOriginalExtension();
            $nombre_oculto = date('Y_m_d_H_i_s') . '_' . $nombre_original . '.' . $fileExtension;
            $path = $file->storeAs('private/ejercicio', $nombre_oculto, 'private');

            $imagen = new Upload(['nombre_original' => $nombre_original, 'nombre_oculto' => $nombre_oculto]);
            $imagen->save();
            return view('upload.store', compact('nombre_original'));
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Upload $upload)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Upload $upload)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Upload $upload)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Upload $upload)
    {
        //
    }
}
