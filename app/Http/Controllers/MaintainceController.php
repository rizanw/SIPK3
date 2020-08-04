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
        $data = (object)array(
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
        $data = (object)array(
            'title' => 'Kecelakaan',
            'route' => route('maintaince.kecelakaan.post')
        );
        $kasus = Kecelakaan::where('status', '1')->get();

        return view('maintaince.add')
            ->with('data', $data)
            ->with('cases', $kasus);
    }

    public function indexDetailKetidaksesuian($id)
    {
        $maintaince = Maintaince::where('id', $id)->first();
        $kasusMaintaince = Ketidaksesuaian::where('id', $maintaince->id_kasus)->first();
        $kasus = Ketidaksesuaian::where('status', '1')->get();
        $data = (object)array(
            'title' => 'Ketidaksesuian',
            'route' => route('maintaince.ketidaksesuian.post'),
            'routeInspeksi' => route('ketidaksesuaian.detail', $maintaince->id_kasus)
        );

        return view('maintaince.edit')
            ->with('data', $data)
            ->with('maintaince', $maintaince)
            ->with('maintainceCase', $kasusMaintaince)
            ->with('cases', $kasus);
    }

    public function indexDetailKecelakaan($id)
    {
        $maintaince = Maintaince::where('id', $id)->first();
        $kasusMaintaince = Kecelakaan::where('id', $maintaince->id_kasus)->first();
        $kasus = Kecelakaan::where('status', '1')->get();
        $data = (object)array(
            'title' => 'Kecelakaan',
            'route' => route('maintaince.kecelakaan.post'),
            'routeInspeksi' => route('kecelakaan.detail', $maintaince->id_kasus)
        );

        return view('maintaince.edit')
            ->with('data', $data)
            ->with('maintaince', $maintaince)
            ->with('maintainceCase', $kasusMaintaince)
            ->with('cases', $kasus);
    }

    public function fetch()
    {
        $maintainces = Maintaince::all();

        $data = array();
        foreach ($maintainces as $maintaince) {
            $data[] = array(
                'id' => $maintaince->id,
                'jenis' => $maintaince->jenis,
                'name' => $this->getName($maintaince->jenis, $maintaince->id_kasus),
                'tanggal' => $maintaince->tanggal
            );
        }

        return response()->json($data);
    }

    private function getName($jenis, $id)
    {
        if ($jenis == "kecelakaan") {
            $res = Kecelakaan::where('id', $id)->first();
            return $res->kejadian;
        } elseif ($jenis == "ketidaksesuian") {
            $res = Ketidaksesuaian::where('id', $id)->first();
            return $res->temuan;
        }
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

        } catch (\Exception $exception) {
            $errcode = $exception->getMessage();
            return redirect()->back()->with('fail', "Gagal: Terjadi kesalahan! " . $errcode);
        }

        return redirect()->back()->with('success', "Berhasil: Laporan Maintaince Ketidaksesuaian berhasil dibuat!");
    }

    public function destroy($type, $id_kasus)
    {
        try {
            Maintaince::where([
                ['jenis', '=', $type],
                ['id_kasus', '=', $id_kasus]
            ])->delete();
        }catch (\Exception $exception){
            return $exception;
        }

        return true;
    }
}
