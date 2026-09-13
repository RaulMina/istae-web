<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FacebookController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\NormativasController;
use App\Http\Controllers\ProyectoController;
use App\Http\Controllers\InfoistaesController;
use App\Http\Controllers\SolicitudController;
use App\Http\Controllers\ComponenteFormatoController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\Admin\ChatSettingsController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// Agregar en routes/web.php debajo de las rutas principales del HomeController.
Route::get('/bienestar-institucional', [HomeController::class, 'BienestarInstitucional'])->name('bienestar.institucional');
Route::get('/vinculacion', [HomeController::class, 'Vinculacion'])->name('vinculacion');
Route::get('/practicas-pre-profesionales', [HomeController::class, 'PracticasPreProfesionales'])->name('practicas.preprofesionales');
Route::get('/aseguramiento-calidad', [HomeController::class, 'AseguramientoCalidad'])->name('aseguramiento.calidad');
Route::get('/', [HomeController::class, 'Index'])->name('home');
Route::get('/docente', [HomeController::class, 'Docente'])->name('docente');
Route::get('/history', [HomeController::class, 'History'])->name('history');
Route::get('/filosofia', [HomeController::class, 'Filosofia'])->name('filosofia');
Route::get('/codigoE', [HomeController::class, 'CodigoE'])->name('codigoE');
Route::get('/softw_carre', [HomeController::class, 'Softw_carre'])->name('softw_carre');
Route::get('/agricola_carre', [HomeController::class, 'Agricola_carre'])->name('agricola_carre');
Route::get('/automotriz_carre', [HomeController::class, 'Automotriz_carre'])->name('automotriz_carre');
//Route::get('/futbol', [HomeController::class, 'Futbol'])->name('futbol');
Route::get('/normativas', [HomeController::class, 'Normativa'])->name('normativas');
Route::get('/contacto', [HomeController::class, 'Contato'])->name('contacto');
Route::get('/admision', [HomeController::class, 'Admision'])->name('admision');
Route::get('/bienestar-institucional', [HomeController::class, 'BienestarInstitucional'])->name('bienestar.institucional');
Route::get('/vinculacion', [HomeController::class, 'Vinculacion'])->name('vinculacion');
Route::get('/practicas-pre-profesionales', [HomeController::class, 'PracticasPreProfesionales'])->name('practicas.preprofesionales');
Route::get('/aseguramiento-calidad', [HomeController::class, 'AseguramientoCalidad'])->name('aseguramiento.calidad');

Route::get('/proyectosrevistas', [HomeController::class, 'Proyectos'])->name('proyectosrevistas');


Route::get('/login', [HomeController::class, 'login'])->name('login');
//Route::get('/register', [HomeController::class, 'register'])->name('register');
Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
Route::get('/exit', [HomeController::class, 'Salir'])->name('exit');
Route::get('/terminosycondiciones', [HomeController::class, 'Terminosycondiciones'])->name('terminosycondiciones');

//**USER */
Route::resource('/user', UserController::class);
Route::get('/searchuser', [UserController::class, 'search'])->name('searchuser');
Route::post('/register_user', [UserController::class, 'register_user'])->name('register_user');
Route::post('/login_user', [UserController::class, 'login_user'])->name('login_user');


//**NoticioasfacebookController */
Route::resource('/facebook_noticias',FacebookController::class);
Route::get('/searchlink_facebook', [FacebookController::class, 'search'])->name('searchlink_facebook');

Route::post('/istaepost', [HomeController::class, 'EnviaCorreo'])->name('istaepost');

Route::post('/istaepostbienestar', [HomeController::class, 'EnviaCorreoBienestar'])->name('istaepostbienestar');
//**NormativasController */
Route::resource('/normativa',NormativasController::class);
Route::get('/searchnormativa', [NormativasController::class, 'search'])->name('searchnormativa');

//**ProyectoController */
Route::resource('/proyectos',ProyectoController::class);
Route::get('/searchproyectos', [ProyectoController::class, 'search'])->name('searchproyectos');

