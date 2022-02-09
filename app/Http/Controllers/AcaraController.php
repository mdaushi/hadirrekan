<?php

namespace App\Http\Controllers;

use App\Models\Acara;
use Illuminate\Http\Request;

class AcaraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $acaras = Acara::all();
        return view('pages.acara.index', compact('acaras'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.acara.create');
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
            Acara::create($input);
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Gagal menyimpan data.' . $th->getMessage());
        }
        return redirect()->route('acara.index')->with('success', 'Berhasil menyimpan data');
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
        $acara = Acara::findOrFail($id);
        return view('pages.acara.edit', compact('acara'));
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
        $acara = Acara::findOrFail($id);
        try {
            $acara->update($input);
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Gagal menyimpan data.' . $th->getMessage());
        }
        return redirect()->route('acara.index')->with('success', 'Berhasil menyimpan data');
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
            $acara = Acara::findOrFail($id);
            $acara->delete();
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Gagal menghapus data.' . $th->getMessage());
        }
        return redirect()->route('acara.index')->with('success', 'Berhasil menghapus data');
    }
}
