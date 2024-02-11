<?php

namespace App\Http\Controllers;

use App\Models\controle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ControleController extends Controller
{
    public function index()
    {
        return view("pages.controles.index",["controles"=>controle::where('delete', 0)->get()]);
    } 
// ********************************************************************************

    public function create()
    {
        return view("pages.controles.create");
    }
// ********************************************************************************

    public function store(Request $request)
    {
        controle::create($request->all());
        return redirect()->back()->with('success', 'controle ajouter avec succès');
    }
// ********************************************************************************

    public function show($id)
    {
        return view("pages.controles.show",["controle"=>controle::findOrFail($id)]);
    }
// ********************************************************************************

    public function edit($id)
    {
        return view("pages.controles.edit",["controle"=>controle::findOrFail($id)]);
    }

    public function update(Request $request,$id)
    {
        $updateData = controle::find($id);
        $updateData->update($request->all());
        return redirect()->back()->with('warning', 'controle modifié avec succès');
    }
// ********************************************************************************
    // public function destroy($id)
    // {
    //     $post = controle::find($id);
    //     $post->delete();
    //     return redirect("controle")->with('success', 'controle supprimer avec succès');
    // }

    public function delete($id)
    {
        $controle = controle::find($id);
        if ($controle) {
            $controle->update(['delete' => Auth::user()->id]);
        }
        return redirect()->back()->with('danger', 'controle supprimer avec succès');
    }
}
