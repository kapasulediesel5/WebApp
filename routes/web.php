	<?php
	
	use App\Http\Controllers\ContentController;
	use App\Http\Controllers\HomeController;
	use App\Http\Controllers\PackageController;
	use App\Http\Controllers\ProfileController;
	use App\Http\Controllers\ServiceController;
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
	
	Route::get('/', [ HomeController::class,'index']);
	
	Route::get('/dashboard', function () {
		return view('dashboard');
	})->middleware(['auth', 'verified'])->name('dashboard');
	
	Route::middleware('auth')->group(function () {
		Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
		Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
		Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


		/**
		 * Content Routes for handling crud operations
		 *
		 */
		Route::get('/content',[ContentController::class,'index']);
		//
		//Route::post ('/content', [ContentController::class,'show']);
		//
		//Route::get('/',[ContentController::class,'update']);
		//
		//Route::delete('/',[ContentController::class,'delete']);
		//

		/**
		 * Package Routes for handling crud operations
		 *
		 */
		Route::get('/packages',[PackageController::class,'index']);

		Route::get('/content/{id}/edit', [ContentController::class, 'edit']);
		//
		//Route::get('/',[PackageController::class,'update']);
		//
		//Route::put('/',[PackageController::class,'delete']);

		/**
		 * Service Routes for handling crud operations
		 *
		 */
		Route::get('/services',[ServiceController::class,'index']);
		//
		//Route::post ('/', [ServiceController::class,'show']);
		//
		//Route::get('/',[ServiceController::class,'update']);
		//
		//Route::delete('/',[ServiceController::class,'delete']);

	});
	

	require __DIR__.'/auth.php';
