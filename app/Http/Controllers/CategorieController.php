<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{
            $categorie=Categorie::all();
            return response()->json($categorie);
        }catch(\Exception $e){
            return response()->json("impossiblle d'afficher la ligne de categorie");
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   try{
        $categorie=new Categorie([
            "nomcategorie"=>$request->input("nomcategorie"),
            "imagecategorie"=>$request->input("imagecategorie"),
        ]);
        $categorie->save();
        return response()->json($categorie);
    }catch(\Exception $e){
        return response()->json("Problem d'ajout");

    }

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try{
            $categorie=Categorie::findOrFail($id);
            return response()->json($categorie);

        }catch(\Exception $e){
            return response()->json("Problem d'affichage");
    }}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
       try{
        $categorie=Categorie::findOrFail($id);
        $categorie->update($request->all());
        return response()->json($categorie);

       }catch(\Exception $e){
        return response()->json("Modification imposible");
       }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try{
            $categorie=Categorie::findOrFail($id);
            $categorie->delete();
            return response()->json("Categorie supprimé avec succer");
        }catch(\Exception $e){
            return response()->json("Suppression impossible");
        }
    }
}
