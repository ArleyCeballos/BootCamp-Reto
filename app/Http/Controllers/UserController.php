<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('store.users.index', [
            'users' => User::paginate(10)
        ]);
    }

    public function destroy ($id){
        User::destroy($id);
        return redirect('users');
    }

    
    public function create()
    {
        return view ('store.users.create');

    }

   
}