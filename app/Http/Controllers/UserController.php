<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\{
    User,
    Role
};

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $users = User::all();

        return view('admin.acl.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

        $users = User::all();
        $roles = Role::all();

        return view('admin.acl.users.create', compact('users', 'roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //

        $user = User::findOrFail($id);
        $roles = Role::all();

        // dd($user->roles->pluck('name')->first());

        // $userRole = Role::findOrFail($user->roles);

        return view('admin.acl.users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //

        // dd($request, $id);

        $user = User::findOrFail($id);

        DB::beginTransaction();

            $user->update([
                'name' => $request->name
            ]);

            $user->roles()->sync($request->role);

        DB::commit();

        return redirect()->route('user.index')->with('sucesso', 'Usuário editado com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
