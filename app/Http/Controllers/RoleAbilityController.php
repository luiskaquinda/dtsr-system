<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\{
    User,
    Role,
    Ability
};

use Illuminate\Support\Facades\DB;

class RoleAbilityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function indexRole()
    {
        //
        $roles = Role::all();

        return view('admin.acl.roles.index', compact('roles'));
    }

    public function indexAbility()
    {
        //
        $abilities = Ability::all();

        return view('admin.acl.abilities.index', compact('abilities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function createRole()
    {
        //
        return view('admin.acl.roles.create');
    }

    /**
     * Show the form for creating a new resource.
     */

    public function createAbility()
    {
        //
        return view('admin.acl.abilities.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function roleStore(Request $request)
    {
        //

        DB::beginTransaction();

            $role = Role::create([
                'name' => $request->name
            ]);

        DB::commit();

        return redirect()->route('role.create')->with('sucesso', 'Role cadastrada com sucesso.');
    }

    public function abilityStore(Request $request)
    {
        //

        DB::beginTransaction();

            $abilidade = Ability::create([
                'name' => $request->name
            ]);

        DB::commit();

        return redirect()->route('ability.create')->with('sucesso', 'Abilidade cadastrada com sucesso.');
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
    public function abilityEdit(string $id)
    {
        //
        $ability = Ability::findOrFail($id);

        return view('admin.acl.abilities.edit', compact('ability'));
    }

    public function roleEdit(string $id)
    {
        //
        $role = Role::findOrFail($id);
        $abilities = Ability::all();

        return view('admin.acl.roles.edit', compact('role', 'abilities'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function abilityUpdate(Request $request, string $id)
    {
        //
        $abilidade = Ability::findOrFail($id);

        DB::beginTransaction();

            $abilidade->update([
                'name' => $request->name
            ]);

        DB::commit();

        return redirect()->route('ability.index')->with('sucesso', 'Abilidade editada com sucesso.');
    }

    public function roleUpdate(Request $request, string $id)
    {
        //
        $role = Role::findOrFail($id);

        DB::beginTransaction();

            $role->update([
                'name' => $request->name
            ]);

            $role->abilities()->sync($request->ability);

        DB::commit();

        return redirect()->route('role.index')->with('sucesso', 'Role editada com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function abilityDestroy(string $id)
    {
        //
        $ability = Ability::findOrFail($id);
        
        DB::beginTransaction();
            $ability->delete();
        DB::commit();

        return redirect()->route('ability.index')->with('sucesso', 'Abilidade eliminada com sucesso.');
    }

    public function roleDestroy(string $id)
    {
        //
        $role = Role::findOrFail($id);
        
        DB::beginTransaction();
            $role->delete();
        DB::commit();

        return redirect()->route('role.index')->with('sucesso', 'Role eliminada com sucesso.');
    }
}
