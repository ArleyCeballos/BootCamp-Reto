<?php

namespace App\Http\Controllers\Permission;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('store.users.roles', [
            'roles' => Role::paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $request->validate([
            'nombre_rol' => 'required|unique:roles,name'
        ]);
    
        $rol = Role::create(['name' => $request->nombre_rol]);
    
        return redirect()->back()->with('success', 'Rol creado correctamente');
    
    }

    public function assign($id)
    {
        User::find($id)->assignRole('visible');
        return redirect('users');
    }
    public function remove($id)
    {
        User::find($id)->removeRole('visible');
        return redirect('users');
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
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $rol)
    {


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Buscar el rol por su ID
        $rol = Role::find($id);

        // Verificar si se encontró el rol
        if ($rol) {
            // Eliminar el rol
            $rol->delete();

            return redirect("roles");
        } else {
            return "El rol no existe";
        }
    }
}