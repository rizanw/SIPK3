<?php

namespace App\Http\Controllers;

use App\AlatKebakaranApar;
use App\AlatKebakaranHydrant;
use Illuminate\Http\Request;

class AlatKebakaran extends Controller
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
        return view('alat-kebakaran.index');
    }

    public function addAparIndex()
    {
        return view('alat-kebakaran.add-apar');
    }

    public function detailAparIndex($id)
    {
        $data = AlatKebakaranApar::where('id', $id)->first();
        if (!$data) return redirect()->route('kebakaran.alat')->with('fail', "Belum ada data apar tersebut!");
        return view('alat-kebakaran.edit-apar')
            ->with('data', $data);
    }

    public function addHydrantIndex()
    {
        return view('alat-kebakaran.add-hydrant');
    }

    public function detailHydrantIndex($id)
    {
        $data = AlatKebakaranHydrant::where('id', $id)->first();
        if (!$data) return redirect()->route('kebakaran.alat')->with('fail', "Belum ada data hydrant tersebut!");
        return view('alat-kebakaran.edit-hydrant')
            ->with('data', $data);
    }

    public function fetch()
    {
        $apars = AlatKebakaranApar::all();
        $hydrants = AlatKebakaranHydrant::all();

        $dataApar = array();
        foreach ($apars as $apar) {
            $dataApar[] = array(
                'id' => $apar->id,
                'jenis' => 'APAR',
                'kode' => $apar->kode,
                'lokasi' => $apar->lokasi
            );
        }

        $dataHydrant = array();
        foreach ($hydrants as $hydrant) {
            $dataHydrant[] = array(
                'id' => $hydrant->id,
                'jenis' => 'Hydrant',
                'kode' => $hydrant->kode,
                'lokasi' => $hydrant->lokasi
            );
        }

        return response()->json(array_merge($dataApar, $dataHydrant));
    }

    public function createApar(Request $request)
    {
        $request->validate([
            'kode' => 'required',
            'jenis' => 'required',
            'tipe' => 'required',
            'merk' => 'required',
            'berat' => 'required|numeric',
            'lokasi' => 'required',
        ]);

        try {
            $apar = AlatKebakaranApar::create([
                'kode' => $request['kode'],
                'jenis' => $request['jenis'],
                'tipe' => $request['tipe'],
                'merk' => $request['merk'],
                'berat' => $request['berat'],
                'lokasi' => $request['lokasi']
            ]);
        } catch (\Exception $exception) {
            $errcode = $exception->getMessage();
            return redirect()->back()->with('fail', "Gagal: Terjadi kesalahan! " . $errcode);
        }

        return redirect()->back()->with('success', "Berhasil: APAR berhasil ditambahkan!");
    }

    public function createHydrant(Request $request)
    {
        $request->validate([
            'kode' => 'required',
            'lokasi' => 'required',
        ]);

        try {
            AlatKebakaranHydrant::create([
                'kode' => $request['kode'],
                'lokasi' => $request['lokasi']
            ]);
        } catch (\Exception $exception) {
            $errcode = $exception->getMessage();
            return redirect()->back()->with('fail', "Gagal: Terjadi kesalahan! " . $errcode);
        }

        return redirect()->back()->with('success', "Berhasil: Hydrant berhasil ditambahkan!");
    }
}
