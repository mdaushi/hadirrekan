<?php

namespace App\Http\Controllers;

use App\Models\Acara;
use App\Models\Peserta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class PesertaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pesertas = Peserta::with('acara')->get();
        return view('pages.peserta.index', compact('pesertas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $acaras = Acara::all();
        return view('pages.peserta.create', compact('acaras'));
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
        $nameTransform = str_replace(' ', '_', $input['name']);
        $asalTransform = str_replace(' ', '_', $input['asal']);
        try {
            $qrcode = QrCode::format('png')->size(100)->generate($nameTransform . '_' . $asalTransform);
            Storage::put('public/qrcode/' . $nameTransform . '_' . $asalTransform . '.png', $qrcode);
            $input['qrcode'] = $nameTransform . '_' . $asalTransform . '.png';
            Peserta::create($input);
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Gagal menyimpan data.' . $th->getMessage());
        }
        return redirect()->route('peserta.index')->with('success', 'Berhasil menyimpan data');
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
        $peserta = Peserta::findOrFail($id);
        $acaras = Acara::all();
        return view('pages.peserta.edit', compact('peserta', 'acaras'));
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
        $input = $request->all();
        $nameTransform = str_replace(' ', '_', $input['name']);
        $asalTransform = str_replace(' ', '_', $input['asal']);
        $peserta = Peserta::findOrFail($id);
        try {
            // hapus qrcode lama
            if(Storage::exists('public/qrcode/' . $peserta->qrcode)) {
                Storage::delete('public/qrcode/' . $peserta->qrcode);
            }
            $qrcode = QrCode::format('png')->size(100)->generate($nameTransform . '_' . $asalTransform);
            Storage::put('public/qrcode/' . $nameTransform . '_' . $asalTransform . '.png', $qrcode);
            $input['qrcode'] = $nameTransform . '_' . $asalTransform . '.png';
            $peserta->update($input);
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Gagal menyimpan data.' . $th->getMessage());
        }
        return redirect()->route('peserta.index')->with('success', 'Berhasil menyimpan data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $peserta = Peserta::findOrFail($id);
            if(Storage::exists('public/qrcode/' . $peserta->qrcode)) {
                Storage::delete('public/qrcode/' . $peserta->qrcode);
            }
            $peserta->delete();
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Gagal menghapus data.' . $th->getMessage());
        }
        return redirect()->route('peserta.index')->with('success', 'Berhasil menghapus data');
    }
}
