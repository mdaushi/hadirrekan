<?php

namespace App\Http\Controllers;

use App\Models\Peserta;
use App\Models\Presensi;
use Illuminate\Http\Request;

class PresensiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.presensi.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $pesertaExists = Peserta::where('acara_id', $input['acara_id'])->where('qrcode', $input['qr_code'].'.png')->first();
        if(!$pesertaExists) {
            return response()->json(['message' => 'Peserta tidak ditemukan', 'status' => false]);
        }
        try {
            $input['peserta_id'] = $pesertaExists->id;
            $check = Presensi::where('peserta_id', $input['peserta_id'])->where('acara_id', $input['acara_id'])->where('sesi_id', $input['sesi_id'])->exists();
            if(!$check){
                Presensi::create([
                    'peserta_id' => $input['peserta_id'],
                    'sesi_id' => $input['sesi_id'],
                    'acara_id' => $input['acara_id']
                ]);
                return response()->json(['message' => $pesertaExists->name . ' Hadir', 'status' => true]);
            }
            return response()->json(['status' => 'exists']);
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Ada kesalahan pada sistem'], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function get($acara, $sesi)
    {
        $presensi = Presensi::with('peserta')->where('acara_id', $acara)->where('sesi_id', $sesi)->get();
        return response()->json($presensi);
    }
}
