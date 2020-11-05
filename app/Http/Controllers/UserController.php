<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('isAdmin');
    }
    public function home($module)
    {
        switch($module)
        {
            case '1':
                $users = User::where('role', '1')->orderBy('id', 'DESC')->paginate(4);
            break;
            case '0':
                $users = User::where('role', '0')->orderBy('id', 'DESC')->paginate(4);
            break;
            case 'trash':
                $users = User::onlyTrashed()->orderBy('id', 'DESC')->paginate(4);
                return view ('users.trash', compact('users'));
            break;
            case 'all':
                $users = User::orderBy('id','DESC')->paginate(4);
            break;
        }
        return view('users.home',compact('users'));
    }
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255', 'min:5'],
            'nickname' => ['required', 'string', 'max:255','alpha_dash']
        ]);
        
        if($user->nickname === $request->nickname){
            $user->name = e($request->name);
            $user->role = e($request->type_user);
        }else{
            $user->name = e($request->name);
            $user->nickname = e($request->nickname);
            $user->role = e($request->type_user);
        }
        $user->save();
        return redirect('/users/all')->with('status', 'Se ha actualizado el usuario correctamente');
    }

    public function destroy(User $user) 
    {
        $user->delete();
        return redirect('/users/all')->with('status', 'Se ha eliminado el usuario correctamente');
    }

    public function trash($user)
    {
        User::onlyTrashed()->find($user)->restore();
        return redirect('/users/all')->with('status', 'Se ha restaurado el usuario correctamente');
    }

    public function search(Request $request)
    {
        $users = User::orderBy('id','DESC')->name($request->name)->get();
        return view('users.home',compact('users'));
    }
}
