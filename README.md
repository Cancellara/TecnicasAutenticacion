AUTENTICACI�N M�LTIPLE I

1.- Extraer la l�gica de creaci�n de usuarios admin y no admin a TestCase

2.- create nuevo modelo Admin y  Crear el factory Admin y migracion
	2.1-
		php artisan make:model Admin
		php artisan make:factory AdminFactory
	2.2.- Todo a la vez
		php artisan make:model Admin -fm

3.- Crear las rows de User en la migraci�n de Admin y poner el c�digo de UserFactory en AdminFactory.

4.- El modelo Admin debe extender te Authenticable.
	Se puede quitar el reset password. Para el admin valdr� pero no para otros usuarios.
	Para ello copiamos el c�digo de Illuminate\Foundation\Auth y pegarlo en el modelo admin excepto el name espace.
	Renombrar la clase a Admin y eliminar las interfaces y treats que no necestiamos "CanResetPassword"

5.- A�adir el m�todo isAdmin en modelo admin