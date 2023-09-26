<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\user;
use App\Models\login;

class userController extends Controller
{
    
    public function index()
    {
        $data_user = user::getAll()->sortDesc();
        return view('user.index', compact('data_user'));

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
        return view('user.create');
    }

    public function store(Request $request)
    {
        // $existingUser = User::where('email', $request->email)
        //     ->orWhere('id_user', $request->id_user)
        //     ->exists();
    
        // if ($existingUser) {
        //     return "Email atau ID user sudah ada dalam database";
        // }
    
        // $user = new User;
        // $user->id_user = $request->id_user;
        // $user->name = $request->name; 
        // $user->email = $request->email; 
        // $user->password = $request->password; 
        // $user->save();
    
        // return "Data user berhasil ditambah";

        user::create([
            'id_user' => $request->id_user,
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        return redirect()->to('/user');
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
        $data_user = user::where('id_user',$id)->first();
        
        return view('user.edit', compact('data_user'));
    }

  
    public function update(Request $request, string $id)
    {
        user::where('id_user', $id)->update([
            'id_user' => $request->id_user,
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        return redirect()->to('/user');
    }

    
    public function destroy(string $id)
    {
        user::where('id_user', $id)->delete();

        return redirect()->to('/user');
    }
}
