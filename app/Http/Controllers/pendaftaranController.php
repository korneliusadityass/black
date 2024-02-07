<?php

namespace App\Http\Controllers;

use App\Models\PendaftaranModel;
use App\Models\PasienModel;
use App\Models\User;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PendaftaranController extends Controller
{
    //Pendaftaran Admin
    public function viewpendaftaran()
    {
        $data = array();

        $pendaftaran_data = DB::table('pendaftaranpasien')
            ->join('users', 'pendaftaranpasien.iduser', '=', 'users.id')
            ->select('pendaftaranpasien.*', 'users.name')
            ->orderBy('pendaftaranpasien.created_at', 'desc')
            ->orderBy('pendaftaranpasien.tanggaldaftar', 'asc')
            ->paginate(20);

        $data['title'] = "Pendaftaran Pasien";
        $data['pendaftaranpasien'] = $pendaftaran_data;

        return view('pendaftaran.viewpendaftaran', $data);
    }

    public function addpendaftaran()
    {
        $listNama = User::all();
        $data = array();
        $data['title'] = "Tambah pendaftaran";
        return view('pendaftaran.addpendaftaran', $data, compact('listNama'));
    }

        public function savependaftaran(Request $request)
    {
        $request->validate([
            "iduser" => "required",
            "tanggaldaftar" => "required",
            "jadwal" => "required",
        ]);

        // Check if iduser already has a non-null nomor_antrian
        $existingNomorAntrian = PendaftaranModel::where('iduser', $request->iduser)
            ->whereNotNull('nomor_antrian')
            ->first();

        if ($existingNomorAntrian) {
            return redirect()->back()->with('error', 'Nama telah terdaftar dan memiliki antrian');
        }

        $nomorAntrianBaru = PendaftaranModel::where('jadwal', $request->jadwal)
            ->whereDate('created_at', now()->toDateString())
            ->whereDate('tanggaldaftar', $request->tanggaldaftar)
            ->max('nomor_antrian') + 1;

        $pendaftaran_data = PendaftaranModel::create([
            "iduser" => $request->iduser,
            "tanggaldaftar" => $request->tanggaldaftar,
            "jadwal" => $request->jadwal,
            "nomor_antrian" => $nomorAntrianBaru,
            'status' => ($request->status != "" ? "1" : "0"),
        ]);

        if ($pendaftaran_data) {
            return redirect()->route('pages.viewpendaftaran')->with('message', 'Data added Successfully');
        } else {
            return redirect()->route('pendaftaran.viewpendaftaran')->with('error', 'Data added Error');
        }
    }

    public function finishpendaftaran(Request $request, $idPendaftaran)
    {
        $nomorAntrianHapus = PendaftaranModel::where('id', $idPendaftaran)->value('nomor_antrian');

        PendaftaranModel::where('id', $idPendaftaran)
            ->update([
                'status' => 0,
                'nomor_antrian' => null,
            ]);

        PendaftaranModel::where('status', 1)
            ->where('nomor_antrian', '>', $nomorAntrianHapus)
            ->decrement('nomor_antrian');

        return redirect()->route('pages.viewpendaftaran')->with('message', 'Pendaftaran selesai');
    }


        public function deletependaftaran($id)
    {
        $pendaftaran_data = PendaftaranModel::where('id', $id)->first();

        $nomorAntrianHapus = $pendaftaran_data->nomor_antrian;

        $pendaftaran_data->delete();

        PendaftaranModel::where('status', 1)
            ->where('nomor_antrian', '>', $nomorAntrianHapus)
            ->decrement('nomor_antrian');

        return redirect()->route('pages.viewpendaftaran')->with('error', 'Data Canceled');
    }
    // Pendaftaran Pasien
    public function viewpendaftaranpasien()
    {
        $data = array();

        $userId = auth()->user()->id;

        $pendaftaran_data = DB::table('pendaftaranpasien')
            ->join('users', 'pendaftaranpasien.iduser', '=', 'users.id')
            ->select('pendaftaranpasien.*', 'users.name')
            ->where('users.id', $userId)
            ->orderBy('pendaftaranpasien.created_at', 'asc')
            ->orderBy('pendaftaranpasien.tanggaldaftar', 'asc')
            ->paginate(5);

        $data['title'] = "Pendaftaran Pasien";
        $data['pendaftaranpasien'] = $pendaftaran_data;

        return view('pendaftaran.pasien.viewpendaftaranpasien', $data);
    }


    public function addpendaftaranpasien()
    {
        $listNama = User::all();
        $data = array();
        $data['title'] = "Tambah pendaftaran";
        return view('pendaftaran.pasien.addpendaftaranpasien', $data, compact('listNama'));
    }

    public function savependaftaranpasien(Request $request)
    {
        $request->validate([
            "tanggaldaftar" => "required",
            "jadwal" => "required",
        ]);

        $nomorAntrianBaru = PendaftaranModel::where('jadwal', $request->jadwal)
        ->whereDate('created_at', now()->toDateString())
        ->whereDate('tanggaldaftar', $request->tanggaldaftar)
        ->max('nomor_antrian') + 1;

        $pendaftaran_data = PendaftaranModel::create([
            "iduser" => Auth::id(),
            "tanggaldaftar" => $request->tanggaldaftar,
            "jadwal" => $request->jadwal,
            "nomor_antrian" => $nomorAntrianBaru,
            'status' => '1',
        ]);

        if ($pendaftaran_data) {
            return redirect()->route('pages.viewpendaftaranpasien')->with('message', 'Data added Successfully');
        } else {
            return redirect()->route('pendaftaran.pasien.viewpendaftaranpasien')->with('error', 'Data added Error');
        }
    }

    public function deletependaftaranpasien($id)
    {
        $pendaftaran_data = PendaftaranModel::where('id', $id)->first();

        $nomorAntrianHapus = $pendaftaran_data->nomor_antrian;

        $pendaftaran_data->delete();

        PendaftaranModel::where('status', 1)
            ->where('nomor_antrian', '>', $nomorAntrianHapus)
            ->decrement('nomor_antrian');
        return redirect()->route('pages.viewpendaftaranpasien')->with('error', 'Data Canceled');
    }
}