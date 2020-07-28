<?php

namespace App\Http\Controllers;

use App\Jadwal;
use Illuminate\Http\Request;

class JadwalController extends Controller
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
        return view('jadwal.index');
    }

    public function indexAdd()
    {
        return view('jadwal.add');
    }

    public function indexDetail($id)
    {
        $data = Jadwal::where('id', $id)->first();
        if (!$data) return redirect()->route('home')->with('fail', "Tidak ada data jadwal tersebut!");
        return view('jadwal.edit')
            ->with('data', $data);
    }

    public function fetch()
    {
        $jadwals = Jadwal::all();

        $data = array();
        foreach ($jadwals as $jadwal){
            $data[] = array(
                'id' => $jadwal->id,
                'tanggal' => $jadwal->tanggal,
                'tim' => $jadwal->tim
            );
        }

        return response()->json($data);
    }

    public function create(Request $request)
    {
        $request->validate([
            'tanggal' => 'required',
            'tim' => 'required',
            'deskripsi' => 'required',
        ]);

        try {
            Jadwal::create([
                'tanggal' => $request['tanggal'],
                'tim' => $request['tim'],
                'deskripsi' => $request['deskripsi'],
            ]);
        } catch (\Exception $exception) {
            $errcode = $exception->getMessage();
            return redirect()->back()->with('fail', "Gagal: Terjadi kesalahan! " . $errcode);
        }

        return redirect()->back()->with('success', "Berhasil: Jadwal berhasil ditambahkan!");
    }

}
