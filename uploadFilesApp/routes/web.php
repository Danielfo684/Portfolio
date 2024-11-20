
<?php

//import de Java
use App\Http\Controllers\UploadController;
use Illuminate\Support\Facades\Route;

//frontController

Route::get('/', [UploadController::class, 'create'])->name('upload.index');  // SHOW ALL. Cambiar a index cuando terminemos de crear la sección donde se muestran todas las imagenes.
Route::get('img/{file}', [UploadController::class, 'img'])->name('upload.img');  // SHOW IMG
Route::get('create', [UploadController::class, 'create'])->name('upload.create');  // Ruta para subir imágenes
Route::post('store', [UploadController::class, 'store'])->name('upload.store');  // Ruta de subida accesible a través de create
