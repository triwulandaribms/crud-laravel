<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\user;
use App\Models\login;

class userController extends Controller
{
    
    // untuk menampilkan semua data 
    public function index()
    {
        // FORMAT HTML
        $data_user = user::orderBy('id_user', 'asc')->get();
        return view('user.index', compact('data_user'));

        // FORMAT JSON
        // return user::orderBy('id_user', 'asc')->get();
    }
    

    // function untuk melakukan aktivitas penambahan data baru pada format html
    public function create()
    {
        return view('user.create');
    }

    // function untuk menambah data 
    public function store(Request $request)
    {

        $id_user = $request->id_user;
        $email = $request->email;

        $cekId = user::where('id_user', $id_user)->exists();
        $cekEmail = user::where('email', $email)->exists();


        if($cekId && $cekEmail){
            return "id user & email tidak boleh sama";
        }else if($cekId){
            return "id user tidak boleh sama";
        }else if($cekEmail){
            return "email tidak boleh sama";
        }

           user::create([
                "id_user" =>$request->id_user,
                "name" =>$request->name,
                "email" =>$request->email,
                "password" =>$request->password,
            ]);

            // FORMAT HTML
            return redirect()->to('/user');

            // FORMAT JSON
            // return "data berhasil ditambah";
    }
    

   // function untuk melakukan aktivitas edit by id data pada format html
    public function edit(string $id)
    {
        $data_user = user::where('id_user',$id)->first();
        return view('user.edit', compact('data_user'));
    }


    // function untuk mengupdate data 
    public function update(Request $request, string $id)
    {
        $cek = user::where('id_user', $id)->first();

        if(!$cek){
            return "id user tidak ditemukan";
        }
        $data = user::where('id_user', $id)->update([
            // 'id_user' => $request->id_user,
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        // FORMAT HTML
        return redirect()->to('/user');

        // FORMAT JSON
        // return reponse()->json([$data]);
        // return "berhasil edit";
    }

    // untuk menghapus data pada format html
    public function destroy(string $id)
    {
        user::where('id_user', $id)->delete();

        return redirect()->to('/user');
    }





//////////////////////////////////////////////////////////////////////////////
    // function untuk menampilkan data berdasarkan id pada format json
    public function show($id_user = null)
    {
        if($id_user){
            $user = user::where('id_user', $id_user)->get();
            if($user->isEmpty()){
                return "id user tidak ditemukan";
            }else{
                return $user;
            }
        }else{
            return user::all();
        }
    }
}