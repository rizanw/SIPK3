<?php

namespace App\Http\Controllers;

use App\Kecelakaan;
use App\Ketidaksesuaian;
use App\Maintaince;
use Illuminate\Http\Request;

class MaintainceController extends Controller
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
        return view('maintaince.index');
    }

    public function indexAddKetidaksesuian()
    {
        $data = (object) array(
            'title' => 'Ketidaksesuian',
            'route' => route('maintaince.ketidaksesuian.post')
        );
        $kasus = Ketidaksesuaian::where('status', '1')->get();

        return view('maintaince.add')
            ->with('data', $data)
            ->with('cases', $kasus);
    }

    public function indexAddKecelakaan()
    {
        $data = (object) array(
            'title' => 'Kecelakaan',
            'route' => route('maintaince.kecelakaan.post')
        );
        $kasus = Kecelakaan::where('status', '1')->get();

        return view('maintaince.add')
            ->with('data', $data)
            ->with('cases', $kasus);
    }

    public function create(Request $request)
    {
        $request->validate([
            'id_kasus' => 'required',
            'deskripsi' => 'required',
            'tanggal' => 'required',
            'foto' => 'mimes:jpeg,png,jpg|max:10024',
        ]);

        try {
            $fotoPath = null;
            if ($request->hasFile('foto')) {
                $foto = $request->file('foto');
                $ext = $foto->getClientOriginalExtension();
                $fotoName = time() . str_replace(' ', '', $request['jenis']) . '.' . $ext;
                $fotoPath = $foto->storeAs('public/maintaince', $fotoName);
            }

            Maintaince::create([
                'jenis' => strtolower($request['jenis']),
                'id_kasus' => $request['id_kasus'],
                'tanggal' => $request['tanggal'],
                'photo' => $fotoPath,
                'deskripsi' => $request['deskripsi'],
            ]);

        }catch (\Exception $exception) {
            $errcode = $exception->getMessage();
            return redirect()->back()->with('fail', "Gagal: Terjadi kesalahan! " . $errcode);
        }

        return redirect()->back()->with('success', "Berhasil: Laporan Maintaince Ketidaksesuaian berhasil dibuat!");
    }
}
