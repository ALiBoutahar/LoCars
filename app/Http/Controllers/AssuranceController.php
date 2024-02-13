<?php

namespace App\Http\Controllers;
use App\Models\voiture;
use App\Models\assurance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AssuranceController extends Controller
{
    public function index()
    {
        return view("pages.assurances.index",["assurances"=>assurance::where('delete', 0)->get()]);
    } 
// ********************************************************************************

    public function create()
    {
        $voitures = voiture::where('delete', 0)->where('user_id', Auth::user()->id)->get();
        return view("pages.assurances.create",["voitures"=>$voitures]);
    }
// ********************************************************************************

    public function store(Request $request)
    {
        assurance::create($request->all());
        return redirect()->back()->with('success', 'assurance ajouter avec succès');
    }
// ********************************************************************************

    public function show($id)
    {
        return view("pages.assurances.show",["assurance"=>assurance::findOrFail($id)]);
    }
// ********************************************************************************

    public function edit($id)
    {
        $voitures = voiture::where('delete', 0)->where('user_id', Auth::user()->id)->get();
        return view("pages.assurances.edit",["assurance"=>assurance::findOrFail($id),"voitures"=>$voitures]);
    }

    public function update(Request $request,$id)
    {
        $updateData = assurance::find($id);
        $updateData->update($request->all());
        return redirect()->back()->with('warning', 'assurance modifié avec succès');
    }
// ********************************************************************************
    // public function destroy($id)
    // {
    //     $post = assurance::find($id);
    //     $post->delete();
    //     return redirect("assurance")->with('success', 'assurance supprimer avec succès');
    // }

    public function delete($id)
    {
        $assurance = assurance::find($id);
        if ($assurance) {
            $assurance->update(['delete' => Auth::user()->id]);
        }
        return redirect()->back()->with('danger', 'assurance supprimer avec succès');
    }
}
