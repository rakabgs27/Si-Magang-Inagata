<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\URL;
use Spatie\Permission\Models\Role;

class AutoLoginManager
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Verifikasi apakah URL ditandatangani dengan benar
        if (!URL::hasValidSignature($request)) {
            return response()->json(['message' => 'Invalid or expired signature.'], 403);
        }

        // Ambil user manager berdasarkan ID dari request
        $managerId = $request->input('manager');
        $manager = User::find($managerId);

        if ($manager && $manager->hasRole('manager')) {
            // Login sebagai manager
            Auth::login($manager);
            Log::info('Logged in as manager. User: ' . Auth::user()->id);
        } else {
            Log::info('No manager found or user is not a manager.');
            return response()->json(['message' => 'No manager found or user is not a manager.'], 403);
        }

        return $next($request);
    }
}
