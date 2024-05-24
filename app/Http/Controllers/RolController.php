<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;

class RolController extends Controller
{
    public function list()
    {
        $roles = Role::all();
        return view('panel.role.list', compact('roles'));
       
    }

    public function add()
    {
        return view('panel.role.add');
    }

    public function edit($id)
    {
        $role = Role::find($id);
  
        return view('panel.role.edit', compact('role'));
    }

    public function insert(Request $request)
    {
        $request->validate([
            'name' => 'unique|required|string|max:255',
        ]);
    
        $rol = new Role();
        $rol->name = $request->name;
        $rol->save();

        return redirect()->route('role.list')->with('success', 'Rol creado exitosamente');
    }

    public function update(Request $request, $id): RedirectResponse
    {
        // $validated =  $request->validate([
        //     'name' => 'required|string|max:255', // Replace with appropriate validation rules
        // ]);

        $role = Role::find($id);
        $role->name = $request->input('name');
        $role->save();
    
        return redirect()->route('role.list')->with('success', 'Rol actualizado con éxito');
    }

    public function delete($id): RedirectResponse
    {
        $role = Role::find($id); 
        $role->delete();
       
        return redirect()->route('role.list')
                        ->with('success', 'Rol deleted successfully');
    }
}
