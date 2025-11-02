<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Laporan;
use App\Models\Pic;
use App\Models\Status;
use App\Models\Priority;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;


class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $with = ['lokasi', 'area', 'permasalahan', 'pic'];
        if (\Illuminate\Support\Facades\Schema::hasColumn('laporans', 'status_id')) {
            $with[] = 'status';
        }
        if (\Illuminate\Support\Facades\Schema::hasColumn('laporans', 'priority_id')) {
            $with[] = 'priority';
        }

        $query = Laporan::with($with)->orderBy('created_at', 'desc');

        // Support explicit assigned/unassigned filters via ?assigned=incoming|assigned
        $assignedFilter = $request->get('assigned');
        if ($assignedFilter !== null) {
            // incoming/unassigned
            if (in_array(strtolower($assignedFilter), ['incoming', '0', 'unassigned'])) {
                if (session('pic_id')) {
                    // show unassigned reports relevant to PIC's division (keywords)
                    $pic = Pic::with('jabatan')->find(session('pic_id'));
                    if ($pic) {
                        $divisionName = $pic->jabatan ? strtolower($pic->jabatan->nama_jabatan) : null;
                        $gaKeywords = [
                            'Struktur Bangunan',
                            'Furniture dan Fasilitas Bangunan',
                            'Kelistrikan dan Penerangan',
                            'Kebersihan dan Kerapian Area',
                            'Jaringan TV'
                        ];
                        $itKeywords = [
                            'Laptop',
                            'Printer',
                            'Internet',
                            'System',
                            'Telepon',
                            'CCTV',
                            'Email',
                            'PC'
                        ];

                        $keywords = [];
                        if ($divisionName && strpos($divisionName, 'ga') !== false) {
                            $keywords = $gaKeywords;
                        } elseif ($divisionName && strpos($divisionName, 'it') !== false) {
                            $keywords = $itKeywords;
                        }

                        $query->whereNull('id_pic');
                        if (!empty($keywords)) {
                            $query->where(function ($q) use ($keywords) {
                                $q->where(function ($qq) use ($keywords) {
                                    foreach ($keywords as $kw) {
                                        $qq->orWhereHas('permasalahan', function ($p) use ($kw) {
                                            $p->where('nama_permasalahan', 'like', "%{$kw}%");
                                        });
                                    }
                                });
                                $q->orWhere(function ($qq) use ($keywords) {
                                    foreach ($keywords as $kw) {
                                        $qq->orWhereHas('area', function ($a) use ($kw) {
                                            $a->where('nama_area', 'like', "%{$kw}%");
                                        });
                                    }
                                });
                            });
                        }
                    } else {
                        $query->whereNull('id_pic');
                    }
                } else {
                    // admin: show all unassigned
                    $query->whereNull('id_pic');
                }
            }

            // assigned
            if (in_array(strtolower($assignedFilter), ['assigned', '1'])) {
                if (session('pic_id')) {
                    $pic = Pic::with('jabatan')->find(session('pic_id'));
                    if ($pic && $pic->id_jabatan) {
                        $query->whereHas('pic', function ($q) use ($pic) {
                            $q->where('id_jabatan', $pic->id_jabatan);
                        });
                    } else {
                        // PIC without jabatan? show nothing assigned to their jabatan
                        $query->whereNotNull('id_pic');
                    }
                } else {
                    // admin: show all assigned
                    $query->whereNotNull('id_pic');
                }
            }

        } else {
            // No explicit assigned filter: original behavior
            // Allow filtering by division name via ?divisi=Name
            if ($request->filled('divisi')) {
                $div = $request->get('divisi');
                // Filter laporans where the assigned pic's jabatan (nama_jabatan) matches
                $query->whereHas('pic.jabatan', function ($q) use ($div) {
                    $q->where('nama_jabatan', 'like', "%{$div}%");
                });
            } elseif (session('pic_id')) {
                // If the current session is a PIC, scope to that PIC's jabatan (division)
                $pic = Pic::with('jabatan')->find(session('pic_id'));
                if ($pic) {
                    $divisionName = $pic->jabatan ? strtolower($pic->jabatan->nama_jabatan) : null;

                    // Define keyword sets for GA and IT based on provided mapping
                    $gaKeywords = [
                        'Struktur Bangunan',
                        'Furniture dan Fasilitas Bangunan',
                        'Kelistrikan dan Penerangan',
                        'Kebersihan dan Kerapian Area',
                        'Jaringan TV'
                    ];
                    $itKeywords = [
                        'Laptop',
                        'Printer',
                        'Internet',
                        'System',
                        'Telepon',
                        'CCTV',
                        'Email',
                        'PC'
                    ];

                    // Build query: include reports assigned to PICs with same jabatan OR unassigned reports matching keywords (permasalahan or area)
                    $query->where(function ($q) use ($pic, $divisionName, $gaKeywords, $itKeywords) {
                        // Reports already assigned to PICs with same id_jabatan
                        if ($pic->id_jabatan) {
                            $q->whereHas('pic', function ($qq) use ($pic) {
                                $qq->where('id_jabatan', $pic->id_jabatan);
                            });
                        }

                        // Determine which keyword set to use
                        $keywords = [];
                        if ($divisionName && strpos($divisionName, 'ga') !== false) {
                            $keywords = $gaKeywords;
                        } elseif ($divisionName && strpos($divisionName, 'it') !== false) {
                            $keywords = $itKeywords;
                        }

                        if (!empty($keywords)) {
                            // OR include unassigned reports that match the keywords in permasalahan or area
                            $q->orWhere(function ($qq) use ($keywords) {
                                $qq->whereNull('id_pic')
                                   ->where(function ($inner) use ($keywords) {
                                       foreach ($keywords as $kw) {
                                           $inner->orWhereHas('permasalahan', function ($p) use ($kw) {
                                               $p->where('nama_permasalahan', 'like', "%{$kw}%");
                                           });
                                       }
                                       foreach ($keywords as $kw) {
                                           $inner->orWhereHas('area', function ($a) use ($kw) {
                                               $a->where('nama_area', 'like', "%{$kw}%");
                                           });
                                       }
                                   });
                            });
                        }
                    });
                }
            }
        }

        $laporans = $query->get();

        // Provide lists for inline editing controls
        $pics = Pic::orderBy('nama')->get();
        $statuses = [];
        $priorities = [];
        if (Schema::hasTable('statuses')) {
            try {
                $statuses = Status::orderBy('name')->get();
            } catch (\Exception $e) {
                // ignore if model/table not present
                $statuses = [];
            }
        }
        if (Schema::hasTable('priorities')) {
            try {
                $priorities = Priority::orderBy('name')->get();
            } catch (\Exception $e) {
                $priorities = [];
            }
        }

        // Determine if current session PIC belongs to GA or IT staff — if so, show simplified view (no inline edit controls)
        $isStaffGaIt = false;
        if (session('pic_id')) {
            try {
                $sessPic = Pic::with('jabatan')->find(session('pic_id'));
                if ($sessPic && $sessPic->jabatan) {
                    $jab = strtolower($sessPic->jabatan->nama_jabatan);
                    if (strpos($jab, 'ga') !== false || strpos($jab, 'it') !== false) {
                        $isStaffGaIt = true;
                    }
                }
            } catch (\Exception $e) {
                // ignore
            }
        }

        // allow inline edit for 'laporan masuk' (incoming/unassigned) and for 'assigned' view
        // i.e. when ?assigned=incoming OR ?assigned=assigned we enable inline controls in the view
        $canInlineEdit = false;
        if ($request->filled('assigned')) {
            $assignedVal = strtolower($request->get('assigned'));
            if (in_array($assignedVal, ['incoming', '0', 'unassigned', 'assigned', '1'])) {
                $canInlineEdit = true;
            }
        }

        return view('master.laporan.index', compact('laporans', 'pics', 'statuses', 'priorities', 'isStaffGaIt', 'canInlineEdit'));
    }

    /**
     * Track a specific laporan by no_laporan.
     *
     * @param  string  $no_laporan
     * @return \Illuminate\Http\Response
     */
    public function track($no_laporan)
    {
        try {
            $with = ['lokasi', 'area', 'permasalahan', 'pic'];

            if (Schema::hasColumn('laporans', 'status_id')) {
                $with[] = 'status';
            }
            if (Schema::hasColumn('laporans', 'priority_id')) {
                $with[] = 'priority';
            }

            $laporan = Laporan::with($with)
                ->where('no_laporan', $no_laporan)
                ->first();

            if (!$laporan) {
                return response()->json([
                    'success' => false,
                    'message' => 'Laporan tidak ditemukan'
                ], 404);
            }

            return response()->json([
                'success' => true,
                'data' => $laporan
            ]);
        } catch (\Exception $e) {
            Log::error('Error tracking laporan: ' . $e->getMessage(), ['no_laporan' => $no_laporan]);
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan saat mengambil data laporan'
            ], 500);
        }
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

        // If the request expects JSON (AJAX), return JSON so the front-end can show the ticket
        if ($request->wantsJson() || $request->ajax()) {
            // reload relations that may be used by front-end
            $laporan->load(['lokasi', 'area', 'permasalahan', 'pic']);
            return response()->json([
                'success' => true,
                'message' => 'Laporan berhasil dikirim',
                'data' => $laporan
            ]);
        }

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
        $with = ['lokasi', 'area', 'permasalahan', 'pic'];
        if (Schema::hasColumn('laporans', 'status_id')) {
            $with[] = 'status';
        }
        if (Schema::hasColumn('laporans', 'priority_id')) {
            $with[] = 'priority';
        }

        $laporan = Laporan::with($with)->findOrFail($id);

        $pics = Pic::orderBy('nama')->get();
        $statuses = [];
        $priorities = [];
        if (Schema::hasTable('statuses')) {
            try {
                $statuses = Status::orderBy('name')->get();
            } catch (\Exception $e) {
                $statuses = [];
            }
        }
        if (Schema::hasTable('priorities')) {
            try {
                $priorities = Priority::orderBy('name')->get();
            } catch (\Exception $e) {
                $priorities = [];
            }
        }

        return view('master.laporan.show', compact('laporan', 'pics', 'statuses', 'priorities'));
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
        // Debug: log incoming update requests (only when JSON/ajax expected)
        if ($request->wantsJson() || $request->ajax()) {
            try {
                Log::info('Laporan update request received', [
                    'id' => $id,
                    'input' => $request->all(),
                    'files' => array_keys($request->files->all()),
                ]);
            } catch (\Exception $e) {
                // don't break on logging
            }
        }

        // Accept partial updates via AJAX for fields: id_pic, status_id, priority_id
        $laporan = Laporan::findOrFail($id);

        $data = [];
        $hasFile = false;

        // basic updatable scalar fields
        // Use exists() instead of has() to detect present fields even if empty strings
        if ($request->exists('id_pic')) {
            $data['id_pic'] = $request->input('id_pic') ?: null;
        }
        if (Schema::hasColumn('laporans', 'status_id') && $request->exists('status_id')) {
            $data['status_id'] = $request->input('status_id') ?: null;
        }
        if (Schema::hasColumn('laporans', 'priority_id') && $request->exists('priority_id')) {
            $data['priority_id'] = $request->input('priority_id') ?: null;
        }

        // additional maintenance fields
        if ($request->exists('tgl_dikerjakan')) {
            $data['tgl_dikerjakan'] = $request->input('tgl_dikerjakan') ?: null;
        }
        if ($request->exists('tgl_selesai')) {
            $data['tgl_selesai'] = $request->input('tgl_selesai') ?: null;
        }
        if ($request->exists('tindakan_perbaikan')) {
            $data['tindakan_perbaikan'] = $request->input('tindakan_perbaikan') ?: null;
        }
        if ($request->exists('total_nilai_perbaikan')) {
            $data['total_nilai_perbaikan'] = $request->input('total_nilai_perbaikan') !== '' ? $request->input('total_nilai_perbaikan') : null;
        }
        if ($request->exists('keterangan')) {
            $data['keterangan'] = $request->input('keterangan');
        }

        // handle uploaded foto_perbaikan if present
        if ($request->hasFile('foto_perbaikan')) {
            $hasFile = true;
        }

        if (empty($data) && !$hasFile) {
            Log::info('No updatable fields provided for laporan update', ['id' => $id, 'input' => $request->all(), 'files' => array_keys($request->files->all())]);
            $resp = ['success' => false, 'message' => 'No updatable fields provided'];
            if (config('app.debug')) {
                $resp['debug'] = ['request' => $request->all(), 'files' => array_keys($request->files->all()), 'assembled' => $data];
            }
            return response()->json($resp, 422);
        }

        // Basic validation rules
        $rules = [];
        if (array_key_exists('id_pic', $data) && !is_null($data['id_pic'])) {
            $rules['id_pic'] = 'integer|exists:pics,id_pic';
        }
        if (array_key_exists('status_id', $data) && !is_null($data['status_id'])) {
            $rules['status_id'] = 'integer|exists:statuses,id';
        }
        if (array_key_exists('priority_id', $data) && !is_null($data['priority_id'])) {
            $rules['priority_id'] = 'integer|exists:priorities,id';
        }
        if (array_key_exists('tgl_dikerjakan', $data) && !is_null($data['tgl_dikerjakan'])) {
            $rules['tgl_dikerjakan'] = 'date';
        }
        if (array_key_exists('tgl_selesai', $data) && !is_null($data['tgl_selesai'])) {
            $rules['tgl_selesai'] = 'date';
        }
        if (array_key_exists('tindakan_perbaikan', $data) && !is_null($data['tindakan_perbaikan'])) {
            $rules['tindakan_perbaikan'] = 'string';
        }
        if (array_key_exists('total_nilai_perbaikan', $data) && !is_null($data['total_nilai_perbaikan'])) {
            $rules['total_nilai_perbaikan'] = 'numeric';
        }

        if (!empty($rules)) {
            $validator = Validator::make($data, $rules);
            if ($validator->fails()) {
                Log::info('Laporan update validation failed', ['id' => $id, 'data' => $data, 'errors' => $validator->errors()->all()]);
                $resp = ['success' => false, 'message' => $validator->errors()->first()];
                if (config('app.debug')) {
                    $resp['debug'] = ['request' => $request->all(), 'files' => array_keys($request->files->all()), 'assembled' => $data, 'errors' => $validator->errors()->all()];
                }
                return response()->json($resp, 422);
            }
        }

        // validate file separately
        if ($hasFile) {
            $fileRules = ['foto_perbaikan' => 'image|max:5120'];
            $v2 = Validator::make($request->all(), $fileRules);
            if ($v2->fails()) {
                Log::info('Laporan update file validation failed', ['id' => $id, 'file_errors' => $v2->errors()->all()]);
                $resp = ['success' => false, 'message' => $v2->errors()->first()];
                if (config('app.debug')) {
                    $resp['debug'] = ['request' => $request->all(), 'files' => array_keys($request->files->all()), 'file_errors' => $v2->errors()->all()];
                }
                return response()->json($resp, 422);
            }
        }

        // Authorization: allow admin to update; allow PIC to update only if laporan is unassigned (incoming)
        $isAdmin = session('admin_id') ? true : false;
        $sessPicId = session('pic_id') ?? null;
        if (!$isAdmin && $sessPicId) {
            // PIC session: ensure laporan is unassigned or assigned to same jabatan
            $laporan->load('pic');
            if (!is_null($laporan->id_pic)) {
                // assigned to someone: allow only if same jabatan
                $sessPic = Pic::with('jabatan')->find($sessPicId);
                if (!$sessPic) {
                    Log::warning('Unauthorized laporan update attempt: missing session pic', ['id' => $id, 'sessPicId' => $sessPicId]);
                    return response()->json(['success' => false, 'message' => 'Unauthorized'], 403);
                }
                $assignedPic = $laporan->pic;
                if (!$assignedPic || ($assignedPic->id_jabatan ?? null) != ($sessPic->id_jabatan ?? null)) {
                    Log::warning('Unauthorized laporan update attempt: different jabatan', ['id' => $id, 'sessPicId' => $sessPicId, 'assignedPicId' => $assignedPic ? $assignedPic->id_pic : null]);
                    return response()->json(['success' => false, 'message' => 'Unauthorized to update this laporan'], 403);
                }
            }
        } elseif (!$isAdmin && !$sessPicId) {
            // no valid session
            Log::warning('Unauthorized laporan update attempt: no session', ['id' => $id]);
            return response()->json(['success' => false, 'message' => 'Unauthorized'], 403);
        }

        // Update and return new relations for UI
        try {
            // handle foto_perbaikan upload
            if ($request->hasFile('foto_perbaikan')) {
                $file = $request->file('foto_perbaikan');
                $filename = time() . '_' . preg_replace('/[^A-Za-z0-9\-_\.]/', '_', pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . $file->getClientOriginalExtension();
                $dest = public_path('uploads/perbaikan');
                if (!is_dir($dest)) mkdir($dest, 0755, true);
                $file->move($dest, $filename);
                $data['foto_perbaikan'] = 'uploads/perbaikan/' . $filename;
            }

            $laporan->fill($data);
            $laporan->save();

            $laporan->load(['pic']);
            if (Schema::hasColumn('laporans', 'status_id')) $laporan->load('status');
            if (Schema::hasColumn('laporans', 'priority_id')) $laporan->load('priority');

            return response()->json(['success' => true, 'message' => 'Laporan updated', 'data' => $laporan]);
        } catch (\Exception $e) {
            Log::error('Error updating laporan via AJAX: ' . $e->getMessage(), ['id' => $id, 'data' => $data]);
            return response()->json(['success' => false, 'message' => 'Failed to update laporan'], 500);
        }
    }

    /**
     * Print a specific laporan.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function print($id)
    {
        $with = ['lokasi', 'area', 'permasalahan', 'pic'];
        if (Schema::hasColumn('laporans', 'status_id')) {
            $with[] = 'status';
        }
        if (Schema::hasColumn('laporans', 'priority_id')) {
            $with[] = 'priority';
        }

        $laporan = Laporan::with($with)->findOrFail($id);

        return view('laporan.print', compact('laporan'));
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
