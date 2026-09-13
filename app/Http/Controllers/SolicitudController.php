<?php

namespace App\Http\Controllers;

use App\Models\Solicitud;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;

class SolicitudController extends Controller
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
        $solicitudes = Solicitud::latest()->paginate(10);
        return view('solicitudes.index', compact('solicitudes'));
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
        
        // Obtener los componentes de formatos para llenar los selects dinámicamente
        $componentesFormatos = \App\Models\ComponenteFormato::all()->groupBy('tipos_campos');
        
        return view('solicitudes.create', compact('componentesFormatos'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombres_apellidos_estudiante' => 'nullable|string|max:255',
            'institu_destino' => 'nullable|string|max:255',
            'tutor_academico' => 'nullable|string|max:255',
            'carrera' => 'nullable|string|max:255',
            'cedula' => 'nullable|string|max:20|unique:solicitudes',
            'proyecto_asigando' => 'nullable|string|max:255',
            'codificacion_proyecto' => 'nullable|string|max:255',
            'codificacion_programa' => 'nullable|string|max:255',
            'numeracion_proyecto' => 'nullable|string|max:255',
            'periodo' => 'nullable|string|max:255',
            'correo' => 'nullable|email|max:255|unique:solicitudes',
            'celular' => 'nullable|string|max:20',
            'codigo_practicas' => 'nullable|string|max:255',
            'fecha_inicio' => 'nullable|date',
            'fecha_finalizacion' => 'nullable|date',
            'nombre_programa' => 'nullable|string|max:255',
        ]);

        $solicitud = Solicitud::create($validated);
        return redirect()->route('solicitudes.show', $solicitud)
            ->with('success', 'Solicitud creada exitosamente.');
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
        $solicitud = Solicitud::findOrFail($id);
        return view('solicitudes.show', compact('solicitud'));
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
        
        $solicitud = Solicitud::findOrFail($id);
        
        // Obtener los componentes de formatos para llenar los selects dinámicamente
        $componentesFormatos = \App\Models\ComponenteFormato::all()->groupBy('tipos_campos');
        
        return view('solicitudes.edit', compact('solicitud', 'componentesFormatos'));
    }

    public function update(Request $request, $id)
    {
        $solicitud = Solicitud::findOrFail($id);
        
        $validated = $request->validate([
            'nombres_apellidos_estudiante' => 'nullable|string|max:255',
            'institu_destino' => 'nullable|string|max:255',
            'tutor_academico' => 'nullable|string|max:255',
            'carrera' => 'nullable|string|max:255',
            'cedula' => 'nullable|string|max:20|unique:solicitudes,cedula,' . $id,
            'proyecto_asigando' => 'nullable|string|max:255',
            'codificacion_proyecto' => 'nullable|string|max:255',
            'codificacion_programa' => 'nullable|string|max:255',
            'numeracion_proyecto' => 'nullable|string|max:255',
            'periodo' => 'nullable|string|max:255',
            'correo' => 'nullable|email|max:255|unique:solicitudes,correo,' . $id,
            'celular' => 'nullable|string|max:20',
            'codigo_practicas' => 'nullable|string|max:255',
            'fecha_inicio' => 'nullable|date',
            'fecha_finalizacion' => 'nullable|date',
            'nombre_programa' => 'nullable|string|max:255',
        ]);

        $solicitud->update($validated);
        return redirect()->route('solicitudes.show', $solicitud)
            ->with('success', 'Solicitud actualizada exitosamente.');
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
        $solicitud = Solicitud::findOrFail($id);
        $solicitud->delete();
        return redirect()->route('solicitudes.index')
            ->with('success', 'Solicitud eliminada exitosamente.');
    }

    public function descargarPdf($id)
    {
        $solicitud = Solicitud::findOrFail($id);
        $pdf = Pdf::loadView('solicitudes.pdf', compact('solicitud'));
        
        // Configurar el PDF para que se vea exactamente como el diseño
        $pdf->setPaper('A4', 'portrait');
        $pdf->setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true]);
        
        return $pdf->stream('solicitud-' . $solicitud->id . '.pdf');
    }

    public function verSolicitud($id)
    {
        $solicitud = Solicitud::findOrFail($id);
        return view('solicitudes.ver_solicitud', compact('solicitud'));
    }

    public function asignacionPracticas($id)
    {
        $solicitud = Solicitud::findOrFail($id);
        // dd('Método asignacionPracticas ejecutado', $solicitud); // Debug temporal
        return view('solicitudes.asignacion_practicas', compact('solicitud'));
    }
} 