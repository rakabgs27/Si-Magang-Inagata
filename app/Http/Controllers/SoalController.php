<?php

namespace App\Http\Controllers;

use App\Models\Soal;
use App\Http\Requests\StoreSoalRequest;
use App\Http\Requests\UpdateSoalRequest;
use App\Models\Divisi;
use App\Models\DivisiMentor;
use Auth;
use DB;
use Illuminate\Http\Request;


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
        // Validate the request data
        $validated = $request->validated();

        // Set the authenticated user ID
        $validated['user_id'] = auth()->id();

        // Convert array 'divisi_id' to string
        $divisiIdsString = implode(',', $validated['divisi_id']);
        $validated['divisi_id'] = $divisiIdsString;

        // Store uploaded files in the 'materi' directory within the 'public' disk
        if ($request->hasFile('files')) {
            $filePaths = []; // Array to store file paths
            foreach ($request->file('files') as $file) {
                $fileName = $file->getClientOriginalName();
                $filePath = $file->storeAs('soal', $fileName, 'public');
                $filePaths[] = $filePath; // Store file path in array
            }
            // Convert array of file paths to string and separate them by comma
            $filePathsString = implode(',', $filePaths);

            // Store file paths in 'file_soal' column
            $validated['file_soal'] = $filePathsString;
        }

        // Create an instance of the Soal model and save it
        Soal::create($validated);

        // Redirect to the index page with a success message
        return redirect()->route('list-soal.index')->with('success', 'Soal berhasil disimpan!');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Soal  $soal
     * @return \Illuminate\Http\Response
     */
    public function show(Soal $soal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Soal  $soal
     * @return \Illuminate\Http\Response
     */
    public function edit(Soal $soal)
    {
        //
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
