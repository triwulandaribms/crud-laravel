<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\user;
use App\Models\login;

class userController extends Controller
{
    
    public function index()
    {
        return user::orderBy('id_user', 'asc')->get();
    }

    public function indexId($id_user = null)
    {
        if ($id_user) {
            $user = user::where('id_user', $id_user)->get();
    
            if ($user->isEmpty()) {
                return "Id User tidak ditemukan";
            }
    
            return $user;
        } else {
            return user::all();
        }
    }
   
    public function create()
    {
        
    }

    public function store(Request $request)
    {
        $existingUser = User::where('email', $request->email)
            ->orWhere('id_user', $request->id_user)
            ->exists();
    
        if ($existingUser) {
            return "Email atau ID user sudah ada dalam database";
        }
    
        $user = new User;
        $user->id_user = $request->id_user;
        $user->name = $request->name; 
        $user->email = $request->email; 
        $user->password = $request->password; 
        $user->save();
    
        return "Data user berhasil ditambah";
    }
    

    public function login(Request $request)
    {
        $existingUser = User::where('email', $request->email)
            ->orWhere('id_user', $request->id_user)
            ->exists();
    
        if ($existingUser) {
            return "Email atau ID user sudah ada dalam database";
        }
    
        $user = new User;
        $user->id_user = $request->id_user;
        $user->name = $request->name; 
        $user->email = $request->email; 
        $user->password = $request->password; 
        $user->save();
    
        return "Data user berhasil ditambah";
    }
 
    public function show(string $id)
    {
        
    }

   
    public function edit(string $id)
    {
        
    }

  
    public function update(Request $request, string $id)
    {
        
    }

    
    public function destroy(string $id)
    {
        
    }
}
