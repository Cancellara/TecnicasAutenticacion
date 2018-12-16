1.- Añadir en el Home el enlace a Admin Dashboard
	<a href ="{{ route('admin_dahsboard')}}">
		...
	<a>

2.- Crear la clase de prueba unitaria UserTest 
	php artisan make:test UsertTest --unit

3.- Añadir el método is admin en la clase de Eloquent User.

4.- Crear prueba user_can_be_and_admin que consista en crear un usuario normal, asegurar que no es admin y después hacerle admin y comprobar que es admin.

5.- Para que la prueba funcione aciendo uso del método isAdmin en la clase user de eloquent hay que añadir el array $casts. Esto es necesario porque laravel pasa los boleanos como tinyint.
	protected $casts = [
		'admin' => 'boolean',
	];

6.- Añadir el método admin en el middelware Admin.

7.- Crear el condicional personalizado para las vistas @admin - @endadmin. Para ello creamos primeramente un nuevo provider:
	php artisan make:provider ViewServiceProvider
Resgistrarlo en config/app.php. 
	App\providers\ViewServicesProvider::class,
Añadir lógica en método boot del provider nuevo
	Blade::if('admin', function () {
		return auth()->check() && auth()->user->isAdmin(); //La primera parte comprueba que el usuario esta auntenticado, si no lo estaría retornaria null y no se podria llamar al siguiente método.
	}
Puede sustituirse por return optional(auth()->user())-isAdmin(); //que si no existe el usuario retornará falso y no null

8.- Añadir las nuevas etiquetas blade en la vista home para que solo muestre el enalce admin a administradores

9.- Crear clase unitaria de prueba CustomDirectivesTest para probar las directivas que se creen
	Blade::check('admin') --> esto devolverá null crear la clases testeo @admin para qeu devuelva false o true


