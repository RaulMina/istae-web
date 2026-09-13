<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\Noticiasfacebook;
use App\Models\Normativa;
use App\Models\Proyecto;
use Illuminate\Support\Facades\Session;
use  App\Mail\EviarCorreo;
use Illuminate\Support\Facades\Mail;
use PhpParser\Node\Expr\Empty_;

class HomeController extends Controller
{
    //Home trabajara solo con las rutas get genenerales del sistema

    // la ruta index muestra el incio de la pagina
    public function Index(){
        $datos = Noticiasfacebook::orderBy('created_at', 'desc')->take(100)->get();
        return view('extens.home', compact('datos'));
    }
    public function History(){return view('info.history');}
    public function Docente(){
        $datos = User::with('Role')
            ->whereHas('Role', function ($query) {
              
            })
            ->latest()
            ->paginate(100);
             return view('info.docente', compact('datos'));
        
    }
    public function Admision(){return view('info.admision');}
    public function Filosofia(){return view('info.filosofia');}
    public function CodigoE(){return view('info.codigoE');}
    public function Softw_carre(){return view('info.softw_carre');}
    public function Agricola_carre(){return view('info.agricola_carre');}
    public function Automotriz_carre(){return view('info.automotriz_carre');}
    public function Futbol(){return view('info.page_futbol');}
    public function Normativa(){
        $datos = Normativa::all();
      
        return view('info.normativa',compact('datos'));
    }
    public function SolicitudesEstudiantes(){
        $componentesFormatos = \App\Models\ComponenteFormato::all()->groupBy('tipos_campos');
        return view('info.solicitudespb', compact('componentesFormatos'));
    }
    
    public function SolicitudesView(){
        return view('info.solicitudes_view');
    }
    
    public function VerPublicSolicitudes(){
        return view('info.verpublic_solicitudes');
    }
    public function Proyectos(){
        $datos = Proyecto::all();
      
        return view('info.proyectos',compact('datos'));
    }
    public function Terminosycondiciones(){return view('info.terminosycondiciones');}
    public function Contato(){return view('info.contacto');}
    // la ruta registros muetra el formulario para registrar usuarios
    public function Register(){
        $datos = [
            'Role'=> Role::all()
            ];
        return view('extens.register',compact('datos'));
     }
    // muestra la pagina de inicio de sesion
    public function Login()
    {
        if (!session()->has('user')) {
            return view('extens.login');
        } else {
            return redirect('/');
        }
    }
// muestra el panel de control
    public function Dashboard()
    {
        if (session()->has('user')) {
            $user = session('user');
            $role = session('roles');
            //  return view('prueba', compact('user'));
            if ($user->__get('id_roles') >= 0) {

                $datos = User::all();
                $datos = [
                    'Role'=>  $role,
                    'User'=>  $user
                    ];
                return view('extens.dashboard', compact('datos'));
            } else {
                return redirect('home');
            }
        } else {
            return redirect('login');
        }
    }

    // funcionpara salir del login inciado
    public function Salir()
    {
        session()->forget('user');
        session()->flush();
        return redirect('/');
    }



public function EnviaCorreoBienestar(Request $request){
    $nombre=$request->input("nombre");
    $correo=$request->input("email");
    $msmg=$request->input("smsg");
    if(!empty($nombre)&&!empty( $correo)&&!empty($msmg)){
      
        $dato = (object) [
            'Nombre' => $nombre,
            'Correo' => $correo,
            'Mensaje' => $msmg,
        ];
    //HomeController::enviarcorreo("cbiistae@istae.edu.ec",$dato);
    HomeController::enviarcorreo("polk.vernaza12@gmail.com",$dato);
    return redirect()->back()->with('success', 'Correo enviado');
    }
    return   redirect()->back()->with('error', 'Correo No enviado');
}
public function EnviaCorreo(Request $request){
    $nombre=$request->input("nombre");
    $correo=$request->input("email");
    $msmg=$request->input("smsg");
    if(!empty($nombre)&&!empty( $correo)&&!empty($msmg)){
      
        $dato = (object) [
            'Nombre' => $nombre,
            'Correo' => $correo,
            'Mensaje' => $msmg,
        ];
    HomeController::enviarcorreo("secretariageneralistae@gmail.com",$dato);
    return redirect()->back()->with('success', 'Correo enviado');
    }
    return   redirect()->back()->with('error', 'Correo No enviado');
}

public function enviarcorreo($correo,$id){
    Mail::to($correo)->send(new EviarCorreo($id) );

}

// Agregar dentro de la clase HomeController.
public function BienestarInstitucional()
{
    return view('info.bienestar-institucional');
}

public function Vinculacion()
{
    return view('info.vinculacion');
}

public function PracticasPreProfesionales()
{
    return view('info.practicas-pre-profesionales');
}

public function AseguramientoCalidad()
{
    return view('info.aseguramiento-calidad');
}


}

