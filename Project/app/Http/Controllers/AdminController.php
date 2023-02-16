<?php

namespace App\Http\Controllers;

use App\Models\Cours;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    # LIST USERS TO VALIDATE

    public function usersListValidate(){
        $u = DB::table('users')->where('type','=','null')->get();
        return view('admin.users.listV', ['user' => $u]);
    }


    # EDIT Type

    public function majTypeForm($id){
        $user = User::findOrFail($id);
        return view('admin.users.majType', ['user'=> $user]);
    }

    public function majType(Request $request, $id){
        $user = User::findOrFail($id);

            $v = $request->validate(
                [
                    'nom' => 'required|string|max:40',
                    'type' => 'required|string|max:12',
                ]
            );
            $user->nom = $v['nom'];
            $user->type = $v['type'];
            $user->save();
            $request->session()->flash('state', 'User Updated !');

        return redirect('/toValidate');
    }

    # Reject USER

    public function rejectUserForm($id){
        $user = User::findOrFail($id);
        return view('admin.users.reject', ['user'=> $user]);
    }

    public function rejectUser(Request $request, $id){
        $user = User::findOrFail($id);
        $v = $request->validate(
            [
                'nom' => 'required|string|max:40',
            ]
        );
        $user->nom = $v['nom'];
        $user->delete();
        $request->session()->flash('state', 'User rejected !');

        return redirect('/toValidate');
    }

    # ADMIN USER ADD

    public function createUserForm(){
        $id =  Auth::id();
        return view('admin.users.create')->with('id', $id);
    }

    public function createUser(Request $request){

        $v = $request->validate([
            'nom' => 'required|string|max:40',
            'prenom' => 'required|string|max:40',
            'type' => 'required|string|max:12',
            'login' => 'required|string|max:30|unique:users',
            'mdp' => 'required|string|confirmed|max:30',
        ]);

        $n = new User();
        $n->nom = $v['nom'];
        $n->prenom = $v['prenom'];
        $n->type = $v['type'];
        $n->login = $v['login'];
        $n->mdp = Hash::make($request->mdp);
        $n->save();

        $request->session()->flash('state', 'User added!');
        return  redirect(route('adminHome'));
    }

    # ADMIN USERS LIST (ALL)

    public function usersList(){
        $u = User::all();
        return view('admin.users.list',['users'=>$u]);
    }

    # ADMIN COURS LIST (ALL)

    public function coursList(){
        $c = Cours::all();
        return view('admin.cours.list',['cours'=>$c]);
    }

    # ADMIN COURS ADD

    public function createCoursForm(){
        $id =  Auth::id();
        return view('admin.cours.create')->with('id', $id);
    }

    public function createCours(Request $request){
        $v = $request->validate([
            'intitule' => 'required|string|max:50',
        ]);

        $c = new Cours();
        $c->intitule = $v['intitule'];
        $c->save();

        $request->session()->flash('state', 'Cours added!');
        return  redirect(route('adminHome'));
    }

    # ADMIN LIST GESTIONNAIRES

    public function gestionnaireList(){
        $users = User::where('type','=','gestionnaire')->get();
        return view('admin.users.gestionnaires',['users'=>$users]);
    }

    # ADMIN LIST ENSEIGNANTS

    public function enseignantList(){
        $users = User::where('type','=','enseignant')->get();
        return view('admin.users.enseignants',['users'=>$users]);
    }

    # ADMIN MAJ USER

    public function majUser1(){
        $users = User::all();
        return view('admin.users.maj1',['users'=>$users]);
    }

    public function majUser2($id){
        $user = User::findOrFail($id);
        return view('admin.users.maj2',['user'=>$user]);
    }

    public function majUser3(Request $request, $id){
        $user = User::findOrFail($id);
        $v = $request->validate([
            'nom' => 'required|string|max:30',
            'prenom' => 'required|string|max:30',
            'type' => 'required|string|max:12',
            'login' => 'required|string|max:30',
        ]);

        $user->nom = $v['nom'];
        $user->prenom = $v['prenom'];
        $user->login = $v['login'];
        $user->type = $v['type'];
        $user->save();

        $request->session()->flash('state', 'User MAJ !');
        return  redirect(route('adminHome'));
    }

    # ADMIN SUPPRIMER USER

    public function deleteUser1(){
        $users = User::all();
        return view('admin.users.delete1',['users'=>$users]);
    }

    public function deleteUser2($id){
        $user = User::findOrFail($id);
        return view('admin.users.delete2',['user'=>$user]);
    }

    public function deleteUser3(Request $request, $id){
        $user = User::findOrFail($id);
        $user->cours()->detach();

        $v = $request->validate([
            'nom' => 'required|string|max:30',
            'prenom' => 'required|string|max:30',
        ]);

        $user->nom = $v['nom'];
        $user->prenom = $v['prenom'];
        $user->cours()->detach();
        $user->delete();

        $request->session()->flash('state', 'User deleted !');
        return  redirect(route('adminHome'));
    }

    # ADMIN MAJ COURS

    public function editCours1(){
        $cours = Cours::all();
        return view('admin.cours.edit1',['cours'=>$cours]);
    }

    public function editCours2($cid){
        $cours = Cours::findOrFail($cid);
        return view('admin.cours.edit2',['cours'=>$cours]);
    }

    public function editCours3(Request $request, $cid){
        $cours = Cours::findOrFail($cid);
        $v = $request->validate([
            'intitule' => 'required|string|max:50',
        ]);

        $cours->intitule = $v['intitule'];
        $cours->save();

        $request->session()->flash('state', ' MAJ done !');
        return  redirect(route('adminHome'));
    }

    # ADMIN SUPPRIMER COURS

    public function deleteCours1(){
        $cours = Cours::all();
        return view('admin.cours.delete1',['cours'=>$cours]);
    }

    public function deleteCours2($cid){
        $cours = Cours::findOrFail($cid);
        return view('admin.cours.delete2',['cours'=>$cours]);
    }

    public function deleteCours3(Request $request, $cid){
        $cours = Cours::findOrFail($cid);

        $v = $request->validate([
            'intitule' => 'required|string|max:50',
        ]);

        $cours->intitule = $v['intitule'];

        $seances = $cours->seance()->get();
        foreach($seances as $s){
            $s->etudiants()->detach();
            $s->cours()->dissociate();
            $s->delete();
        }
        $cours->users()->detach();
        $cours->etudiants()->detach();
        $cours->delete();

        $request->session()->flash('state', ' Cours deleted !');
        return  redirect(route('adminHome'));
    }

    # ADMIN RECHERCHE COURS PAR INTITULE

    public function searchCours(){
        return view('admin.cours.search1');
    }

    public function search(Request $request){
        $v = $request->validate([
            'intitule' => 'required|string|max:50',
        ]);
        if(Cours::where('intitule', $v['intitule'])->exists()){
            $cours = Cours::where('intitule',$v['intitule'])->get();
            $request->session()->flash('state', 'Cours trouvé');
            return view('admin.cours.search2', ['cours' => $cours]);
        }
        else{
            $request->session()->flash('state', 'Cours non trouvé');
            return view('admin.cours.search1');
        }
    }

    # ADMIN RECHERCHE USER PAR (NOM/PRENOM/LOGIN)

    public function searchUser(){
        return view('admin.users.search1');
    }

    public function searchU(Request $request){
        $v = $request->validate([
            'nom' => 'string|max:40',
            'prenom' => 'string|max:40',
            'login' => 'string|max:30|unique:users',
        ]);
        if((User::where('nom', $v['nom'])->exists())
            or (User::where('prenom', $v['prenom'])->exists())
            or (User::where('login', $v['login'])->exists()) ){
            $user = User::where('nom',$v['nom'])
                ->orWhere('prenom',$v['prenom'])
                ->orWhere('login',$v['login'])
                ->get();
            $request->session()->flash('state', 'User(s) trouvé');
            return view('admin.users.search2', ['users' => $user]);
        }
        else{
            $request->session()->flash('state', 'User(s) non trouvé');
            return view('admin.users.search1');
        }
    }

}
