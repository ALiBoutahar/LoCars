<?php

namespace App\Http\Controllers;

use App\Models\accident;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccidentController extends Controller
{
    public function index()
    {
        return view("pages.accidents.index",["accidents"=>accident::where('delete', 0)->get()]);
    } 
// ********************************************************************************

    public function create()
    {
        return view("pages.accidents.create");
    }
// ********************************************************************************

    public function store(Request $request)
    {
        accident::create($request->all());
        return redirect()->back()->with('success', 'accident ajouter avec succès');
    }
// ********************************************************************************

    public function show($id)
    {
        return view("pages.accidents.show",["accident"=>accident::findOrFail($id)]);
    }
// ********************************************************************************

    public function edit($id)
    {
        return view("pages.accidents.edit",["accident"=>accident::findOrFail($id)]);
    }

    public function update(Request $request,$id)
    {
        $updateData = accident::find($id);
        $updateData->update($request->all());
        return redirect()->back()->with('warning', 'accident modifié avec succès');
    }
// ********************************************************************************
    // public function destroy($id)
    // {
    //     $post = accident::find($id);
    //     $post->delete();
    //     return redirect("accident")->with('success', 'accident supprimer avec succès');
    // }

    public function delete($id)
    {
        $accident = accident::find($id);
        if ($accident) {
            $accident->update(['delete' => Auth::user()->id]);
        }
        return redirect()->back()->with('danger', 'accident supprimer avec succès');
    }
}
