<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ketidaksesuaian;

class KetidaksesuaianController extends Controller
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
        return view('ketidaksesuaian.index');
    }

    public function indexAdd()
    {
        return view('ketidaksesuaian.add');
    }

    public function indexDetail($id)
    {
        $data = Ketidaksesuaian::where('id', $id)->first();
        return view('ketidaksesuaian.edit')
            ->with('data', $data);
    }

    public function fetch()
    {
        $ketidaksesuaians = Ketidaksesuaian::all();

        $dataKetidaksesuaian = array();
        foreach ($ketidaksesuaians as $ketidaksesuaian) {
            $dataKetidaksesuaian[] = array(
                'id' => $ketidaksesuaian->id,
                'temuan' => $ketidaksesuaian->temuan,
                'kategori' => $ketidaksesuaian->kategori,
                'lokasi' => $ketidaksesuaian->lokasi,
                'pic' => $ketidaksesuaian->pic,
                'tanggal' => $ketidaksesuaian->tanggal,
                'status' => $ketidaksesuaian->status == 1? "Open": "Close",
            );
        }

        return response()->json($dataKetidaksesuaian);
    }

    public function create(Request $request)
    {
        $request->validate([
            'temuan' => 'required',
            'tanggal' => 'required',
            'kategori' => 'required',
            'lokasi' => 'required',
            'foto' => 'mimes:jpeg,png,jpg|max:10024',
//            'severity' => 'required',
//            'likelihood' => 'required',
            'pic' => 'required',
            'pelapor' => 'required',
            'tindakan' => 'required',
            'status' => 'required',
        ]);

        try {
            $fotoPath = null;
            if($request->hasFile('foto')) {
                $foto = $request->file('foto');
                $ext = $foto->getClientOriginalExtension();

                $fotoPath = $foto->storeAs('ketidaksesuian', time().str_replace(' ', '', $request['temuan']).'.'.$ext);
            }

            Ketidaksesuaian::create([
                'temuan' => $request['temuan'],
                'tanggal' => $request['tanggal'],
                'kategori' => $request['kategori'],
                'lokasi' => $request['lokasi'],
                'photo' => $fotoPath,
                'resiko_keparahan' => $request['severity'],
                'resiko_kemungkinan' => $request['likelihood'],
                'pic' => $request['pic'],
                'pelapor' => $request['pelapor'],
                'tindakan' => $request['tindakan'],
                'status' => $request['status'],
            ]);

        }catch (\Exception $exception) {
            $errcode = $exception->getMessage();
            return redirect()->back()->with('fail', "Gagal: Terjadi kesalahan! " . $errcode);
        }

        return redirect()->back()->with('success', "Berhasil: Inspeksi Ketidaksesuaian berhasil dibuat!");
    }
}
