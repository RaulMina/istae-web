<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;

use Exception;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;

class UserController extends Controller
{
  
    public function Index()
    {
             //SEGURIDAD 
             try{
             if (session()->has('roles')) {
                if (session('roles') && session('roles')->role_name != "admin") {
                    return redirect('/');
                }
            } else {
                return redirect('/');
            }
                $datos = User::with('Role',)
                ->has('Role')
                ->latest()
                ->paginate(10);
                return view('user.index', compact('datos'));
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
    $query = User::query();

    // Aplica los filtros de búsqueda si se proporcionan
    if ($request->has('filtro_nombre')) {
        $filtro_nombre = $request->input('filtro_nombre');
        $query->where('firstname_lastname', 'like', "%$filtro_nombre%");
    }

    // Continúa agregando más filtros si es necesario

    $datos = $query->latest()->paginate(10);

    return view('user.index', compact('datos'));
} catch (Exception $e) {
    return   redirect()->back()->with('error', 'Error al Cargar');
    }
   }
    public  function Sessionstar(){
        if (session()->has('user')) {
            return redirect('/');
        }
    }
  // Esta funcion llama a la vista crear usuarios

// esta funcion llama a la creacion de un registro nuevo desde la seccion de registrar usuarios
    public function register_user(Request $request){
        try {

            $verify = User::where('mail', $request->mail)
            ->orWhere('dni', $request->dni)
            ->get();

            if (!$verify->isEmpty()) {
                return redirect()->back()->with('warning', 'Error al Crear: Usuario ya existe');
            }
            $user = new User();
            $user->firstname_lastname =$request->input('firstname_lastname');
            $user->mail =$request->input('mail');
            $user->user =$request->input('user');
            $user->dni  =$request->input('dni');
            $user->id_roles = $request->input('id_roles');
            $user->state ="Suspended";
            $user->password = Hash::make($request->input('password'));

            if ($user->save()) {
                return redirect()->back()->with('success', 'Creado con éxito');
            }

        return   redirect()->back()->with('error', 'Error al Crear');
    } catch (Exception $e) {
          return   redirect()->back()->with('error', 'Error al Cargar ');
         }
    }
    public function login_user(Request $request)
    {
            try {
        $mail = $request->input('mail');
        $password = $request->input('password');

        // Busca el usuario en la base de datos
        $user = User::where('mail', $mail)->first();
        if($user!=null){
   if($user->state=="Active"){

   
        // Verifica si se encontró un usuario y si la contraseña es correcta

       if ($user && Hash::check($password, $user->password)) {

          // Inicia la sesión para el usuario
        session(['user' => $user]);

        // Obtiene los roles del usuario y los almacena en la sesión
        $roles = Role::findOrFail($user->id_roles);
        session(['roles' => $roles]);

    
        // Redirecciona a la página de inicio después del inicio de sesión exitoso
        return redirect()->route('dashboard');
        }
        // Si las credenciales son inválidas, redirecciona de vuelta al formulario de inicio de sesión con un mensaje de error
        return redirect()->back()->with('error', 'Credenciales inválidas');
    }else{
        return redirect()->back()->with('warning', 'Usuario suspendido ');
    }
}else{
    return redirect()->back()->with('warning', 'Usuario no existe ');
}


   } catch (Exception $e) {
          return   redirect()->back()->with('error', 'Error al Cargar ');
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


                $datos = [
                    'Role'=> Role::all()
                    ];
        return view('user.create',compact('datos'));

       
    } catch (Exception $e) {
        return   redirect()->back()->with('error', 'Error al Cargar');
        }


    }
    public function store(Request $request){
        try {
          //SEGURIDAD 
             
             if (session()->has('roles')) {
                if (session('roles') && session('roles')->role_name != "admin") {
                    return redirect('/');
                }
            } else {
                return redirect('/');
            }


            $user = new User();
            $userData = User::where('mail', $request->input('mail'))->first();

            if ($userData !== null) {
                return redirect()->back()->with('warning', 'Correo duplicado, ingrese otro correo');
            }
            $user->firstname_lastname =$request->input('firstname_lastname');
            $user->mail =$request->input('mail');
            $user->user =$request->input('user');
            $user->dni =$request->input('dni');
             $user->cargo =$request->input('cargo');
            $user->detalle =$request->input('detalle');
            $user->state =$request->input('state');
            $user->id_roles =$request->input('id_roles');
            $user->password = Hash::make($request->input('password'));
            if ($request->hasFile('img') && $request->file('img')->isValid()) {

                $file = $request->file('img');
                $fileName = time() . '_' . $file->getClientOriginalName();
                $file->move( base_path('../uploads/' . $user->mail), $fileName);
               // Copiar el archivo a la carpeta "public/uploads"
                $user->img = 'uploads/' . $user->mail . '/' . $fileName;
            }




            if ($user->save()) {
                return redirect()->back()->with('success', 'Creado con éxito');
            }


       return   redirect()->back()->with('warning', 'No Creado Crear');
   
    } catch (Exception $e) {
        return   redirect()->back()->with('error', 'Error al Cargar,Cedula  repetido o algún otro error ');
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



        $depen =  User::findOrFail($id);
        $datos = [
            'Role' =>  Role::all(),
        ];
        $matriz = compact('depen', 'datos');
        return view('user.edit', compact('matriz'));
  
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


          $user =User::findOrFail($id);
       

            $user->firstname_lastname =$request->input('firstname_lastname');
            $user->mail =$request->input('mail');
            $user->user =$request->input('user');
            $user->dni =$request->input('dni');
            $user->cargo =$request->input('cargo');
            $user->detalle =$request->input('detalle');
            $user->id_roles =$request->input('id_roles');
            $user->state=$request->input('state');
        if ($request->hasFile('img') && $request->file('img')->isValid()) {
            if (!empty($user->img)) {
                $rutaImagen = public_path($user->img);
                if (File::exists($rutaImagen)) {
                    File::delete($rutaImagen); // Elimina la imagen

                }
            }
            $file = $request->file('img');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(base_path('../uploads/' . $user->mail), $fileName); // Copiar el archivo a la carpeta "public/uploads"
            $user->img = 'uploads/' . $user->mail . '/' . $fileName;
        }
        $clave= $request->input('password');

        if($clave ==$user->password){
            $user->password = $request->input('password');
            if($user->save()){
                return   redirect()->back()->with('success', 'Actualizado con exito, Clave no editada');
            }
        }else{
            $user->password = Hash::make($request->input('password'));
            if($user->save()){
                return   redirect()->back()->with('success', 'Actualizado con exito Clave editada');
            }
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

                $dato = User::findOrFail($id);
                $rutafile2 = public_path( $dato->img); // Ruta completa al archivo en la carpeta 'public'
        
                if (File::exists($rutafile2)) {
                    File::delete($rutafile2); // Elimina el archivo
                }
                $dato->delete();
                return redirect()->route('user.index');
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
