<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Personnage;

class PersonnageController extends Controller
{
    //afficher les personnages

    //affiche le formulaire
    public function create(){
        return view('create');
    }

    //enregistre le personnage dans la base de donnée
    public function store(Request $req){
        $imageName='';

        if($req->image){
            $imageName = time() .'.'. $req->image->extension();
            $req->image->move(public_path('images'), $imageName);
        }

        $newPerso = new Personnage;
        $newPerso->nom = $req->nom;
        $newPerso->image = "/images/" . $imageName;
        $newPerso->save();

        return back()
        ->with('success','image ajouté avec succès')
        ->with('image', $imageName);

    }

    public function index(){
        $persos = Personnage::all();
        return view('index', compact('persos'));

    }

    public function edit($id)
    {
        $perso = Personnage::findOrFail($id);
        return view('edit', compact('perso'));
    }

    public function update(Request $req, $id)
    {
        $updatePerso = $req->validate([
            'nom' => 'required',
            'image' => 'required'
        ]);

        $updatePerso = $req->except(['_token','_method']);

        if($req->image){
            $profileImage = time() .'.'. $req->image->extension();
            $req->image->move(public_path('images'), $profileImage);
            $updatePerso['image'] = "/images/" . $profileImage;
        }


        Personnage::whereId($id)->update($updatePerso);
        return redirect()->route('personnage.index');
                         
    }

    public function destroy($id)
    {
        $perso = Personnage::findOrFail($id);
        $perso->delete();
        return redirect()->route('personnage.index');
    }


}
