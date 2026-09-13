<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\Noticiasfacebook;
use App\Models\Infoistae;
use Illuminate\Support\Facades\Storage;
use Exception;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;

class InfoistaesController extends Controller
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

                $datos = Infoistae::with('User',)
                ->has('User')
                ->latest()
                ->paginate(2);
                return view('infoistae.index', compact('datos'));
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
    $query = Infoistae::query();

    // Aplica los filtros de búsqueda si se proporcionan
    if ($request->has('detalle')) {
        $filtro_nombre = $request->input('detalle');
        $query->where('detalle', 'like', "%$filtro_nombre%");
    }

    // Continúa agregando más filtros si es necesario

    $datos = $query->latest()->paginate(10);

    return view('infoistae.index', compact('datos'));
} catch (Exception $e) {
    return   redirect()->back()->with('error', 'Error al Cargar');
    }
   }


   public function Categorias(Request $request)
   {
       try{
   $query = Infoistae::query();
 
   // Aplica los filtros de búsqueda si se proporcionan
   if ($request->has('categoria')) {
       $filtro_nombre = $request->input('categoria');
       $query->where('categoria', 'like', "%$filtro_nombre%");
   }
 
   // Continúa agregando más filtros si es necesario
 
   $datos = $query->latest()->paginate(1000);
   $categoria = $request->input('categoria');
   $matriz = compact('datos', 'categoria');
   return view('info.infoistae', compact('matriz'));
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


             
        return view('infoistae.create');

       
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

        // ---- CREAR NUEVO REGISTRO ----
        $Infoistae = new Infoistae();
        $Infoistae->categoria = $request->input('categoria');
        $Infoistae->detalle   = $request->input('detalle');
        $Infoistae->id_users  = $request->input('id_users');
        $Infoistae->nombre    = $request->input('nombre');

        // ---- SUBIDA DE ARCHIVO A STORAGE ----
        if ($request->hasFile('link_normativa') && $request->file('link_normativa')->isValid()) {

            $file     = $request->file('link_normativa');
            $fileName = time() . '_' . $file->getClientOriginalName();

            // Guardar en storage/app/public/uploads/<categoria>
            $path = $file->storeAs(
                'uploads/' . $Infoistae->categoria,  // subcarpeta
                $fileName,
                'public'                             // disco configurado en config/filesystems.php
            );

            // Guardar ruta relativa para poder generar la URL
            // El campo contendrá, por ejemplo: 'uploads/categoria/archivo.pdf'
            $Infoistae->link_normativa = $path;
        }

        // ---- GUARDAR EN BASE DE DATOS ----
        if ($Infoistae->save()) {
            return redirect()->back()->with('success', 'Creado con éxito.');
        }

        return redirect()->back()->with('warning', 'No se pudo crear el registro.');

    } catch (\Exception $e) {
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



$datos =  Infoistae::findOrFail($id);
       
       
        return view('infoistae.edit', compact('datos'));
  
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

        $Infoistae = Infoistae::findOrFail($id);

        // ---- ACTUALIZAR CAMPOS ----
        $Infoistae->categoria = $request->input('categoria');
        $Infoistae->detalle   = $request->input('detalle');
        $Infoistae->nombre    = $request->input('nombre');

        // ---- SUBIDA DE ARCHIVO A STORAGE ----
        if ($request->hasFile('link_normativa') && $request->file('link_normativa')->isValid()) {

            // Eliminar archivo anterior si existe
            if (!empty($Infoistae->link_normativa) && Storage::disk('public')->exists($Infoistae->link_normativa)) {
                Storage::disk('public')->delete($Infoistae->link_normativa);
            }

            $file     = $request->file('link_normativa');
            $fileName = time() . '_' . $file->getClientOriginalName();

            // Guardar en storage/app/public/uploads/<categoria>
            $path = $file->storeAs(
                'uploads/' . $Infoistae->categoria,  // subcarpeta
                $fileName,
                'public'                             // disco configurado en config/filesystems.php
            );

            // Guardar ruta relativa (ej: 'uploads/categoria/archivo.pdf')
            $Infoistae->link_normativa = $path;
        }

        // ---- GUARDAR EN BASE DE DATOS ----
        if ($Infoistae->save()) {
            return redirect()->back()->with('success', 'Actualizado con éxito.');
        }

        return redirect()->back()->with('error', 'No se pudo actualizar el registro.');

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

                $dato = Infoistae::findOrFail($id);
             
                $rutafile2 = public_path($dato->link_normativa); // Ruta completa al archivo en la carpeta 'public'
        
                if (File::exists($rutafile2)) {
                    File::delete($rutafile2); // Elimina el archivo
                }
                $dato->delete();
           
                return redirect()->route('infoistae.index');
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
