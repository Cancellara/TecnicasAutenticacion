1.- Añadir nueva ruta con view:
	Route::view('/admin', '/admin/dashboard')->name(admin_dashboard);

2.- Crear en vistas el directorio admin y la vista dashboard dentro.

3.- Creamos la clase de pruebas AdminDashboardTest en el directorio de pruebas admin.
	3.1.- crear prueba admins_can_visit_the_admin_dashboard.

	3.2.- Crear prueba guests_cannot_visit_the_admin_dashboard

	3.3.- Crear non_admin_users_cannot_visit_the_admin_dashboard

	3.4.- Marcar las tres pruebas como incompletas.
		$this->MarkTestIncomplete();

4.- Modificar la migración de la tabla user añadiendo el campo admin de tipo booleano y con el valor false por defecto.
	$table->boolean('admin')->default(false);

5.- Añadir RefreshDatabase en la clase de prueba AdminDashboardTest

6.- Añadiendo el middleware auth a la ruta creada en 1 se hace funcionar la prueba 3.3 pero 3.2 sigue fallando. Hay que crear nuevo middleware.

7.- crear el middleware Admin. Se crea en la carpeta Http/Middleware
	php artisan make:middleware Admin

8.- Escribir el método handle del middleware.
	Equivalen:
		return response()->view('forbidden', [], 403);
		throw new AuthorizationException();

9.- Crear la vista 403 en una carpeta errors dentro de rutas.

10.- Añadir el middelware a la ruta creada. Bien con un controlador o bien añadiendo ->middleware('admin', 'auth'); al final de la ruta.

11.- Cambiar la ruta creada en 1 a get y añadir el controlador si se ha creado.

12.- Crear el alias admin para el middleware.
	En Kernel.php, en el array $routeMiddleware añadir:
	'admin' => \App\Http\Middleware\Admin::class,