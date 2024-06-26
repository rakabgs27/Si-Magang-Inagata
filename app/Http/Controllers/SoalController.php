<?php

namespace App\Http\Controllers;

use App\Models\Soal;
use App\Http\Requests\StoreSoalRequest;
use App\Http\Requests\UpdateSoalRequest;
use App\Models\Divisi;
use App\Models\DivisiMentor;
use App\Models\FileMateri;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SoalController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:list-soal.index')->only('index');
        $this->middleware('permission:list-soal.create')->only('create', 'store');
        $this->middleware('permission:list-soal.edit')->only('edit', 'update');
        $this->middleware('permission:list-soal.destroy')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = auth()->user();
        $userManager = $user->hasRole('manager');
        $mentorDivisiId = DivisiMentor::where('user_id', $user->id)->first()->divisi_id ?? null;

        try {
            $judulSoalSearch = $request->input('judul_soal');
            $divisiFilter = $request->input('divisi_id'); // Menangkap input filter divisi

            $query = Soal::when($judulSoalSearch, function ($query, $judulSoal) {
                return $query->where('judul_soal', 'like', '%' . $judulSoal . '%');
            })
                ->join('divisis', 'soals.divisi_id', '=', 'divisis.id')
                ->join('users', 'soals.user_id', '=', 'users.id')
                ->select('soals.*', 'divisis.nama_divisi as nama_divisi', 'users.name as name');

            // Filter by divisi if divisiFilter is present
            if (!empty($divisiFilter)) {
                $query->where('divisi_id', $divisiFilter);
            }

            if ($user->hasRole('mentor')) {
                $mentorDivisiIds = DivisiMentor::where('user_id', $user->id)->pluck('divisi_id') ?? null;
                $query->whereIn('divisi_id', $mentorDivisiIds);
            } else if (!$user->hasRole('manager')) {
                return redirect()->back()->withErrors('Access Denied: You do not have permission to view this page.');
            }

            $listSoal = $query->paginate(10)->withQueryString();
            $divisis = Divisi::all(); // Dapatkan semua divisi untuk dropdown
        } catch (\Exception $e) {
            return back()->withErrors(['error' => $e->getMessage()]);
        }

        if ($userManager || $mentorDivisiId) {
            return view('soal-management.list-soal.index', [
                'listSoal' => $listSoal,
                'judulSoalSearch' => $judulSoalSearch,
                'divisis' => $divisis,
                'selectedDivisi' => $divisiFilter,
                'mentorDivisiId' => $mentorDivisiId,
                'userManager' => $userManager
            ]);

        }else{
            return view('soal-management.list-soal.index')->with([
                'mentorDivisiId' => $mentorDivisiId,
                'error'=>'Mentor does not have an associated division.',
                'userManager' => $userManager
            ]);
        }

    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $currentUser = Auth::user();

        $divisiMentors = DivisiMentor::where('user_id', $currentUser->id)->get();

        $divisiIds = $divisiMentors->pluck('divisi_id');

        $divisis = Divisi::whereIn('id', $divisiIds)->get();

        return view('soal-management.list-soal.create', [
            'divisis' => $divisis,
            'currentUser' => $currentUser,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSoalRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSoalRequest $request)
    {
        $validated = $request->validated();
        $validated['user_id'] = auth()->id();

        $divisiIdsString = implode(',', $validated['divisi_id']);
        $validated['divisi_id'] = $divisiIdsString;

        $files = $validated['files'];
        unset($validated['files']);

        if (is_null($validated['deskripsi_soal'])) {
            $validated['deskripsi_soal'] = "Tidak ada deskripsi";
        }

        $soal = Soal::create($validated);

        if ($request->has('files')) {
            foreach ($files as $file) {
                $fileName = $file->getClientOriginalName();
                $filePath = $file->storeAs('soal', $fileName, 'public');

                $uploadFile = new FileMateri();
                $uploadFile->soal_id = $soal->id;
                $uploadFile->files = $filePath;
                $uploadFile->save();
            }
        }

        return redirect()->route('list-soal.index')->with('success', 'Soal berhasil disimpan!');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Soal  $soal
     * @return \Illuminate\Http\Response
     */
    public function show(Soal $listSoal)
    {
        $soal = Soal::with('divisi', 'user')->findOrFail($listSoal->id);

        $files = FileMateri::where('soal_id', $soal->id)->get();

        $fileData = $files->map(function ($file) {
            $fileName = basename($file->files);
            return [
                'url' => Storage::url($file->files),
                'name' => $fileName
            ];
        });

        return view('soal-management.list-soal.show', compact('soal', 'fileData'));
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Soal  $soal
     * @return \Illuminate\Http\Response
     */
    public function edit(Soal $listSoal)
    {
        $currentUser = Auth::user();

        $files = FileMateri::where('soal_id', $listSoal->id)->get();

        $divisiSelected = null;
        if ($listSoal->user_id == $currentUser->id) {
            $divisiSelected = $listSoal->divisi_id;
        }

        return view('soal-management.list-soal.edit', [
            'listSoal' => $listSoal,
            'currentUser' => $currentUser,
            'fileNames' => $files,
            'divisiSelected' => $divisiSelected,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSoalRequest  $request
     * @param  \App\Models\Soal  $soal
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSoalRequest $request, Soal $listSoal)
    {
        $listSoal->judul_soal = $request->input('judul_soal');
        $listSoal->deskripsi_soal = $request->input('deskripsi_soal', null);

        $listSoal->save();

        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {
                $originalName = $file->getClientOriginalName();
                $path = $file->storeAs('soal', $originalName, 'public');

                FileMateri::updateOrCreate(
                    ['soal_id' => $listSoal->id, 'files' => $originalName],
                    ['files' => $path]
                );
            }
        }

        return redirect()->route('list-soal.index')->with('success', 'Soal updated successfully!');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Soal  $soal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Soal $listSoal)
    {
        try {
            $materis = FileMateri::where('soal_id', $listSoal->id)->get();

            foreach ($materis as $materi) {
                if ($materi->file_path && Storage::exists($materi->file_path)) {
                    Storage::delete($materi->file_path);
                }

                $materi->delete();
            }

            $listSoal->delete();

            return redirect()->route('list-soal.index')->with('success', 'Soal dan materi terkait berhasil dihapus.');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }


    public function destroyFile($fileId)
    {
        $file = FileMateri::find($fileId);
        if ($file) {
            Storage::delete($file->files);

            $file->delete();
            return response()->json([
                'message' => 'File berhasil dihapus.',
                'success' => true
            ]);
        } else {
            return response()->json([
                'message' => 'File tidak ditemukan.',
                'success' => false
            ]);
        }
    }
}
