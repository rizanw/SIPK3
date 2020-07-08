<?php

namespace App\Http\Controllers;

use App\Kecelakaan;
use App\KecelakaanKorban;
use Illuminate\Http\Request;

class KecelakaanController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('kecelakaan.index');
    }

    public function indexAdd()
    {
        return view('kecelakaan.add');
    }

    public function fetch()
    {
        $kecelakaans = Kecelakaan::all();

        $dataKecelakaan = array();
        foreach ($kecelakaans as $kecelakaan) {
            $dataKecelakaan[] = array(
                'id' => $kecelakaan->id,
                'kejadian' => $kecelakaan->kejadian,
                'lokasi' => $kecelakaan->lokasi,
                'tanggal' => $kecelakaan->tanggal,
                'korban' => $kecelakaan->jumlah_korban,
                'pj' => $kecelakaan->penanggung_jawab,
                'status' => $kecelakaan->status == 1? "Open" : "Close"
            );
        }

        return response()->json($dataKecelakaan);
    }

    public function create(Request $request)
    {
        $request->validate([
            'kejadian' => 'required',
            'lokasi' => 'required',
            'tanggal' => 'required',
            'jam' => 'required',
            'alk' => 'required',
            'saksi' => 'required',
            'akibat' => 'required',
            'jumlahkorban' => 'required',
            'kronologi' => 'required',
//            'severity' => 'required',
//            'likelihood' => 'required',
//            'foto' => 'required',
            'tindakan' => 'required',
            'pj' => 'required',
            'status' => 'required',
        ]);

        try {
            $kecelakaan = Kecelakaan::create([
                'kejadian' => $request['kejadian'],
                'lokasi' => $request['lokasi'],
                'tanggal' => $request['tanggal'],
                'waktu' => $request['jam'],
                'atasan_langsung_korban' => $request['alk'],
                'saksi' => $request['saksi'],
                'akibat' => $request['akibat'],
                'jumlah_korban' => $request['jumlahkorban'],
                'kronologi' => $request['kronologi'],
                'resiko_keparahan' => $request['severity'],
                'resiko_kemungkinan' => $request['likelihood'],
                'photo' => $request['foto'],
                'tindakan' => $request['tindakan'],
                'penanggung_jawab' => $request['pj'],
                'status' => $request['status'],
            ]);

            for($i = 0; $i < count($request['nama-korban']); $i++){
                KecelakaanKorban::create([
                    'id_inspeksi' => $kecelakaan->id,
                    'nama' => $request['nama-korban'][$i],
                    'usia' => $request['usia-korban'][$i],
                    'jenis_kelamin' => $request['jenis-kelamin'][$i],
                ]);
            }

        } catch (\Exception $exception) {
            dd($exception);
        }

        return redirect()->back()->with('message', "Berhasil: Inspeksi Kecelakaan berhasil dibuat!");
    }
}
