AUTENTICACIÓN MÚLTIPLE III

1.- Copiar Http/Controllers/Auth/LoginController.php en Http/Controllers/Admin y cambiar el nombre de espacio.

2.- Ir a vendor/laravel/framework/src/illuminate/Routing y copiar del método auth() las rutas login y logout (3 rutas en total) en web.php.

3.- Cambiar las rutas en web.php admin/login... tanto al principio como el nombre de ruta y el nombre de espacio de auth a admin

4.- copiar de views/auth/ login y pegarla en views/admin. Editarla para que sea diferente y cambiar el retorno a la vista nueva en el login controller que hemos creado en 1. Como el método esta en un trait, sobrescribimos los métodos que no aparecen en las llamadas al controlador de las rutas.

5.- Añadir el método guard() en la clase controlladora creada en 1.

6.- Modificar la variable protegida redirectoTo para que vaya a '/admin'

7.- Create clase de prueba AdminLoginTest
	7.1.- Modificar el método create admin y create user para que acepte parámetros.

	7.2.- Prueba loggin_in_as_an_admin
		assertAuthenticatedAs($user) comprueba si se esta autenticado
	7.3- cannot_login_with_invalid_credentials()
		error http 422
	7.4.- cannot_login_with_user_credentials()

8.- Modificar la plantilla madre para que se vea alguna diferencia en el nombre logado cuando es admin y cuando no usado @admin, @else, @endadmin

9.- En la ruta a la que se llama desde el botón login del administrador cambiar para que llame a la ruta de admin {{route('admin.login')}}

***Las pruebas siguen llamando al hacer el actingAsAdmin(), pero en el navegador todo esta funcionando sin problemas.