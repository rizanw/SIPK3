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

    public function addHydrantIndex()
    {
        return view('alat-kebakaran.add-hydrant');
    }

    public function fetch() {
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
            'berat' => 'required|numeric',
            'lokasi' => 'required',
        ]);

        try{
            $apar = AlatKebakaranApar::create([
                'kode' => $request['kode'],
                'jenis' => $request['jenis'],
                'berat' => $request['berat'],
                'lokasi' => $request['lokasi']
            ]);
        }catch (\Exception $exception){
            $errcode = $exception->getMessage();
            dd($errcode);
        }

        return redirect()->back()->with('message', "Berhasil: APAR berhasil ditambahkan!");
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
        }catch (\Exception $exception){
            $errcode = $exception->getMessage();
            dd($errcode);
        }

        return redirect()->back()->with('message', "Berhasil: Hydrant berhasil ditambahkan!");
    }
}
