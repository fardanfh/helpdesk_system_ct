<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Permasalahan;

class PermasalahanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permasalahans = Permasalahan::all();
        return view('master.permasalahan.index', compact('permasalahans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('master.permasalahan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_permasalahan' => 'required|string|max:255',
        ]);

        Permasalahan::create([
            'nama_permasalahan' => $request->nama_permasalahan,
        ]);

        return redirect()->route('permasalahans.index')->with('success', 'Permasalahan berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $permasalahan = Permasalahan::findOrFail($id);
        return view('master.permasalahan.show', compact('permasalahan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $permasalahan = Permasalahan::findOrFail($id);
        return view('master.permasalahan.edit', compact('permasalahan'));
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
        $request->validate([
            'nama_permasalahan' => 'required|string|max:255',
        ]);

        $permasalahan = Permasalahan::findOrFail($id);
        $permasalahan->update([
            'nama_permasalahan' => $request->nama_permasalahan,
        ]);

        return redirect()->route('permasalahans.index')->with('success', 'Permasalahan berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $permasalahan = Permasalahan::findOrFail($id);
        $permasalahan->delete();
        return redirect()->route('permasalahans.index')->with('success', 'Permasalahan berhasil dihapus!');
    }
}
