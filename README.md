AUTENTICACIÓN MÚLTIPLE II

1.- Definir el guard "admin" para que permita el nuevo método de autenticación en Config\auth.php
	1.1.- Añadir en el array guards
		'admin' => [
			'driver' => 'session',
			'provider' => 'admins',
		}
	1.2.- Añadie el nuevo provedor de usuarios admins
		En el array providers añadir:
			'admins' => [
				'driver' => 'eloquent',
				'model' => App\Admin::class,
			],

2.- En RouteServiceProvider, en la función de mapeo de las rutas de admin debemos añadir el guard admin junto a Auth para que no use el guard por defecto middleware(['web, 'auth:admin', 'admin']).

3.- Añadir en las pruebas que usan admin el guard en actingAs($this->createAdmin(), 'admin')

4.- En TestCase, se añade código, ver archivo.

5.- Cambiar métodos de pruebas de admin DashboardTest según vaya pidiendo. Los usuarios que intenten acceder a admin en algún momento van a ir a la página de login.

6.- Refactorizar el punto 3 creando el método actinAsAdmin en TestCase. En Create Admin se ha de llamar al model Admin.
	En el método actingAsAdmin podemos añadir que si el $admin pasado es null lo creamos. Asi nos evitamos llamar a create admin dentro de la llamada a actingAsAdmin

7.- De igual forma el actingAsUser, que acepte también nulos.

8.- Eliminar columna admin de las migraciones. Quitar las llamadas admin => true o false de las llamadas de creación.

9.-Modificar los métodos isAdmin y la prueba UserTest

10.- El middelware admin ya no es necesario, porque los usuarios estan en tablas diferentes.

ESTA FALLANDO:

Siempre que se llama a  

protected function actingAsAdmin($admin = null)
    {
        if ($admin == null) {
            $admin = $this->createAdmin();
        }
        return $this->actingAs($admin, 'admin');
    }

las pruebas retornan

Error: Call to a member function get() on null

	