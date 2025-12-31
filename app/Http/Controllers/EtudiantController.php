<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use Illuminate\Http\Request;

class EtudiantController extends Controller
{

    public function index()
    {
        $etudiants = Etudiant::all();
        return response()->json($etudiants);
    }

    public function store(Request $request)
    {
        $etudiant = Etudiant::create($request->all());
        return response()->json($etudiant, 201);
    }

    public function show($id)
    {
        $etudiant = Etudiant::findOrFail($id);
        return response()->json($etudiant);
    }

    public function update(Request $request, $id)
    {
        $etudiant = Etudiant::findOrFail($id);
        $etudiant->update($request->all());
        return response()->json($etudiant, 200);
    }

    public function destroy($id)
    {
        $etudiant = Etudiant::findOrFail($id);
        $etudiant->delete();
        return response()->json(null, 204);
    }
}
