<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\Noticiasfacebook;

use Exception;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;

class FacebookController extends Controller
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

                $datos = Noticiasfacebook::with('User',)
                ->has('User')
                ->latest()
                ->paginate(2);
                return view('facebook_noticias.index', compact('datos'));
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
    $query = Noticiasfacebook::query();

    // Aplica los filtros de búsqueda si se proporcionan
    if ($request->has('name_facebook')) {
        $filtro_nombre = $request->input('name_facebook');
        $query->where('name_facebook', 'like', "%$filtro_nombre%");
    }

    // Continúa agregando más filtros si es necesario

    $datos = $query->latest()->paginate(10);

    return view('facebook_noticias.index', compact('datos'));
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


             
        return view('facebook_noticias.create');

       
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


            $Noticioasfacebook = new Noticiasfacebook();
          
            $Noticioasfacebook->link_facebook =$request->input('link_facebook');
            $Noticioasfacebook->name_facebook =$request->input('name_facebook');

            $Noticioasfacebook->id_users =$request->input('id_users');
           



            if ($Noticioasfacebook->save()) {
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



$datos =  Noticiasfacebook::findOrFail($id);
       
       
        return view('facebook_noticias.edit', compact('datos'));
  
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

        $Noticioasfacebook = Noticiasfacebook::findOrFail($id);
          
        $Noticioasfacebook->link_facebook =$request->input('link_facebook');
        $Noticioasfacebook->name_facebook =$request->input('name_facebook');
        $Noticioasfacebook->id_users =$request->input('id_users');
        
   
       

        
  
    
            if( $Noticioasfacebook->save()){
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

                $dato = Noticiasfacebook::findOrFail($id);
               
                $dato->delete();
                return redirect()->route('facebook_noticias.index');
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
