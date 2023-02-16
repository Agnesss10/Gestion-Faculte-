<?php

namespace App\Http\Controllers;

use App\Models\Cours;
use App\Models\Etudiant;
use App\Models\Seance;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class GestionnaireController extends Controller
{
    # GESTIONNAIRE ETUDIANT ADD

    public function createEtudiantForm(){
        $id =  Auth::id();
        return view('gestionnaire.etudiants.create')->with('id', $id);
    }

    public function createEtudiant(Request $request){

        $v = $request->validate([
            'nom' => 'required|string|max:30',
            'prenom' => 'required|string|max:30',
            'noet' => 'required|string|max:15',
        ]);

        $e = new Etudiant();
        $e->nom = $v['nom'];
        $e->prenom = $v['prenom'];
        $e->noet = $v['noet'];
        $e->save();

        $request->session()->flash('state', 'Etudiant added!');
        return  redirect(route('gestionnaireHome'));
    }

    # GESTIONNAIRE ETUDIANT LIST ALL

    public function etudiantsList(){
        $e = Etudiant::all();
        return view('gestionnaire.etudiants.list',['etudiants'=>$e]);
    }

    # GESTIONNAIRE ADD SEANCE COURS

    public function createSeance(){
        $c = Cours::all();
        return view('gestionnaire.seances.create',['cours'=>$c]);
    }

    public function createSeanceForm($id){
        $c = Cours::findOrFail($id);
        return view('gestionnaire.seances.createForm',['c'=>$c]);
    }

    public function createS(Request $request, $cid){
        $c = Cours::findOrFail($cid);

        $v = $request->validate([
            'date_debut' => 'required|date',
            'date_fin' => 'required|date',
        ]);

        $s = new Seance();
        $s->cours_id = $c->id;
        $s->date_debut = $v['date_debut'];
        $s->date_fin = $v['date_fin'];
        $s->save();

        $request->session()->flash('state', 'Séance added!');
        return  redirect(route('gestionnaireHome'));
    }

    # GESTIONNAIRE ASSOCIATION ETUDIANT COURS INDIVIDUELLEMENT

    public function assoEtuCouList1(){
        $e = Etudiant::all();
        return view('gestionnaire.etudiants.listAssoEtu',['etudiants'=>$e]);
    }

    public function assoEtuCouList2($eid){
        $e = Etudiant::findOrFail($eid);
        $c = Cours::all();
        return view('gestionnaire.etudiants.listAssoCou',['e'=>$e ,'cours'=>$c]);
    }

    public function assoEtuCou1($eid, $cid){
        $e = Etudiant::findOrFail($eid);
        $c = Cours::findOrFail($cid);
        return view('gestionnaire.etudiants.formAsso',['e'=>$e],['c'=>$c]);
    }

    public function assoEtuCou(Request $request, $eid, $cid){
        $e = Etudiant::findOrFail($eid);
        $c = Cours::findOrFail($cid);

        $e->cours()->attach($c);

        $request->session()->flash('state', 'Association done !');
        return  redirect(route('gestionnaireHome'));
    }

    # GESTIONNAIRE SUPPRIMER ASSOCIATION ETUDIANT-COURS

    public function deleteEtuAssoA(){
        $e = Etudiant::all();
        return view('gestionnaire.etudiants.deleteAssoA',['etudiants'=>$e]);
    }

    public function deleteEtuAssoB($eid){
        $e = Etudiant::findOrFail($eid);
        $c = $e->cours()->where('etudiant_id','=',$e->id)->get();
        return view('gestionnaire.etudiants.deleteAssoB',['e'=>$e,'cours'=>$c]);
    }

    public function deleteEtuAssoC($eid, $cid){
        $e = Etudiant::findOrFail($eid);
        $c = Cours::findOrFail($cid);
        return view('gestionnaire.etudiants.deleteAssoC',['e'=>$e],['c'=>$c]);
    }

    public function deleteEtuAssoD(Request $request, $cid, $eid){
        $c = Cours::findOrFail($cid);
        $e = Etudiant::findOrFail($eid);

        $c->etudiants()->detach($e);
        $e->seances()->detach();
        $request->session()->flash('state', 'Association deleted !');
        return  redirect(route('gestionnaireHome'));
    }

    # GESTIONNAIRE LISTE ETUDIANTS DE COURS

    public function listEtuDeCours1(){
        $c = Cours::all();
        return view('gestionnaire.etudiants.listEtuDeCours1',['cours'=>$c]);
    }

    public function listEtuDeCours2($cid){
        $cours = Cours::findOrFail($cid);
        $etudiant = $cours->etudiants()->where('cours_id','=',$cours->id)->get();
        return view('gestionnaire.etudiants.listEtuDeCours2',['etudiants'=>$etudiant, 'c'=>$cours]);
    }

    # GESTIONNAIRE ASSOCIATION ENSEIGNANT COURS INDIVIDUELLEMENT

    public function assoEnsCouList1(){
        $e = User::where('type','=','enseignant')->get();
        return view('gestionnaire.enseignants.listAssoEns',['enseignants'=>$e]);
    }

    public function assoEnsCouList2($eid){
        $e = User::findOrFail($eid);
        $c = Cours::all();
        return view('gestionnaire.enseignants.listAssoCou',['e'=>$e ,'cours'=>$c]);
    }

    public function assoEnsCou1($eid, $cid){
        $e = User::findOrFail($eid);
        $c = Cours::findOrFail($cid);
        return view('gestionnaire.enseignants.formAsso',['e'=>$e],['c'=>$c]);
    }

    public function assoEnsCou(Request $request, $eid, $cid){
        $e = User::findOrFail($eid);
        $c = Cours::findOrFail($cid);

        $e->cours()->attach($c);

        $request->session()->flash('state', 'Association done !');
        return  redirect(route('gestionnaireHome'));
    }

    # GESTIONNAIRE SUPPRIMER ASSOCIATION ENSEIGNANT-COURS

    public function listEnsDeCoursA(){
        $e = User::where('type','=','enseignant')->get();
        return view('gestionnaire.enseignants.deleteAssoEnsA',['enseignants'=>$e]);
    }

    public function listEnsDeCoursB($eid){
        $e = User::findOrFail($eid);
        $c = $e->cours()->where('user_id','=',$e->id)->get();
        return view('gestionnaire.enseignants.deleteAssoEnsB',['enseignants'=>$e ,'cours'=>$c]);
    }

    public function deleteAssoEnsCou($eid, $cid){
        $e = User::findOrFail($eid);
        $c = Cours::findOrFail($cid);
        return view('gestionnaire.enseignants.deleteFormAsso',['e'=>$e],['c'=>$c]);
    }

    public function deleteAssoEns(Request $request, $cid, $eid){
        $c = Cours::findOrFail($cid);
        $e = User::findOrFail($eid);

        $e->cours()->detach($c);
        $request->session()->flash('state', 'Association deleted !');
        return  redirect(route('gestionnaireHome'));
    }

    # GESTIONNAIRE LISTE ENSEIGNANTS DE COURS

    public function listEnsDeCours1(){
        $c = Cours::all();
        return view('gestionnaire.enseignants.listEnsDeCours1',['cours'=>$c]);
    }

    public function listEnsDeCours2($cid){
        $cours = Cours::findOrFail($cid);
        $enseignant = $cours->users()->where('cours_id','=',$cours->id)->get();
        return view('gestionnaire.enseignants.listEnsDeCours2',['enseignants'=>$enseignant, 'cours'=>$cours]);
    }

    # GESTIONNAIRE STAT LIST ETUDIANTS PAGINATION

    public function etudiantList(){
        $etudiant = Etudiant::simplePaginate(3);
        return view('gestionnaire.stat.etudiantList',['etudiant'=>$etudiant]);
    }

    # RECHERCHE ETUDIANT

    public function searchEtudiant(){
        return view('gestionnaire.etudiants.search1');
    }

    public function searchEtu(Request $request){
        $v = $request->validate([
            'nom' => 'required|string|max:40',
            'prenom' => 'required|string|max:40',
            'noet' => 'required|string|max:15',
        ]);
        if((Etudiant::where('nom', $v['nom'])->exists())
            or (Etudiant::where('prenom', $v['prenom'])->exists())
            or (Etudiant::where('noet', $v['noet'])->exists()) ){

            $etudiant = Etudiant::where('nom',$v['nom'])
                ->orWhere('prenom',$v['prenom'])
                ->orWhere('noet',$v['noet'])
                ->get();
            $request->session()->flash('state', 'Etudiant(s) trouvé');
            return view('gestionnaire.etudiants.search2', ['etudiants' => $etudiant]);
        }
        else{
            $request->session()->flash('state', 'Etudiant(s) non trouvé');
            return view('gestionnaire.etudiants.search1');
        }
    }

    # GESTIONNAIRE STAT LISTE DES COURS

    public function coursListe(){
        $cours = Cours::all();
        return view('gestionnaire.stat.coursList', ['cours'=>$cours]);
    }

    # GESTIONNAIRE STAT LISTE SEANCES POUR UN COURS

    public function seancesCours1(){
        $cours = Cours::all();
        return view('gestionnaire.stat.seancesCours1', ['cours'=>$cours]);
    }

    public function seancesCours2($cid){
        $cours = Cours::findOrFail($cid);
        $seances = $cours->seance()->simplePaginate(3);
        return view('gestionnaire.stat.seancesCours2', ['seances'=>$seances, 'cours'=>$cours]);
    }

    # GESTIONNAIRE LISTE DES PRESENCE DETAILLEE PAR ETUDIANT

    public function lpde1(){
        $etudiants = Etudiant::all();
        return view('gestionnaire.presences.lpde1', ['etudiants'=>$etudiants]);
    }

    public function lpde2($eid){
        $etudiant = Etudiant::findOrFail($eid);
        $cours = $etudiant->cours()->get();

        return view('gestionnaire.presences.lpde2',['e'=>$etudiant,'cours'=>$cours]);
    }

    # GESTIONNAIRE LSITE DES PRESENCES (DES ETUDIANTS) PAR SEANCE
    public function lpds1(){
        $cours = Cours::all();
        return view('gestionnaire.presences.lpds1', ['cours'=>$cours]);
    }

    public function lpds2($cid){
        $cours = Cours::findOrFail($cid);
        $seances = $cours->seance()->get();
        return view('gestionnaire.presences.lpds2', ['cours'=>$cours, 'seances'=>$seances]);
    }

    public function lpds3($sid, $cid){
        $cours = Cours::findOrFail($cid);
        $seance = Seance::findOrFail($sid);
        $etudiants = $cours->etudiants()->get();
        return view('gestionnaire.presences.lpds3', ['etudiants'=>$etudiants,'cours'=>$cours, 'seance'=>$seance]);
    }

    # GESTIONNAIRE LISTE DES PRESENCES DES ETUDIANTS PAR COURS
    public function lpdc1(){
        $cours = Cours::all();
        return view('gestionnaire.presences.lpdc1', ['cours'=>$cours]);
    }

    public function lpdc2($cid){
        $cours = Cours::findOrFail($cid);
        $seances = $cours->seance()->get();
        $etudiants = $cours->etudiants()->get();
        return view('gestionnaire.presences.lpdc2', ['cours'=>$cours, 'seances'=>$seances, 'etudiants'=>$etudiants]);
    }

    # GESTIONNAIRE MAJ ETUDIANT

    public function majEtu1(){
        $etudiants = Etudiant::all();
        return view('gestionnaire.etudiants.maj1', ['etudiants'=>$etudiants]);
    }

    public function majEtu2($eid){
        $etudiant = Etudiant::findOrFail($eid);
        return view('gestionnaire.etudiants.maj2',['etudiant'=>$etudiant]);
    }

    public function majEtu3(Request $request, $eid){
        $etudiant = Etudiant::findOrFail($eid);
        $v = $request->validate([
            'nom' => 'required|string|max:30',
            'prenom' => 'required|string|max:30',
            'noet' => 'required|string|max:15',
        ]);

        $etudiant->nom = $v['nom'];
        $etudiant->prenom = $v['prenom'];
        $etudiant->noet = $v['noet'];
        $etudiant->save();

        $request->session()->flash('state', 'Etudiant MAJ !');
        return  redirect(route('gestionnaireHome'));
    }

    # GESTIONNAIRE SUPPRIMER ETUDIANT

    public function deleteEtu1(){
        $etudiants = Etudiant::all();
        return view('gestionnaire.etudiants.delete1',['etudiants'=>$etudiants]);
    }

    public function deleteEtu2($eid){
        $etudiant = Etudiant::findOrFail($eid);
        return view('gestionnaire.etudiants.delete2',['etudiant'=>$etudiant]);
    }

    public function deleteEtu3(Request $request, $eid){
        $e = Etudiant::findOrFail($eid);
        $v = $request->validate([
            'nom' => 'required|string|max:30',
            'prenom' => 'required|string|max:30',
            'noet' => 'required|string',
        ]);

        $e->nom = $v['nom'];
        $e->prenom = $v['prenom'];
        $e->noet = $v['noet'];
        $e->seances()->detach();
        $e->cours()->detach();
        $e->delete();

        $request->session()->flash('state', 'Etudiant supprimé !');
        return  redirect(route('gestionnaireHome'));
    }

    # GESTIONNAIRE MODIFIER SEANCE COURS

    public function editSeanceCoursA(){
        $c = Cours::all();
        return view('gestionnaire.seances.editA',['cours'=>$c]);
    }

    public function editSeanceCoursB($cid){
        $cours = Cours::findOrFail($cid);
        $seances = $cours->seance()->get();
        return view('gestionnaire.seances.editB', ['seances'=>$seances, 'cours'=>$cours]);
    }

    public function editSeanceCoursC($sid){
        $seance = Seance::findOrFail($sid);
        return view('gestionnaire.seances.editC',['seance'=>$seance]);
    }

    public function editSeanceCoursD(Request $request, $sid){
        $s = Seance::findOrFail($sid);
        $v = $request->validate([
            'cours_id' => 'required|integer',
            'date_debut' => 'required|date',
            'date_fin' => 'required|date',
        ]);

        $s->cours_id = $v['cours_id'];
        $s->date_debut = $v['date_debut'];
        $s->date_fin = $v['date_fin'];
        $s->save();

        $request->session()->flash('state', 'Seance edited !');
        return  redirect(route('gestionnaireHome'));
    }

    # GESTIONNAIRE SUPPRIMER SEANCE COURS

    public function deleteSeanceCoursA(){
        $c = Cours::all();
        return view('gestionnaire.seances.deleteA',['cours'=>$c]);
    }

    public function deleteSeanceCoursB($cid){
        $cours = Cours::findOrFail($cid);
        $seances = $cours->seance()->get();
        return view('gestionnaire.seances.deleteB', ['seances'=>$seances,'cours'=>$cours]);
    }

    public function deleteSeanceCoursC($sid){
        $seance = Seance::findOrFail($sid);
        return view('gestionnaire.seances.deleteC',['seance'=>$seance]);
    }

    public function deleteSeanceCoursD(Request $request, $sid){
        $s = Seance::findOrFail($sid);
        $v = $request->validate([
            'cours_id' => 'required|integer',
            'date_debut' => 'required|date',
            'date_fin' => 'required|date',
        ]);

        $s->cours_id = $v['cours_id'];
        $s->date_debut = $v['date_debut'];
        $s->date_fin = $v['date_fin'];
        $s->etudiants()->detach();
        $s->cours()->dissociate();
        $s->delete();

        $request->session()->flash('state', 'Seance deleted !');
        return  redirect(route('gestionnaireHome'));
    }


    public function lesCours(){
        $cours = Cours::all();
        return view('gestionnaire.etudiants.lesCours',['cours'=>$cours]);
    }

    public function lesCoursW($cid){
        $co = Cours::findOrFail($cid);
        $cours = Cours::where('id','<>',$cid)->get();
        return view('gestionnaire.etudiants.lesCoursW',['cours'=>$cours, 'co'=>$co]);
    }

    public function copierAssoForm($cid1, $cid2){
        $cours1 = Cours::findOrFail($cid1);
        $cours2 = Cours::findOrFail($cid2);
        return view('gestionnaire.etudiants.copierAssoForm', ['cours1'=>$cours1, 'cours2'=>$cours2]);
    }

    public function copierAsso(Request $request,$cid1, $cid2){
        $cours1 = Cours::findOrFail($cid1);
        $cours2 = Cours::findOrFail($cid2);

        $etudiants1 = $cours1->etudiants()->get();
        $cours2->etudiants()->attach($etudiants1);

        $request->session()->flash('state', 'Copie done !');
        return  redirect(route('gestionnaireHome'));
    }

}
