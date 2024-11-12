<?php

namespace App\Http\Controllers;

use App\Models\Pokemon;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PokemonController extends Controller
{
    public function index() {
        return view('pokemon.index', 
            [
            'lipokemon' => 'active',
            'pokemon' =>  Pokemon::orderBy('name')->get(),
            ]);
    }

    public function create(Request $request) {
        //
        return view('pokemon.create', ['lipokemon' => 'active']);
    }

    public function store(Request $request) {
        //
        $validated = $request->validate([
            'name' => 'required|unique:pokemon|max:50|min:4', // Cambiado a 'name'
            'type' => 'required|max:50', // Nuevo campo
            'height' => 'required|numeric', // Nuevo campo
            'weight' => 'required|numeric', // Nuevo campo
            'evolution' => 'nullable|max:50', // Nuevo campo
            'level' => 'required|integer', // Nuevo campo
        ]);
        $object = new pokemon($request->all());
        try {
            $result = $object->save();
            //$object = Pokemon::create($request->all());
            return redirect('pokemon')->with(['message' => 'The pokemon has been created.']);
        } catch(\Exception $e) {
            //si no lo he guardado volver a la página anterior con sus datos para volver a rellenar el formulario y mensaje
            return back()->withInput()->withErrors(['message' => 'The pokemon has not been created.']);
        }
    }

    // public function show(Pokemon $pokemon) {
    //     return view('pokemon.show', 
    //         [
    //         'lipokemon' => 'active',
    //         'pokemon' => $pokemon,
    //         ]);
    // }

    public function show($id) {
        $pokemon = Pokemon::find($id);
        if ($pokemon == null) {
            abort(404);
        }
        return view('pokemon.show', 
            [
            'lipokemon' => 'active',
            'pokemon' => $pokemon,
            ]);
    }

    public function edit(Pokemon $pokemon) {
        return view('pokemon.edit', 
            [
            'lipokemon' => 'active',
            'pokemon' => $pokemon,
            ]);
    }

    public function update(Request $request, Pokemon $pokemon) {
        $validated = $request->validate([
            'name' => 'required|max:50|min:4|unique:pokemon,name,' . $pokemon->id, // Cambiado a 'name'
            'type' => 'required|max:50', // Nuevo campo
            'height' => 'required|numeric', // Nuevo campo
            'weight' => 'required|numeric', // Nuevo campo
            'evolution' => 'nullable|max:50', // Nuevo campo
            'level' => 'required|integer', // Nuevo campo
        ]);
        try {
            $result = $pokemon->update($request->all());
            //$pokemon->fill($request->all());
            //$result = $pokemon->save();
            return redirect('pokemon')->with(['message' => 'The pokemon has been updated.']);
        } catch(\Exception $e) {
            return back()->withInput()->withErrors(['message' => 'The pokemon has not been updated.']);
        }
    }

    public function destroy(Pokemon $pokemon) {
        //
        try {
            $pokemon->delete();
            return redirect('pokemon')->with(['message' => 'The pokemon has been deleted.']);
        } catch(\Exception $e) {
             return back()->withErrors(['message' => 'The pokemon has not been deleted.']);
        }
    }
}
