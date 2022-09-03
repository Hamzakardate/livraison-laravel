<?php

namespace App\Http\Controllers;


use App\User;
use Illuminate\Http\Request;

class UseractiveController extends Controller
{
    public function __construct()
    {
        return $this->middleware(['auth', 'verified'])->except('show');
    }
    
    public function index()
    {
        
        $users  = User::all();

        return view('useractive.index', ['users'=> $users]);
    }

    public function activedesactive($id)
    {
        $user  = User::find($id);
        if($user->active==0){
            $user->active=1;
            $user->save();
        }else{
            $user->active=0;
            $user->save();
        }

        $users  = User::all();
        return view('useractive.index', ['users'=> $users]);
    }
}
