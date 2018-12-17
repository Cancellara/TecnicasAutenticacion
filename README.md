AUTENTICACI�N M�LTIPLE IV: Redirecciones

1.- A�adir el m�todo unauthenticated en Exception/Handler.php
	middleware auth: bloquea acciones/rutas a usuarios no conectados
	RedirectIfAutthenticated o guest bloquea acciones/rutas a usuarios conectados: Rutas que no tienen sentido que llegue un usuario logado. P�gina de registro o de login.

2.- A�adir un segun guard en la ruta del home. Seria el guard admin, ademas del web que es el por defecto. Con esto podremos ir a /home logados como admin. Antes no podiamos.

3.- A�adir la prueba it_shows_dashboard_page_to_admins() que testea lo que hemos hecho en 2 (fallar� porque llamamos al actingAsAdmin()

4.- Si nos interesase que al intentar acceder a una p�gina de admin nos llevase al login de admin, en Exeptions/Handler.php, m�todo unathenticated()
	if($request->expectsJson()) {
		return response()->json(['message' => $exception->getMessage()], 401);
	}
	if($request->segment(1) == 'admin') { //segment(1) coge el primer segmento de la ruta
		return redirect()->guests(route('admin.login));
	}
	
	return redirect()->guests(route('login));
	
	Fallar�n las pruebas que redirigian a login. Apa�arlas.

5.- Refactorizaci�n del punto 4:
	5.1.- A�adir en AppServiceProvider en el m�todo boot un nuevo macro
		Request::macro('isAdmin', function() {
			return $this->segment(1) == 'admin'
		}
	5.2.- En Handler llamar a este m�todo. $request->isAdmin()

6.- Para que no tenga ese comportamiento basta con cambiar el redirect a admin.login por
	throw new NotFoundHttpException;

7.- PAra que no deje ir a la pagina de login de usuarios noramles en Admin/LoginController.php, en el constructor a�adir el guard admin $this->middleware('guest:admin')->except('logout');
En la clase del middleware guest que es Http/Middelware/RedirectIfAtuthenticated hay que modificar el m�todo handle para que nos mande a /admin o a /home dependiendo del tipo de peticion que se haga
	if(Auth::guard($guard)->check() {
		return redirect($request->isAdmin() ? '/admin' : '/home');
	}
