<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\EmployerController;
use App\Http\Controllers\TacheController;
use App\Http\Controllers\ReunionController;
use App\Http\Controllers\ProspectController;
use App\Http\Controllers\AffaireController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\ProsposalController;
use App\Http\Controllers\CommunicationTemplateController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


Route::get('home',[home::class,'home']);
Route::get('users',[HomeController::class,'users']);
Route::get('/services', [ServiceController::class, 'index'])->name('services.index');
Route::get('/services/create', [ServiceController::class, 'create'])->name('services.create');
Route::post('/services', [ServiceController::class, 'store'])->name('services.store');
Route::put('/services/{id}', [ServiceController::class, 'update'])->name('services.update');
Route::get('/services/{id}/edit', [ServiceController::class, 'edit'])->name('services.edit');
Route::delete('/services/{id}', [ServiceController::class, 'destroy'])->name('services.destroy');
Route::get('/clients/{id}', [ClientController::class, 'index'])->name('clients.index');
Route::get('/clients/{id}/create', [ClientController::class, 'create'])->name('clients.create');
Route::post('/clients/{id}', [ClientController::class, 'store'])->name('clients.store');
Route::delete('/clients/{id}/{idd}', [ClientController::class, 'destroy'])->name('clients.destroy');
Route::get('/clientss/{id}', [ClientController::class, 'show'])->name('clients.show');
Route::get('/employe', [EmployerController::class, 'index'])->name('employes.index');
Route::get('/Addemploye/create',[EmployerController::class, 'create'])->name('employes.create');
Route::post('/Addemploye',[EmployerController::class, 'store'])->name('employes.store');
Route::delete('/Addemploye/destroy/{id}',[EmployerController::class, 'destroy'])->name('employes.destroy');
Route::get('/employes/{id}/edit', [EmployerController::class, 'edit'])->name('employes.edit');
Route::put('/employes/{id}', [EmployerController::class, 'update'])->name('employes.update');
Route::resource('/taches', TacheController::class);
Route::get('/taches', [TacheController::class, 'index'])->name('taches.index');
Route::get('/taches/create', [TacheController::class, 'create'])->name('taches.create');
Route::post('/taches/create1', [TacheController::class, 'store'])->name('taches.store');
Route::delete('/taches/{id}', [TacheController::class, 'destroy'])->name('taches.destroy');
Route::get('/taches/{id}/edit', [TacheController::class, 'edit'])->name('taches.edit');
Route::put('/taches/{id}', [TacheController::class, 'update'])->name('taches.update');
Route::resource('/reunions', ReunionController::class);
Route::get('/addreunion/create', [ReunionController::class, 'create'])->name('reunions.create');
Route::post('/addreunion', [ReunionController::class, 'store'])->name('reunions.store');
Route::get('/reunions/{reunion}/edit', [ReunionController::class, 'edit'])->name('reunions.edit');
Route::put('/reunions/{reunion}', [ReunionController::class, 'update'])->name('reunions.update');
Route::post('/taches/{id}/assign', [TacheController::class, 'assignEmployees'])->name('taches.assign');
Route::get('/taches/{tache}/employes', [TacheController::class, 'showEmployees'])->name('taches.employes');
Route::delete('/taches/{tache}/employes/{employe}', [TacheController::class, 'disassociate'])->name('taches.disassociate');
Route::get('/reunions/{reunion}/reunions', [ReunionController::class, 'showEmployees'])->name('reunion.employes');
Route::post('/reunion/{id}/assign', [ReunionController::class, 'assignEmployees'])->name('reunions.assign');
Route::delete('/reunions/{reunion}/employes/{employe}', [ReunionController::class, 'disassociate'])->name('reunions.disassociate');
Route::get('/prospects', [ProspectController::class, 'index'])->name('prospects.index');
Route::get('/prospects/create', [ProspectController::class, 'create'])->name('prospects.create');
Route::post('/prospects', [ProspectController::class, 'store'])->name('prospects.store');
Route::get('/prospects/{prospect}/edit', [ProspectController::class, 'edit'])->name('prospects.edit');
Route::delete('/prospect/{prospect}', [ProspectController::class, 'destroy'])->name('prospects.destroy');
Route::put('/prospects/{prospect}', [ProspectController::class, 'update'])->name('prospects.update');
Route::get('/affaires/create/{id}', [AffaireController::class, 'create'])->name('affaires.create');
Route::post('/affaires/{id}', [AffaireController::class, 'store'])->name('affaires.store');
Route::get('/affaires', [AffaireController::class, 'index'])->name('affaires.affaires');
Route::delete('/affaires/{id}', [AffaireController::class,'destroy'])->name('affaires.destroy');
Route::get('/activities/create/{client_id}', [ActivityController::class, 'create'])->name('activities.createForClient');
Route::delete('/activity/{id}', [ActivityController::class, 'destroy'])->name('activity.destroy');

Route::post('/activities/{id}', [ActivityController::class, 'store'])
    ->name('activities.store');

    Route::get('/activities', [ActivityController::class, 'index'])
    ->name('activities.index');
    
Route::get('/communication_templates', [CommunicationTemplateController::class, 'index'])->name('communication_templates.index');
Route::get('/communication_templates/create/{client_id}', [CommunicationTemplateController::class, 'create'])->name('communication_templates.create');
Route::post('/communication_templates/{client_id}', [CommunicationTemplateController::class, 'store'])->name('communication_templates.store');
Route::delete('/com/{id}', [CommunicationTemplate::class, 'destroy'])->name('communication_templates.destroy');


Route::get('/proposals/create/{client_id}', [ProsposalController::class, 'create'])->name('proposals.create');
Route::post('/proposals/{client_id}', [ProsposalController::class, 'store'])->name('proposals.store');
Route::get('/{client_id}/proposals', [ProsposalController::class, 'index'])->name('proposals.index');
Route::delete('{client_id}/prosposal/{proposal_id}', [ProsposalController::class, 'destroy'])->name('proposals.destroy');
Route::get('/Oclients', [ClientController::class, 'show'])->name('clients.show');


Route::get('/clients/search', [ClientController::class, 'search'])->name('clients.search');
Route::get('/dashboard', [DashboardController::class,'stat'])->name('client.activities.stats')->middleware(['auth', 'verified'])->name('dashboard');


});
require __DIR__.'/auth.php';
