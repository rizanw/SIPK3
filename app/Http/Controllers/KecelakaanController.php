<?php

namespace App\Http\Controllers;

use App\Exports\KecelakaanExport;
use App\Kecelakaan;
use App\KecelakaanKorban;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

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

    public function indexDetail($id)
    {
        $data = Kecelakaan::where('id', $id)->first();
        $dataKorban = KecelakaanKorban::where('id_inspeksi', $id)->get();
        if (!$data) return redirect()->route('kecelakaan')->with('fail', "Tidak ada data inspeksi tersebut!");
        return view('kecelakaan.edit')
            ->with('data', $data)
            ->with('korbans', $dataKorban);
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
                'status' => $kecelakaan->status == 1 ? "Open" : "Close"
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
            'severity' => 'required',
            'likelihood' => 'required',
            'foto' => 'mimes:jpeg,png,jpg|max:10024',
            'tindakan' => 'required',
            'pj' => 'required',
            'status' => 'required',
        ]);

        try {
            $fotoPath = null;
            if ($request->hasFile('foto')) {
                $foto = $request->file('foto');
                $ext = $foto->getClientOriginalExtension();
                $fotoName = time() . str_replace(' ', '', $request['kejadian']) . '.' . $ext;
                $fotoPath = $foto->storeAs('public/kecelakaan', $fotoName);
            }

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
                'photo' => $fotoPath,
                'tindakan' => $request['tindakan'],
                'penanggung_jawab' => $request['pj'],
                'status' => $request['status'],
            ]);

            for ($i = 0; $i < count($request['nama-korban']); $i++) {
                if ($request['jumlahkorban'] == 0) break;

                KecelakaanKorban::create([
                    'id_inspeksi' => $kecelakaan->id,
                    'nama' => $request['nama-korban'][$i],
                    'usia' => $request['usia-korban'][$i],
                    'jenis_kelamin' => $request['jenis-kelamin'][$i],
                ]);
            }

        } catch (\Exception $exception) {
            $errcode = $exception->getMessage();
            return redirect()->back()->with('fail', "Gagal: Terjadi kesalahan! " . $errcode);
        }

        return redirect()->back()->with('success', "Berhasil: Inspeksi Kecelakaan berhasil ditambahkan!");
    }

    public function updateStatus(Request $request)
    {
        $kecelakaan = Kecelakaan::find($request['id']);

        $kecelakaan->status = $request['status'];
        $kecelakaan->save();

        return redirect()->back()->with('success', "Berhasil: Status Inspeksi Kecelakaan berhasil diubah!");
    }

    public function export()
    {
        return Excel::download(new KecelakaanExport, time() . '-kecelakaan.xlsx');
    }
}
