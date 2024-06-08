<?php

namespace App\Http\Controllers\RoleAndPermission;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:role.index')->only('index');
        $this->middleware('permission:role.create')->only('create', 'store');
        $this->middleware('permission:role.edit')->only('edit', 'update');
        $this->middleware('permission:role.destroy')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $roles = DB::table('roles')
            ->when($request->input('name'), function ($query, $name) {
                return $query->where('name', 'like', '%' . $name . '%');
            })
            ->paginate(10);
        return view('permissions.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('permissions.roles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRoleRequest $request)
    {
        Role::create([
            'name' => $request->name,
            'guard_name' => $request->guard_name ?? 'web',
        ]);
        return redirect()->route('role.index')->with('success', 'Role Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Roles  $roles
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        //
        return view('permissions.roles.edit', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Roles  $roles
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRoleRequest $request, Role $role)
    {
        //
        $role->update($request->validated());
        return redirect()->route('role.index')->with('success', 'Role Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Roles  $roles
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        //
        $role->delete();
        return redirect()->route('role.index')->with('success', 'Role Deleted Successfully');
    }

    public function switchRole(Request $request)
    {
        $role = $request->input('role');
        $user = Auth::user();
        // Check if the user has the role
        Session::put('active_role', $role);
        $activeRole = Session::get('active_role', $user->roles->first()->name);

        if ($activeRole == 'manager') {
            $user->removeRole('reviewer');
            $user->assignRole('manager');
            return redirect('/dashboard')->with('success', 'Pindah Role ke Manager');
        } elseif ($activeRole == 'reviewer') {
            $user->removeRole('manager');
            $user->assignRole('reviewer');
            return redirect()->route('reviewer.index')->with('success', 'Pindah Role ke Reviewer');
        } else {
            // do nothing
        }

        return redirect()->back()->with('error', 'You do not have the ' . $role . ' role');
    }
}
