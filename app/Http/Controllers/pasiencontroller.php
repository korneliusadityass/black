<?php

namespace App\Http\Controllers;
use App\Models\PasienModel;
use App\Models\User;
use Illuminate\Http\Request;

class PasienController extends Controller
{
    public function viewpasien()
    {
        $data = array();

        $pasien_data = PasienModel::select('pasien.*', 'users.name as name')
            ->join('users', 'users.id', '=', 'pasien.iduser')
            ->orderBy('pasien.created_at', 'desc')
            ->paginate(20);

        $data['title'] = "List Pasien";
        $data['pasien'] = $pasien_data;

        return view('pasien.viewpasien', $data);
    }

    public function addpasien()
    {
        $listNama = User::all();
        $data = array();
        $data['title'] = "Tambah Pasien";
        return view('pasien.addpasien', $data, compact('listNama'));
    }

    public function savepasien(Request $request)
    {
        $request->validate([
            "nomorrekammedis" => "required|min:5",
            "iduser" => "required",
            "tempat" => "required|min:3",
            "tanggallahir" => "required",
            "jeniskelamin" => "required",
            "alamatlengkap" => "required|min:5",
            "pendidikan" => "required",
            "agama" => "required",
            "pekerjaan" => "required|min:3",
            "status" => "required",
            "notelp" => "required",
        ]);
        $pasien_data = PasienModel::create([
            "nomorrekammedis" => $request->nomorrekammedis,
            "iduser" => $request->iduser,
            "tempat" => $request->tempat,
            "tanggallahir" => $request->tanggallahir,
            "jeniskelamin" => $request->jeniskelamin,
            "alamatlengkap" => $request->alamatlengkap,
            "pendidikan" => $request->pendidikan,
            "agama" => $request->agama,
            "pekerjaan" => $request->pekerjaan,
            "status" => $request->status,
            "notelp" => $request->notelp,
        ]);
        if($pasien_data){
            return redirect()->route('pages.viewpasien')->with('message','Data added Successfully');
        }else{
            return redirect()->route('pasien.viewpasien')->with('error','Data added Error');
        }
    }

    public function changepasien($id)
    {
        $listNama = User::all();
        $data = array();
        $pasien_data = PasienModel::select('*')
                    ->where('id', $id)
                    ->first();
        $data = [
            'title' => "Ubah Pasien",
            'pasien' => $pasien_data,
            'listNama' => $listNama,
        ];
        return view('pasien.changepasien', $data);
    }

    public function updatepasien(Request $request)
    {


        $request->validate([
            "nomorrekammedis" => "required|min:5",
            "iduser" => "required",
            "tempat" => "required|min:3",
            "tanggallahir" => "required",
            "jeniskelamin" => "required",
            "alamatlengkap" => "required|min:5",
            "pendidikan" => "required",
            "agama" => "required",
            "pekerjaan" => "required|min:3",
            "status" => "required",
            "notelp" => "required",

        ]);
        $pasien_data = PasienModel::find($request->id);

    if(!$pasien_data) {
        return response()->json(['message' => 'Pasien tidak ditemukan'], 404);
    }
        $pasien_data = PasienModel::where('id', $request->id)
                    ->update([
                        "nomorrekammedis" => $request->nomorrekammedis,
                        "iduser" => $request->has('iduser') ? $request->iduser : $pasien_data->iduser,
                        "tempat" => $request->tempat,
                        "tanggallahir" => $request->tanggallahir,
                        "jeniskelamin" => $request->jeniskelamin,
                        "alamatlengkap" => $request->alamatlengkap,
                        "pendidikan" => $request->pendidikan,
                        "agama" => $request->agama,
                        "pekerjaan" => $request->pekerjaan,
                        "status" => $request->status,
                        "notelp" => $request->notelp,
                    ]);
        return redirect()->route('pages.viewpasien')->with('message','Data update succeesfully');
    }

    public function deletepasien($id)
    {
        $pasien_data = PasienModel::where('id', $id)->first();
        $pasien_data->delete();
        return redirect()->route('pages.viewpasien')->with('error','Data Deleted');
    }

    public function detailpasien($id)
    {
        $listNama = User::all();
        $data = array();
        $pasien_data = PasienModel::select('*')
                    ->where('id', $id)
                    ->first();
        $data = [
            'title' => "Ubah Pasien",
            'pasien' => $pasien_data,
            'listNama' => $listNama,
        ];
        return view('pasien.detailpasien', $data);
    }
}