<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\Noticiasfacebook;
use App\Models\Proyecto;
use Exception;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;

class ProyectoController extends Controller
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

                $datos = Proyecto::with('User',)
                ->has('User')
                ->latest()
                ->paginate(2);
                return view('proyectos.index', compact('datos'));
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
    $query = Proyecto::query();

    // Aplica los filtros de búsqueda si se proporcionan
    if ($request->has('name_py')) {
        $filtro_nombre = $request->input('name_py');
        $query->where('name_py', 'like', "%$filtro_nombre%");
    }

    // Continúa agregando más filtros si es necesario

    $datos = $query->latest()->paginate(1000);

    return view('proyectos.index', compact('datos'));
} catch (Exception $e) {
    return   redirect()->back()->with('error', 'Error al Cargar');
    }
   }




   public function Categorias(Request $request)
   {
       try{
   $query = Proyecto::query();
 
   // Aplica los filtros de búsqueda si se proporcionan
   if ($request->has('tipo_trabajo')) {
       $filtro_nombre = $request->input('tipo_trabajo');
       $query->where('tipo_trabajo', 'like', "%$filtro_nombre%");
   }
 
   // Continúa agregando más filtros si es necesario
 
   $datos = $query->latest()->paginate(1000);
   $tipo_trabajo = $request->input('tipo_trabajo');
   $matriz = compact('datos', 'tipo_trabajo');
   return view('info.proyectos', compact('matriz'));
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


             
        return view('proyectos.create');

       
    } catch (Exception $e) {
        return   redirect()->back()->with('error', 'Error al Cargar');
        }


    }
    public function store(Request $request){
       
             
             if (session()->has('roles')) {
                if (session('roles') && session('roles')->role_name != "admin") {
                    return redirect('/');
                }
            } else {
                return redirect('/');
            }


            $Proyecto = new Proyecto();
          
            $Proyecto->name_py =$request->input('name_py');
            $Proyecto->detalle_py =$request->input('detalle_py');
            $Proyecto->id_users =$request->input('id_users');
            $Proyecto->tipo_trabajo =$request->input('tipo_trabajo');

          
             if ($request->hasFile('img_autor') && $request->file('img_autor')->isValid()) {

                $file = $request->file('img_autor');
                $fileName = time() . '_' . $file->getClientOriginalName();
                $file->move(base_path('../img_autor/' ."proyect"), $fileName); // Copiar el archivo a la carpeta "public/uploads"
                $Proyecto->img_autor = 'img_autor/' .  "proyect". '/' . $fileName;
            }

            if ($request->hasFile('file_proyect') && $request->file('file_proyect')->isValid()) {

                $file = $request->file('file_proyect');
                $fileName = time() . '_' . $file->getClientOriginalName();
                $file->move(base_path('../uploads/' ."proyect"), $fileName); // Copiar el archivo a la carpeta "public/uploads"
                $Proyecto->link_py = 'uploads/' .  "proyect". '/' . $fileName;
            }else{
                $Proyecto->link_py =$request->input('link_py');

            }
     

            if ($Proyecto->save()) {
                return redirect()->back()->with('success', 'Creado con éxito');
            }


       return   redirect()->back()->with('warning', 'No Creado Crear');
   
   
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



$datos =  Proyecto::findOrFail($id);
       
       
        return view('proyectos.edit', compact('datos'));
  
    } catch (Exception $e) {
        return   redirect()->back()->with('error', 'Error al Cargar');
        }
    }

// esta funcion actualiza los datos en la base d
    public function update(Request $request, $id)
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

        $Proyecto = Proyecto::findOrFail($id);
          
        $Proyecto->name_py =$request->input('name_py');
        $Proyecto->detalle_py =$request->input('detalle_py');
       
        $Proyecto->id_users =$request->input('id_users');

        $Proyecto->tipo_trabajo =$request->input('tipo_trabajo');

          
             if ($request->hasFile('img_autor') && $request->file('img_autor')->isValid()) {
             if (!empty($Proyecto->img_autor)) {
                $rutaImagen = public_path($Proyecto->img_autor);
                if (File::exists($rutaImagen)) {
                    File::delete($rutaImagen); // Elimina la imagen
                }
            }
                $file = $request->file('img_autor');
                $fileName = time() . '_' . $file->getClientOriginalName();
                $file->move(base_path('../img_autor/' ."proyect"), $fileName); // Copiar el archivo a la carpeta "public/uploads"
                $Proyecto->img_autor = 'img_autor/' .  "proyect". '/' . $fileName;
            }
        
        if ($request->hasFile('file_proyect') && $request->file('file_proyect')->isValid()) {
            if (!empty($Proyecto->link_py)) {
                $rutaImagen = public_path($Proyecto->link_py);
                if (File::exists($rutaImagen)) {
                    File::delete($rutaImagen); // Elimina la imagen

                }
            }
            $file = $request->file('file_proyect');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(base_path('../uploads/' ."proyect"), $fileName); // Copiar el archivo a la carpeta "public/uploads"
            $Proyecto->link_py = 'uploads/' ."proyect" . '/' . $fileName;
        }else{
            if(!empty($request->input('link_py'))){
                $Proyecto->link_py =$request->input('link_py');
            }
        
        }



            if( $Proyecto->save()){
                return   redirect()->back()->with('success', 'Actualizado con exito Clave editada');
            }
        

        return   redirect()->back()->with('error', 'No Actualizado');
    
    } catch (Exception $e) {
        return   redirect()->back()->with('error', 'Error al Cargar');
        }
    }

// esta funcion elimina datos de la tabla
    public function destroy($id)
    {
        try {
         //SEGURIDAD 
             
         if (session()->has('roles')) {
            if (session('roles')->role_name == "admin") {

                $dato = Proyecto::findOrFail($id);

                if (!empty($dato->link_py)) {
                    $rutaImagen = base_path('../'.$dato->link_py);
                    if (File::exists($rutaImagen)) {
                        File::delete($rutaImagen); // Elimina la imagen
    
                    }
                }
                if (!empty($dato->img_autor)) {
                    $rutaImagen = base_path('../'.$dato->img_autor);
                    if (File::exists($rutaImagen)) {
                        File::delete($rutaImagen); // Elimina la imagen
    
                    }
                }
                $dato->delete();
                return redirect()->route('proyectos.index');
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
