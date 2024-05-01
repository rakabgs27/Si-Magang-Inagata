<?php

namespace App\Http\Controllers;

use App\Models\Soal;
use App\Http\Requests\StoreSoalRequest;
use App\Http\Requests\UpdateSoalRequest;
use App\Models\Divisi;
use App\Models\DivisiMentor;
use App\Models\FileMateri;
use App\Models\User;
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
        try {
            $user = auth()->user();
            $judulSoalSearch = $request->input('judul_soal');

            $query = Soal::when($judulSoalSearch, function ($query, $judulSoal) {
                return $query->where('judul_soal', 'like', '%' . $judulSoal . '%');
            })
                ->join('divisis', 'soals.divisi_id', '=', 'divisis.id')
                ->join('users', 'soals.user_id', '=', 'users.id')
                ->select('soals.*', 'divisis.nama_divisi as nama_divisi', 'users.name as name');

            if ($user->hasRole('mentor')) {
                $mentorDivisiIds = DivisiMentor::where('user_id', $user->id)->pluck('divisi_id');

                if ($mentorDivisiIds->isEmpty()) {
                    return redirect()->back()->withErrors('No divisions found for this mentor.');
                }

                $query->whereIn('divisi_id', $mentorDivisiIds);
            } else if (!$user->hasRole('manager')) {
                return redirect()->back()->withErrors('Access Denied: You do not have permission to view this page.');
            }

            $listSoal = $query->paginate(10);

            return view('soal-management.list-soal.index', [
                'listSoal' => $listSoal,
                'judulSoalSearch' => $judulSoalSearch,
            ]);
        } catch (\Exception $e) {
            return back()->withErrors(['error' => $e->getMessage()]);
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
                $path = $file->store('public/files');

                FileMateri::updateOrCreate(
                    ['soal_id' => $listSoal->id, 'files' => basename($path)],
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
    public function destroy(Soal $soal)
    {
        //
    }

    public function destroyFile($id)
    {
        $file = FileMateri::find($id);
        if ($file) {

            Storage::delete($file->files);


            $file->delete();

            return redirect()->back()->with('success', 'File berhasil dihapus!');
        } else {
            return redirect()->back()->with('error', 'File tidak ditemukan!');
        }
    }
}
