1.- Creación del proyecto:
	composer create-project laravel/laravel nombre_proyecto

2.- Se añade en la función boot del Provider AppServiceProvider
	use Illuminate\Support\Facades\Schema;

	Schema::defaultStringLength(191);

3.- Se añade el módulo de autenticación:
	php artisan make:auth

4.- Se crea la BBDD vacía y modifica el fichero .env con los datos de la BBDD.

5.- Se ejecutan las migraciones
	php artisan migrate

6.- Activar un middleware: Dos formas:
	6.1.- En el constructor de la clase controladora de la petición:
		 public function __construct()
    		{
		        $this->middleware('auth');
		}
	
	6.2.- En el propio fichero de rutas.
		Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');

7.- Utilizar pruebas
	7.1.- Crear primera clase de prueba:
		php artisan make:test DashboardTest 

	7.2.- Añadimos al principio el RefreshDatabase para que no se queden los usuarios de cada prueba creados.
		use RefreshDatabase;

	7.3.- Crear prueba: it_shows_dashboard_page_to_authenticated_users
		actingAs: Se usa para actuar como un usuario.

	7.4.- Crear prueba it_shows_loging_page_to_unathenticated_users
		assertStatus:
			200 -> Ok
			302 -> Redirect
			403 -> Prohibido
			404 -> No encontrado
			...
		assertRedirect('login'); -> Comprueba si se ha redirigido a esa url