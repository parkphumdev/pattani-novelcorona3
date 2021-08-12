<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return redirect('/n3');
    }


    public function login(){
        return view('login');
    }

    
    public function checkuser(Request $request){
        $username = $request->username;
        $password = $request->password;

        $user = User::where('username', 'LIKE', $username)
                    ->where('password', 'LIKE', $password)
                    ->get();

        if(count($user) == 1){
            session(['user_id' => $user[0]->id, 'username' => $user[0]->username, 'name' => $user[0]->name, 'tel' => $user[0]->tel]);
            return redirect('/n3');
        }else{
            return redirect('/login');
        }
    }

    public function logout(){
        session()->flush();
        return redirect('/login');
    }
}
