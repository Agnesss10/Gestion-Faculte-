<?php

namespace App\Http\Controllers;

use App\Models\Cours;
use App\Models\Etudiant;
use App\Models\Seance;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnseignantController extends Controller
{
    # ENSEIGNANT COURS ASSOCIES

    public function mesCours(){
        $id =  Auth::id();
        $e = User::findOrFail($id);
        $cours = $e->cours()->get();
        return view('enseignant.mesCours',['cours'=>$cours]);
    }

    # ENSEIGNANTS INSCRITS COURS

    public function inscritsCoursList1(){
        $id =  Auth::id();
        $e = User::findOrFail($id);
        $cours = $e->cours()->get();
        return view('enseignant.presences.inscritsCoursList1',['cours'=>$cours]);
    }

    public function inscritsCoursList2($cid){
        $cours = Cours::findOrFail($cid);
        $etudiants = $cours->etudiants()->get();
        return view('enseignant.presences.inscritsCoursList2',['etudiants'=>$etudiants, 'cours'=>$cours]);
    }

    # ENSEIGNANTS POINTAGE D'UN ETUDIANT POUR UNE SEANCE

    public function getSeanceCours1(){
        $id =  Auth::id();
        $e = User::findOrFail($id);
        $cours = $e->cours()->get();
        return view('enseignant.presences.getSeanceCours1',['cours'=>$cours]);
    }

    public function getSeanceCours2($cid){
        $cours = Cours::findOrFail($cid);
        $seances = $cours->seance()->get();
        return view('enseignant.presences.getSeanceCours2', ['seances'=>$seances, 'cours'=>$cours]);
    }

    public function getSeanceCours3($sid){
        $seance = Seance::findOrFail($sid);
        $cours = $seance->cours()->first();
        $etudiants = $cours->etudiants()->get();
        return view('enseignant.presences.getEtudiantsPointage',
            ['etudiants'=>$etudiants, 'seance'=>$seance, 'cours'=>$cours]);
    }

    public function pointage(Request $request, $eid, $sid){
        $etudiant = Etudiant::findOrFail($eid);
        $seance = Seance::findOrFail($sid);
         if($request->has('Présent')){
             $etudiant->seances()->attach($seance);
             $request->session()->flash('state', 'Etudiant présent !');
         }
         else{
             $request->session()->flash('state', 'Etudiant absent !');
         }
        $cours = $seance->cours()->first();
        $etudiants = $cours->etudiants()->get();
        return view('enseignant.presences.getEtudiantsPointage',
            ['etudiants'=>$etudiants, 'seance'=>$seance, 'cours'=>$cours]);
    }

    # LISTE DES ETUDIANTS ABSENTS/PRESENTS POUR UNE SEANCE

    public function listAP1(){
        $id =  Auth::id();
        $e = User::findOrFail($id);
        $cours = $e->cours()->get();
        return view('enseignant.presences.listAP1',['cours'=>$cours]);
    }

    public function listAP2($cid){
        $cours = Cours::findOrFail($cid);
        $seances = $cours->seance()->get();
        return view('enseignant.presences.listAP2', ['seances'=>$seances, 'cours'=>$cours]);
    }

    public function listP($sid){
        $seance = Seance::findOrFail($sid);
        $cours = $seance->cours()->first();
        $etudiants = $seance->etudiants()->get();
        return view('enseignant.presences.listP',
            ['etudiants'=>$etudiants, 'seance'=>$seance, 'cours'=>$cours]);
    }

    public function listA($sid, $cid){
        $seance = Seance::findOrFail($sid);
        $cours = Cours::findOrFail($cid);
        $tous = $cours->etudiants()->get();
        $presents = $seance->etudiants()->get();
        $etudiants = $tous->diff($presents);
        return view('enseignant.presences.listA', ['etudiants'=>$etudiants]);
    }

    # ENSEIGNANT TOTAUX DE PRESENCES PAR COURS

    public function coursTotaux(){
        $id =  Auth::id();
        $e = User::findOrFail($id);
        $cours = $e->cours()->get();
        return view('enseignant.presences.coursList',['cours'=>$cours]);
    }

    public function etudiantsListe($cid){
        $cours = Cours::findOrFail($cid);
        $seances = $cours->seance()->get();
        $etudiants = $cours->etudiants()->get();
        $nb_seances = $seances->count();
        return view('enseignant.presences.etudiantsList',
            ['etudiants'=>$etudiants, 'nb_seances'=>$nb_seances, 'cours'=>$cours]);
    }
}
