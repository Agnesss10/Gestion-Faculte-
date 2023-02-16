<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    # USER PASSWORD EDIT

    public function editPasswordForm()
    {
        $id = Auth::id();
        return view('user.password')->with('id', $id);
    }

    public function editPassword(Request $request, $id)
    {
        $user = User::findOrFail($id);

        if ($request->has('Edit')) {

            if (Hash::check($request->mdp, $user->mdp)) {

                $request->validate([
                    'newpassword' => 'required|string|max:60',
                ]);
                $user->mdp = Hash::make($request->newpassword);
                $user->save();
                $request->session()->flash('state', 'Password edited !');
            } else {
                return back()->with('state', 'Invalide !');
            }

            if (Auth::user()->IsAdmin()) {
                return redirect(route('adminProfil'));
            }
            if (Auth::user()->IsEnseignant()) {
                return redirect(route('enseignantProfil'));
            }
            if (Auth::user()->IsGestionnaire()) {
                return redirect(route('gestionnaireProfil'));
            }
        } else {
            $request->session()->flash('state', 'Password editing canceled');
            if (Auth::user()->IsAdmin()) {
                return redirect(route('adminProfil'));
            }
            if (Auth::user()->IsEnseignant()) {
                return redirect(route('enseignantProfil'));
            }
            if (Auth::user()->IsGestionnaire()) {
                return redirect(route('gestionnaireProfil'));
            }
        }
    }

    # USER EDIT NOM

    public function editNomForm()
    {
        $id = Auth::id();
        return view('user.nom')->with('id', $id);
    }

    public function editNom(Request $request, $id)
    {
        $user = User::findOrFail($id);

        if ($request->has('Cancel')) {
            $request->session()->flash('state', 'Nom editing canceled');

            if (Auth::user()->IsAdmin()) {
                return redirect(route('adminProfil'));
            }
            if (Auth::user()->IsEnseignant()) {
                return redirect(route('enseignantProfil'));
            }
            if (Auth::user()->IsGestionnaire()) {
                return redirect(route('gestionnaireProfil'));
            }
        }
        elseif ($request->has('Edit')) {
            $v = $request->validate(
                [
                    'newnom' => 'required|string|max:30',
                ]
            );
            $user->nom = $v['newnom'];
            $user->save();
            $request->session()->flash('state', 'Nom edited !');
            if (Auth::user()->IsAdmin()) {
                return redirect(route('adminProfil'));
            }
            if (Auth::user()->IsEnseignant()) {
                return redirect(route('enseignantProfil'));
            }
            if (Auth::user()->IsGestionnaire()) {
                return redirect(route('gestionnaireProfil'));
            }
        } else {
            return back()->with('state', 'Invalide !');
        }

    }

    # USER EDIT PRENOM

    public function editPrenomForm()
    {
        $id = Auth::id();
        return view('user.prenom')->with('id', $id);
    }

    public function editPrenom(Request $request, $id)
    {
        $user = User::findOrFail($id);

        if ($request->has('Cancel')) {
            $request->session()->flash('state', 'Prénom editing canceled');

            if (Auth::user()->IsAdmin()) {
                return redirect(route('adminProfil'));
            }
            if (Auth::user()->IsEnseignant()) {
                return redirect(route('enseignantProfil'));
            }
            if (Auth::user()->IsGestionnaire()) {
                return redirect(route('gestionnaireProfil'));
            }
        }
        elseif ($request->has('Edit')) {
            $v = $request->validate(
                [
                    'newprenom' => 'required|string|max:30',
                ]
            );
            $user->prenom = $v['newprenom'];
            $user->save();
            $request->session()->flash('state', 'Prénom edited !');

            if (Auth::user()->IsAdmin()) {
                return redirect(route('adminProfil'));
            }
            if (Auth::user()->IsEnseignant()) {
                return redirect(route('enseignantProfil'));
            }
            if (Auth::user()->IsGestionnaire()) {
                return redirect(route('gestionnaireProfil'));
            }
        } else {
            return back()->with('state', 'Invalide !');
        }
    }
}
