Logout: Al estar conectado como admin y como user a la vez puede haber problemas a la hora de hacer logout. Para evitarlo.

1.- Modificar el layout de blade para que redirecciones dependiendo del segmento del request.
	Hay que hacerlo en dos sitios.
		href="{{ route(Request::isAdmin() ? 'admin.logout' : 'logout') }}"
	y
		action="{{ route(Request::isAdmin() ? 'admin.logout' : 'logout') }}"
		

2.- Crear nueva clase de prueba Admin/AdminLogoutTest
	2.1.- an_admin_can_logout();
		assertGuests y ssertAthenticated pasan un guard como parámetro

	2.2.- loggin_out_as_adn_admin_does_not_terminate_the_user_session()

3.- Copiar el método logout del treat autenticaction al adminController valdróa con comentar la línea que invalida la 

sesión. Pero se puede mejorar mirando si esta creada la sesión user(importar Illuminate\Http\Request)
