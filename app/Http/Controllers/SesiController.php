<?php

namespace App\Http\Controllers;

use App\Models\Acara;
use App\Models\Sesi;
use Illuminate\Http\Request;

class SesiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sesis = Sesi::with('acara')->get();
        return view('pages.sesi.index', compact('sesis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $acaras = Acara::all();
        return view('pages.sesi.create', compact('acaras'));
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
        try {
            Sesi::create($input);
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Gagal menyimpan data.' . $th->getMessage());
        }
        return redirect()->route('sesi.index')->with('success', 'Berhasil menyimpan data');
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
        $sesi = Sesi::findOrFail($id);
        $acaras = Acara::all();
        return view('pages.sesi.edit', compact('sesi', 'acaras'));
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
        $sesi = Sesi::findOrFail($id);
        try {
            $sesi->update($input);
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Gagal menyimpan data.' . $th->getMessage());
        }
        return redirect()->route('sesi.index')->with('success', 'Berhasil menyimpan data');
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
            $sesi = Sesi::findOrFail($id);
            $sesi->delete();
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Gagal menghapus data.' . $th->getMessage());
        }
        return redirect()->route('sesi.index')->with('success', 'Berhasil menghapus data');
    }
}
