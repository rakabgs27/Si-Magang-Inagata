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
        $judulSoalSearch = $request->input('judul_soal');

        $listSoal = Soal::when($request->input('judul_soal'), function ($query, $judulSoal) {
            return $query->where('judul_soal', 'like', '%' . $judulSoal . '%');
        })
            ->join('divisis', 'soals.divisi_id', '=', 'divisis.id')
            ->join('users', 'soals.user_id', '=', 'users.id')
            ->select('soals.*', 'divisis.nama_divisi as nama_divisi', 'users.name as name')
            ->paginate(10);
        // dd($listSoal);
        return view('soal-management.list-soal.index', [
            'listSoal' => $listSoal,
            'judulSoalSearch' => $judulSoalSearch,
        ]);
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
        $users = User::role('mentor')->get();
        $currentUser = Auth::user();

        return view('soal-management.list-soal.edit', [
            'listSoal' => $listSoal,
            'users' => $users,
            'currentUser' => $currentUser,
        ]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSoalRequest  $request
     * @param  \App\Models\Soal  $soal
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSoalRequest $request, Soal $soal)
    {
        //
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
}
