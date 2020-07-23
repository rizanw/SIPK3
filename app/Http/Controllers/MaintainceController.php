<?php

namespace App\Http\Controllers;

use App\Kecelakaan;
use App\Ketidaksesuaian;
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


}
