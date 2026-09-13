<?php

namespace App\Http\Controllers;

use App\Models\ComponenteFormato;
use Illuminate\Http\Request;

class ComponenteFormatoController extends Controller
{
    public function index()
    {
        if (session()->has('roles')) {
            if (session('roles') && session('roles')->role_name != "admin") {
                return redirect('/');
            }
        } else {
            return redirect('/');
        }
        
        $componentes = ComponenteFormato::latest()->paginate(10);
        return view('componentes_formatos.index', compact('componentes'));
    }

    public function create()
    {
        if (session()->has('roles')) {
            if (session('roles') && session('roles')->role_name != "admin") {
                return redirect('/');
            }
        } else {
            return redirect('/');
        }
        
        return view('componentes_formatos.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'tipos_campos' => 'required|in:institu_destino,tutor_academico,proyecto_asigando,codificacion_proyecto,codificacion_programa,numeracion_proyecto,periodo,codigo_practicas,nombre_programa',
            'campos' => 'required|string|max:255'
        ]);

        $componente = ComponenteFormato::create($validated);
        return redirect()->route('componentes-formatos.show', $componente)
            ->with('success', 'Componente de formato creado exitosamente.');
    }

    public function show($id)
    {
        if (session()->has('roles')) {
            if (session('roles') && session('roles')->role_name != "admin") {
                return redirect('/');
            }
        } else {
            return redirect('/');
        }
        
        $componente = ComponenteFormato::findOrFail($id);
        return view('componentes_formatos.show', compact('componente'));
    }

    public function edit($id)
    {
        if (session()->has('roles')) {
            if (session('roles') && session('roles')->role_name != "admin") {
                return redirect('/');
            }
        } else {
            return redirect('/');
        }
        
        $componente = ComponenteFormato::findOrFail($id);
        return view('componentes_formatos.edit', compact('componente'));
    }

    public function update(Request $request, $id)
    {
        $componente = ComponenteFormato::findOrFail($id);
        
        $validated = $request->validate([
            'tipos_campos' => 'required|in:institu_destino,tutor_academico,proyecto_asigando,codificacion_proyecto,codificacion_programa,numeracion_proyecto,periodo,codigo_practicas,nombre_programa',
            'campos' => 'required|string|max:255'
        ]);

        $componente->update($validated);
        return redirect()->route('componentes-formatos.show', $componente)
            ->with('success', 'Componente de formato actualizado exitosamente.');
    }

    public function destroy($id)
    {
        if (session()->has('roles')) {
            if (session('roles') && session('roles')->role_name != "admin") {
                return redirect('/');
            }
        } else {
            return redirect('/');
        }
        
        $componente = ComponenteFormato::findOrFail($id);
        $componente->delete();
        return redirect()->route('componentes-formatos.index')
            ->with('success', 'Componente de formato eliminado exitosamente.');
    }
}
