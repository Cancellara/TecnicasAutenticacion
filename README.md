1.- Crear clase de pruebas Admin/HideAdminRoutesTest
	1.1.- function it does_not_allow_guests_to_discover_admin_urls
		Tiene que redirigir a login.

	1.2.- function it_displays_404s_wehn_admins_visit_invalid_url
		Tiene que devolver un error 404 cuando se intente llegar a una URL invalida 

	1.3.- function it does_not_allow_guests_to_discover_admin_urls_using_post
		1.1 pero con post.

2.- Solución a medias: Añadir ruta fallback en las rutas de admin. A medias porque las rutas con post fallarian.
	Route::fallback(funcion{
		return response('Página no encontrada', 404);
		o
		return response()-view('errors/404', [], 404);
		o
		throw new Symfony\Component\HttpKernel\Excelption\NotFoundHttpException('Página no encontrada');

	});

3.- Solución Route::any: Atrapa cualquier tipo de petición, ya sea get, post, delete...
	Route::any('any', funtion() {
		throw new Symfony\Component\HttpKernel\Excelption\NotFoundHttpException('Página no encontrada');
	})->where('any', '.*'); //el where indica que any puede llevar cualquier conjunto de carácteres.

4.- Refactorizarlo: Pasarlo a una marco del provider RouteServiceProvider
	para ello en el método boot del proveedor.
	Route::macro('catch', function($action) {
		$this->any('{anything'}. $action)->where('anything', '.*');
	});

	En admin.php de rutas
	Route::catch(function () {
		throw new Symfony\Component\HttpKernel\Excelption\NotFoundHttpException;
	});	

5.- La ruta macro debe ser decalrada al final del fichero si se deja como antes, pero se puede evitar y poner donde sea si en el macro declarado en el provider al despues del where llamamos al método ->fallback();	
				