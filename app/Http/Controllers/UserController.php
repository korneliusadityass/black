<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @param  \App\Models\User  $model
     * @return \Illuminate\View\View
     */
    public function index(User $model)
    {
        $data = array();
        $pasien_data = User::select('*')->orderBy('id', 'desc')->paginate(10);
        $title = "Profile Edit";
        $data['users'] = $pasien_data;
        return view('users.index', [
            'users' => $model->paginate(15),
            'title' => $title]);
    }

    public function adduser()
    {
        $data = array();
        $data['title'] = "Tambah User";
        return view('users.adduser', $data);
    }

    public function saveuser(Request $request)
    {
        $request->validate([
            "name" => "required|min:3",
            "email" => "required|min:3",
            "password" => "required",
            "role" => "required",
        ]);
        $user_data = User::create([
            "name" => $request->name,
            "email" => $request->email,
            'password' => Hash::make($request->password),
            "role" => $request->role,
        ]);
        if($user_data){
            return redirect()->route('pages.index')->with('message','Data added Successfully');
        }else{
            return redirect()->route('users.index')->with('error','Data added Error');
        }
    }

    public function changeuser($id)
    {
        $data = array();
        $user_data = User::select('*')
                    ->where('id', $id)
                    ->first();
        $data['title'] = "Ubah User";
        $data['users'] = $user_data;
        return view('users.changeuser', $data);
    }

    public function updateuser(Request $request)
    {


        $request->validate([
            "name" => "required|min:3",
            "email" => "required|min:3",
            "password" => "required",
            "role" => "required",

        ]);
        $user_data = User::find($request->id);
    if(!$user_data) {
        return response()->json(['message' => 'User tidak ditemukan'], 404);
    }
        $user_data = User::where('id', $request->id)
                    ->update([
                        "name" => $request->name,
                        "email" => $request->email,
                        'password' => ($request->newpassword != "" ? Hash::make($request->newpassword) : $request->password),
                        "role" => $request->role,
                    ]);

        return redirect()->route('pages.index')->with('message','Data update succeesfully');
    }

    public function deleteuser($id)
    {
        $user_data = User::where('id', $id)->first();
        $user_data->delete();
        return redirect()->route('pages.index')->with('error','Data Deleted');
    }
}