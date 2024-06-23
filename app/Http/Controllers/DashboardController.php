<?php

namespace App\Http\Controllers;

use App\Models\DivisiMentor;
use App\Models\NilaiPendaftar;
use App\Models\Pendaftar;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified', 'role:user|manager|mentor']);
    }

    public function index()
    {
        $user = Auth::user();

        // Mendapatkan divisi id dari mentor yang login
        $mentorDivisi = DivisiMentor::where('user_id', $user->id)->pluck('divisi_id')->toArray();

        // Menghitung total pendaftar dengan status 'Terverifikasi'
        $totalTerverifikasi = Pendaftar::where('status', 'Terverifikasi')->count();

        // Menghitung total pendaftar dengan status 'Pending'
        $totalPending = Pendaftar::where('status', 'Pending')->count();

        // Menghitung total pendaftar dengan status 'Tertolak'
        $totalTertolak = Pendaftar::where('status', 'Tertolak')->count();

        // Menghitung total nilai pendaftar dengan status 'Sudah Dinilai'
        $totalSudahDinilai = NilaiPendaftar::where('status', 'Sudah Dinilai')
            ->whereIn('pendaftar_id', function ($query) use ($mentorDivisi) {
                $query->select('id')
                    ->from('pendaftars')
                    ->whereIn('divisi_id', $mentorDivisi);
            })
            ->count();

        // Menghitung total nilai pendaftar dengan status 'Belum Dinilai'
        $totalBelumDinilai = NilaiPendaftar::where('status', 'Belum Dinilai')
            ->whereIn('pendaftar_id', function ($query) use ($mentorDivisi) {
                $query->select('id')
                    ->from('pendaftars')
                    ->whereIn('divisi_id', $mentorDivisi);
            })
            ->count();

        return view('dashboard.index', [
            'totalTerverifikasi' => $totalTerverifikasi,
            'totalPending' => $totalPending,
            'totalTertolak' => $totalTertolak,
            'totalSudahDinilai' => $totalSudahDinilai,
            'totalBelumDinilai' => $totalBelumDinilai
        ]);
    }
}
