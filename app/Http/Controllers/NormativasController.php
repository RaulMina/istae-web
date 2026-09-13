<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\Noticiasfacebook;
use App\Models\Normativa;
use Illuminate\Support\Facades\Storage;

use Exception;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;

class NormativasController extends Controller
{
  
    public function Index()
    {
             //SEGURIDAD 
             try {
                //SEGURIDAD 
                   
                   if (session()->has('roles')) {
                      if (session('roles') && session('roles')->role_name != "admin") {
                          return redirect('/');
                      }
                  } else {
                      return redirect('/');
                  }

                $datos = Normativa::with('User',)
                ->has('User')
                ->latest()
                ->paginate(2);
                return view('normativa.index', compact('datos'));
            } catch (Exception $e) {
                return   redirect()->back()->with('error', 'Error al Cargar');
                }
          
         
    }
    public function search(Request $request)
    {
        try{
             //SEGURIDAD 

             if (session()->has('roles')) {
                if (session('roles') && session('roles')->role_name != "admin") {
                    return redirect('/');
                }
            } else {
                return redirect('/');
            }
    $query = Normativa::query();

    // Aplica los filtros de búsqueda si se proporcionan
    if ($request->has('detalle')) {
        $filtro_nombre = $request->input('detalle');
        $query->where('detalle', 'like', "%$filtro_nombre%");
    }

    // Continúa agregando más filtros si es necesario

    $datos = $query->latest()->paginate(10);

    return view('normativa.index', compact('datos'));
} catch (Exception $e) {
    return   redirect()->back()->with('error', 'Error al Cargar');
    }
   }
    public  function Sessionstar(){
        if (session()->has('user')) {
            return redirect('/');
        }
    }
 


    public function create()
    {
        try {
               //SEGURIDAD 
               if (session()->has('roles')) {
                if (session('roles') && session('roles')->role_name != "admin") {
                    return redirect('/');
                }
            } else {
                return redirect('/');
            }


             
        return view('normativa.create');

       
    } catch (Exception $e) {
        return   redirect()->back()->with('error', 'Error al Cargar');
        }


    }
    public function store(Request $request)
{
    try {
        // ---- SEGURIDAD ----
        if (!session()->has('roles') || session('roles')->role_name !== 'admin') {
            return redirect('/');
        }

        // ---- CREAR NUEVA NORMATIVA ----
        $Normativa = new Normativa();
        $Normativa->categoria = $request->input('categoria');
        $Normativa->detalle   = $request->input('detalle');
        $Normativa->id_users  = $request->input('id_users');

        // ---- SUBIDA DEL ARCHIVO ----
        if ($request->hasFile('link_normativa') && $request->file('link_normativa')->isValid()) {
            $file     = $request->file('link_normativa');
            $fileName = time() . '_' . $file->getClientOriginalName();

            // Guardar en storage/app/public/uploads/<categoria>
            $path = $file->storeAs(
                'uploads/' . $Normativa->categoria,  // Carpeta por categoría
                $fileName,
                'public'                             // Disco público
            );

            // Guardar ruta relativa en BD
            $Normativa->link_normativa = $path; // Ej: uploads/categoria/archivo.pdf
        }

        // ---- GUARDAR EN BASE DE DATOS ----
        if ($Normativa->save()) {
            return redirect()->back()->with('success', 'Creado con éxito');
        }

        return redirect()->back()->with('warning', 'No se pudo crear la normativa.');

    } catch (\Exception $e) {
        // Opcional: \Log::error($e);
        return redirect()->back()->with('error', 'Error al crear: ' . $e->getMessage());
    }
}
// esta funcion llama a la vista editar
    public function edit($id)
    {
        try {
         
 //SEGURIDAD 
             
 if (session()->has('roles')) {
    if (session('roles') && session('roles')->role_name != "admin") {
        return redirect('/');
    }
} else {
    return redirect('/');
}



$datos =  Normativa::findOrFail($id);
       
       
        return view('normativa.edit', compact('datos'));
  
    } catch (Exception $e) {
        return   redirect()->back()->with('error', 'Error al Cargar');
        }
    }

public function update(Request $request, $id)
{
    try {
        // ---- SEGURIDAD ----
        if (!session()->has('roles') || session('roles')->role_name !== 'admin') {
            return redirect('/');
        }

        // ---- OBTENER REGISTRO ----
        $Normativa = Normativa::findOrFail($id);
        $Normativa->categoria = $request->input('categoria');
        $Normativa->detalle   = $request->input('detalle');

        // ---- SUBIDA Y REEMPLAZO DEL ARCHIVO ----
        if ($request->hasFile('link_normativa') && $request->file('link_normativa')->isValid()) {

            // Eliminar archivo antiguo si existe
            if (!empty($Normativa->link_normativa) && Storage::disk('public')->exists($Normativa->link_normativa)) {
                Storage::disk('public')->delete($Normativa->link_normativa);
            }

            $file     = $request->file('link_normativa');
            $fileName = time() . '_' . $file->getClientOriginalName();

            // Guardar el nuevo archivo en storage/app/public/uploads/<categoria>
            $path = $file->storeAs(
                'uploads/' . $Normativa->categoria,
                $fileName,
                'public'
            );

            $Normativa->link_normativa = $path; // Ej: uploads/categoria/archivo.pdf
        }

        // ---- GUARDAR EN BASE DE DATOS ----
        if ($Normativa->save()) {
            return redirect()->back()->with('success', 'Actualizado con éxito');
        }

        return redirect()->back()->with('error', 'No se pudo actualizar la normativa.');

    } catch (\Exception $e) {
        // Opcional: \Log::error($e);
        return redirect()->back()->with('error', 'Error al actualizar: ' . $e->getMessage());
    }
}

// esta funcion elimina datos de la tabla
    public function destroy($id)
    {
        try {
         //SEGURIDAD 
             
         if (session()->has('roles')) {
            if (session('roles')->role_name == "admin") {

                $dato = Normativa::findOrFail($id);
             
                $rutafile2 = public_path( $dato->link_normativa); // Ruta completa al archivo en la carpeta 'public'
        
                if (File::exists($rutafile2)) {
                    File::delete($rutafile2); // Elimina el archivo
                }
                $dato->delete();
           
                return redirect()->route('normativa.index');
            }else{
                return   redirect()->back()->with('error', 'Error al Cargar');
            }
        } else {
            return redirect('/');
        }


      
    
    } catch (Exception $e) {
        return   redirect()->back()->with('error', 'Error al Cargar');
        }
    }

    // login
// esta funcion realiza una verificacion y un login



}
