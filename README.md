1.- Crear Admin Events igual que en el anterior capitulo y sus pruebas asociadas.

2.- Crear grupo de rutas

Route::group(['middleware' => 'auth', 'admin'
		'prefix' = > 'admin'], function() {

require __DIR__ . /web/admin.php Crear el fichero con las rutas y el direcotrio web
Rutas sin lo comun
});

3.- Utilizando el RouteServiceProvider. Se elimina el texto de routas y se enlaza el fichero de rutas creado en web desde el mapeo
	function map() {
		...
		$this-> mapAdminRoutes();
	}

	function mapAdminRoutes()
	{
	
	}
