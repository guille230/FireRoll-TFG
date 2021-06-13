<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\pruebaController;
use App\Http\Controllers\registrationController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\perfilController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::view('/', 'index')->name('index');
Route::view('/welcome', 'welcome')->name('welcome');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Tienda 

Route::get('/shop', [ShopController::class, 'index'])->name('shop');
Route::post('/shop/filtro',[ShopController::class,'filtrado'])->name('filtro');
Route::post('/shop/productDetail',[ShopController::class, 'getProducto'])->name('productDetail');
Route::post('/shop',[ShopController::class,'añadirCarrito'])->name('añadirCarrito');
Route::post('/shop/comprado',[ShopController::class,'purchase'])->name('purchase');

// Blog  
Route::get('/blog', [BlogController::class, 'index'])->name('blog');
Route::post('/blog/detail', [BlogController::class, 'getEntrada'])->name('blogDetail');
Route::post('/getCat', [BlogController::class, 'ajaxRequest'])->name('getCat');

// Games

Route::get('/partidas', [GameController::class, 'index'])->name('partidas');
Route::get('/partida-Detalle', [GameController::class, 'getPartida'])->name('getPartida'); 
Route::post('/partidas', [GameController::class, 'filtradoPartidas'])->name("filterGames");
Route::get('/partidas/crear', [GameController::class, 'formulario'])->name("formularioPartida");
Route::post('/partida/creado', [GameController::class, 'crearPartida'])->name("crearPartida");

//Perfil

Route::post('/perfil', [perfilController::class, 'index'])->name("perfil");
Route::post('/perfil/bioRedirect', [perfilController::class, 'setBio'])->name("actuBio");
Route::post('/perfil/iconRedirect', [perfilController::class, 'changeIcon'])->name("actuIcon");
Route::post('/perfil/bannerRedirect', [perfilController::class, 'changeBanner'])->name("actuBanner");

//Dashboard
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::group(['auth:sanctum', 'verified'], function () {
    Route::resource('gestionProductos', \App\Http\Controllers\DashboardController::class);
    Route::resource('gestionBlog', \App\Http\Controllers\DashboardBlogController::class);
});

//ayuda enviada
Route::view('/ayuda', 'ayuda')->name('ayuda');
Route::post('/ayuda/gracias',[AyudaController::class, 'index'])->name('ayudaEnviada');



