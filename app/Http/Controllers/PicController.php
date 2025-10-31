<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pic;
use App\Models\Jabatan;
use Illuminate\Support\Facades\Hash;

class PicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pics = Pic::with('jabatan')->get();
        $jabatans = Jabatan::all();
        return view('master.pic.index', compact('pics','jabatans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jabatans = Jabatan::all();
        return view('master.pic.create', compact('jabatans'));
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
            'username' => 'required|string|max:255|unique:pics,username',
            'password' => 'required|string|min:6',
            'nama' => 'required|string|max:255',
            'id_jabatan' => 'nullable|exists:jabatans,id_jabatan',
        ]);

        Pic::create([
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'nama' => $request->nama,
            'id_jabatan' => $request->id_jabatan,
        ]);

        return redirect()->route('pics.index')->with('success', 'PIC berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pic = Pic::findOrFail($id);
        return view('master.pic.show', compact('pic'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pic = Pic::findOrFail($id);
        $jabatans = Jabatan::all();
        return view('master.pic.edit', compact('pic','jabatans'));
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
            'username' => 'required|string|max:255|unique:pics,username,'.$id.',id_pic',
            'password' => 'nullable|string|min:6',
            'nama' => 'required|string|max:255',
            'id_jabatan' => 'nullable|exists:jabatans,id_jabatan',
        ]);

        $pic = Pic::findOrFail($id);
        $data = [
            'username' => $request->username,
            'nama' => $request->nama,
            'id_jabatan' => $request->id_jabatan,
        ];

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $pic->update($data);

        return redirect()->route('pics.index')->with('success', 'PIC berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pic = Pic::findOrFail($id);
        $pic->delete();
        return redirect()->route('pics.index')->with('success', 'PIC berhasil dihapus!');
    }
}