//**InfoistaesController */
Route::resource('/infoistae',InfoistaesController::class);
Route::get('/searchinfoistaes', [InfoistaesController::class, 'search'])->name('searchinfoistaes');


Route::get('/categorias', [ProyectoController::class, 'Categorias'])->name('categorias');
Route::get('/categoriasinfoistae', [InfoistaesController::class, 'Categorias'])->name('categoriasinfoistae');


//**Solicitudes */
Route::resource('solicitudes', SolicitudController::class);
Route::get('solicitudes/{id}/pdf', [SolicitudController::class, 'descargarPdf'])->name('solicitudes.pdf');
Route::get('/solicitudes/{id}/ver', [SolicitudController::class, 'verSolicitud'])->name('solicitudes.ver');
Route::get('/solicitudes/{id}/asignacion-practicas', [SolicitudController::class, 'asignacionPracticas'])->name('solicitudes.asignacion-practicas');

Route::resource('componentes-formatos', ComponenteFormatoController::class);

// Ruta para solicitudes de estudiantes (pública)
Route::get('/solicitudes-estudiantes', [HomeController::class, 'SolicitudesEstudiantes'])->name('solicitudes.estudiantes');
Route::get('/solicitudes-view', [HomeController::class, 'SolicitudesView'])->name('solicitudes.view');
Route::get('/verpublic-solicitudes', [HomeController::class, 'VerPublicSolicitudes'])->name('verpublic.solicitudes');


Route::get('/ver-archivo/{path}', function ($path) {
    // Decodifica la ruta en caso de que contenga espacios u otros caracteres
    $path = urldecode($path);

    // Verifica que el archivo exista en storage/app/public
    if (!Storage::disk('public')->exists($path)) {
        abort(404);
    }

    // Devuelve el archivo como respuesta
    return response()->file(storage_path('app/public/' . $path));
})->where('path', '.*')->name('ver.archivo');

// **Chat con IA (ISTABot)**
Route::post('/chat/send', [ChatController::class, 'send'])->middleware('throttle:20,1')->name('chat.send');
Route::get('/chat/history', [ChatController::class, 'history'])->name('chat.history');
Route::get('/chat/knowledge/{knowledgeFile}/download', [ChatController::class, 'downloadKnowledge'])->name('chat.knowledge.download');
Route::get('/chat/knowledge/{knowledgeFile}/view', [ChatController::class, 'viewKnowledge'])->name('chat.knowledge.view');

Route::prefix('admin/chat')->name('admin.chat.')->group(function () {
    Route::get('/', [ChatSettingsController::class, 'index'])->name('index');
    Route::post('/settings', [ChatSettingsController::class, 'updateSettings'])->name('settings');
    Route::post('/website', [ChatSettingsController::class, 'storeWebsiteSource'])->name('website.store');
    Route::post('/website/bulk-destroy', [ChatSettingsController::class, 'bulkDestroyWebsiteSources'])->name('website.bulk-destroy');
    Route::post('/website/bulk-refresh', [ChatSettingsController::class, 'bulkRefreshWebsiteSources'])->name('website.bulk-refresh');
    Route::post('/website/{websiteSource}/refresh', [ChatSettingsController::class, 'refreshWebsiteSource'])->name('website.refresh');
    Route::post('/website/{websiteSource}/frequency', [ChatSettingsController::class, 'updateWebsiteSourceFrequency'])->name('website.frequency');
    Route::delete('/website/{websiteSource}', [ChatSettingsController::class, 'destroyWebsiteSource'])->name('website.destroy');
    Route::post('/icon', [ChatSettingsController::class, 'updateIcon'])->name('icon');
    Route::post('/knowledge', [ChatSettingsController::class, 'storeKnowledgeFile'])->name('knowledge.store');
    Route::delete('/knowledge/{knowledgeFile}', [ChatSettingsController::class, 'destroyKnowledgeFile'])->name('knowledge.destroy');
    Route::post('/knowledge/bulk-destroy', [ChatSettingsController::class, 'bulkDestroyKnowledgeFiles'])->name('knowledge.bulk-destroy');
});