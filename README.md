AUTENTICACI�N M�LTIPLE II

1.- Definir el guard "admin" para que permita el nuevo m�todo de autenticaci�n en Config\auth.php
	1.1.- A�adir en el array guards
		'admin' => [
			'driver' => 'session',
			'provider' => 'admins',
		}
	1.2.- A�adie el nuevo provedor de usuarios admins
		En el array providers a�adir:
			'admins' => [
				'driver' => 'eloquent',
				'model' => App\Admin::class,
			],

2.- En RouteServiceProvider, en la funci�n de mapeo de las rutas de admin debemos a�adir el guard admin junto a Auth para que no use el guard por defecto middleware(['web, 'auth:admin', 'admin']).

3.- A�adir en las pruebas que usan admin el guard en actingAs($this->createAdmin(), 'admin')

4.- En TestCase, se a�ade c�digo, ver archivo.

5.- Cambiar m�todos de pruebas de admin DashboardTest seg�n vaya pidiendo. Los usuarios que intenten acceder a admin en alg�n momento van a ir a la p�gina de login.

6.- Refactorizar el punto 3 creando el m�todo actinAsAdmin en TestCase. En Create Admin se ha de llamar al model Admin.
	En el m�todo actingAsAdmin podemos a�adir que si el $admin pasado es null lo creamos. Asi nos evitamos llamar a create admin dentro de la llamada a actingAsAdmin

7.- De igual forma el actingAsUser, que acepte tambi�n nulos.

8.- Eliminar columna admin de las migraciones. Quitar las llamadas admin => true o false de las llamadas de creaci�n.

9.-Modificar los m�todos isAdmin y la prueba UserTest

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

	