<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Laporan;
use App\Models\Pic;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Schema;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $laporans = Laporan::with(['lokasi', 'area', 'permasalahan', 'pic', 'status', 'priority'])
            ->orderBy('created_at', 'desc')
            ->get();

        return view('master.laporan.index', compact('laporans'));
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
        $data = $request->validate([
            'nama_pelapor' => 'required|string|max:191',
            'id_lokasi' => 'required|integer|exists:lokasis,id_lokasi',
            'id_area' => 'required|integer|exists:areas,id_area',
            'id_permasalahan' => 'required|integer|exists:permasalahans,id_permasalahan',
            'deskripsi_laporan' => 'required|string',
            'foto_permasalahan' => 'nullable|image|max:5120',
        ]);

        // Generate a unique report number
        $data['no_laporan'] = 'LP' . now()->format('Ymd') . Str::upper(Str::random(4));
        $data['periode'] = now()->toDateString();

    // Do not assign PIC here — leave null so admin can assign later
    $data['id_pic'] = null;

        // priority and status fields may be nullable; use null for new reports
        if (Schema::hasColumn('laporans', 'status_id')) {
            $data['status_id'] = null;
        }
        if (Schema::hasColumn('laporans', 'priority_id')) {
            $data['priority_id'] = null;
        }

        // Handle file upload to public/uploads/laporans
        if ($request->hasFile('foto_permasalahan')) {
            $file = $request->file('foto_permasalahan');
            $filename = time() . '_' . Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . $file->getClientOriginalExtension();
            $dest = public_path('uploads/laporans');
            if (!is_dir($dest)) {
                mkdir($dest, 0755, true);
            }
            $file->move($dest, $filename);
            $data['foto_permasalahan'] = 'uploads/laporans/' . $filename;
        }

        // Create the laporan
        $laporan = Laporan::create($data);

        return redirect()->back()->with('success', 'Laporan berhasil dikirim. Nomor laporan: ' . $laporan->no_laporan);
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
}
