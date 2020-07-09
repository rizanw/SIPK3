<?php

namespace App\Http\Controllers;

use App\AlatKebakaranApar;
use App\AlatKebakaranHydrant;
use App\KebakaranAktifApar;
use App\KebakaranAktifHydrant;
use Illuminate\Http\Request;

class KebakaranAktif extends Controller
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
        return view('kebakaran.index');
    }

    public function fetch()
    {
        $apars = KebakaranAktifApar::with('alat')->get();
        $hydrants = KebakaranAktifHydrant::with('alat')->get();

        $dataApar = array();
        foreach ($apars as $apar) {
            $dataApar[] = array(
                'id' => $apar->id,
                'jenis' => 'APAR',
                'kode' => $apar->alat->kode,
                'tanggal' => $apar->tanggal_inspeksi,
            );
        }

        $dataHydrant = array();
        foreach ($hydrants as $hydrant) {
            $dataHydrant[] = array(
                'id' => $hydrant->id,
                'jenis' => 'Hydrant',
                'kode' => $hydrant->alat->kode,
                'tanggal' => $hydrant->tanggal_inspeksi,
            );
        }

        return response()->json(array_merge($dataApar, $dataHydrant));
    }

    public function addAparIndex()
    {
        $apars = AlatKebakaranApar::all();
        return view('kebakaran.add-apar')->with('apars', $apars);
    }

    public function addHydrantIndex()
    {
        $hydrants = AlatKebakaranHydrant::all();
        return view('kebakaran.add-hydrant')->with('hydrants', $hydrants);
    }

    public function createApar(Request $request)
    {
        $request->validate([
            'apar' => 'required',
            'tanggal' => 'required',
            'a' => 'required',
            'b' => 'required',
            'c' => 'required',
            'd' => 'required',
            'e' => 'required',
            'f' => 'required',
            'g' => 'required',
            'h' => 'required',
            'i' => 'required',
        ]);

        try {
            KebakaranAktifApar::create([
                'id_apar' => $request['apar'],
                'tanggal_inspeksi' => $request['tanggal'],
                'a' => $request['a'],
                'b' => $request['b'],
                'c' => $request['c'],
                'd' => $request['d'],
                'e' => $request['e'],
                'f' => $request['f'],
                'g' => $request['g'],
                'h' => $request['h'],
                'i' => $request['i'],
            ]);
        } catch (\Exception $exception) {
            $errcode = $exception->getMessage();
            return redirect()->back()->with('fail', "Gagal: Terjadi kesalahan! " . $errcode);
        }

        return redirect()->back()->with('success', "Berhasil: Inspeksi Kebakaran Aktif APAR berhasil ditambahkan!");
    }

    public function createHydrant(Request $request)
    {
        $request->validate([
            'hydrant' => 'required',
            'tanggal' => 'required',
            'a' => 'required',
            'b' => 'required',
            'c' => 'required',
            'd' => 'required',
            'e' => 'required',
            'f' => 'required',
            'g' => 'required',
            'h' => 'required',
            'i' => 'required',
            'j' => 'required',
            'k' => 'required',
            'l' => 'required',
            'm' => 'required',
            'n' => 'required',
            'o' => 'required',
            'p' => 'required',
            'q' => 'required',
        ]);

        try {
            KebakaranAktifHydrant::create([
                'id_hydrant' => $request['hydrant'],
                'tanggal_inspeksi' => $request['tanggal'],
                'a' => $request['a'],
                'b' => $request['b'],
                'c' => $request['c'],
                'd' => $request['d'],
                'e' => $request['e'],
                'f' => $request['f'],
                'g' => $request['g'],
                'h' => $request['h'],
                'i' => $request['i'],
                'j' => $request['j'],
                'k' => $request['k'],
                'l' => $request['l'],
                'm' => $request['m'],
                'n' => $request['n'],
                'o' => $request['o'],
                'p' => $request['p'],
                'q' => $request['q'],
            ]);
        } catch (\Exception $exception) {
            $errcode = $exception->getMessage();
            return redirect()->back()->with('fail', "Gagal: Terjadi kesalahan! " . $errcode);
        }

        return redirect()->back()->with('success', "Berhasil: Inspeksi Kebakaran Aktif Hydrant berhasil ditambahkan!");
    }

}
