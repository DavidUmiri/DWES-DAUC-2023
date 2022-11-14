<?php

/*
*	Muestra el contenido de la parte central de la página
*/

function show_content() {
	if ($_SERVER['REQUEST_METHOD'] == 'GET') {					
		if (!isset($_GET['cmd'])){								// carga inicial de la página
			show_banner();
		}else {
			switch ($_GET['cmd']) {								//Dependiendo de la opción que pulse, muestra un contenido distinto
				case 'login':									//Login
					show_loging();
					break;

				case 'inicio':									//Inicio
					show_header();                      
					show_menu();
					show_content();                    
					show_footer();					
					break;

				case 'productos':								//Lista de Productos
					show_productos();				
					break;

				case 'cuenta':									//Cuenta
					show_cuenta();
					break;

				case 'menu_producto':							//Menu de productos
					show_menu_producto();
				break;

				case 'crear_usuario':							//Crear usuario
					show_crear_usuario();
				break;

				case 'acerca':									//Info página
					show_acerca_de();							
					break;

				case 'logout':									//logout
					show_msg("Ha cerrado la sesión");			
					show_banner();
					break;	

				default:
					"error de conexión";
					break;
			}

		}
	}else {														
		if (isset($_POST['login'])) {								//Función login
			if (login_okey()) {	
				show_productos();								
			} else {
				show_msg("Error de usuario o contraseña.");
				show_loging();
			}
			
		}


		if (isset($_POST['registrar'])){  							//Función registrar producto
				if (anadir_producto()) {		
					show_msg("Se ha añadido el producto."); 
					show_productos();
				} else {										
					show_msg("Error al añadir producto");	
				}

		}

		if (isset($_POST['eliminar'])){  							//Función eliminar producto
			if (eliminar_producto()) {								
				show_msg("Se ha eliminado el producto.");
				show_productos();
			} else {										
				show_msg("Fallo al eliminar");
				show_menu_producto();

			}	

		}	

		if (isset($_POST['reponer'])){  							//Funcion reponer stock producto
			if (reponer_stock()) {								
				show_msg("Se ha repuesto el stock producto.");
				show_productos();
			} else {										
				show_msg("Fallo al reponer");
				show_productos();	
			}	

		}

		if (isset($_POST['alta_usuario'])){  						//Función crear usuario						
			if (crear_usuario()) {									
				show_msg("El usuario ha sido dado de alta.");
				show_productos();
			} else {										
				show_msg("Error el usuario no ha sido dado de alta.");	
			}
		}

		if (isset($_POST['comprar'])){  							//Función comprar producto
			if (eliminar_stock()) {								
				show_msg("Se ha comprado el producto.");
				show_productos();
			} else {										
				show_msg("Fallo al comprar");
				show_productos();	
			}	

		}
		
	}
	
}

/*
* Realiza algunas acciones según esté la sesión abierta o no
*/
function actualizar_sesion() {			
	include 'configuration.inc.php';						//Funcion actualizar sesion
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		if (isset($_POST['login'])) {							//Si han pinchado el login
			if (login_okey()) {									//Compruebo si es un usuario 
				$_SESSION['user'] = $_POST['email'];			//Creamos la sesión 
				
				$_SESSION['admin'] = ($_POST['email'] == $admin); //Es administrador
			}
		} 

	} else {													
		if (isset($_GET['cmd'])) {
			if  ($_GET['cmd'] == 'logout') {					//Si pulsa logout
				unset($_SESSION);								//Destruimos la sesión
				session_destroy();						
			}
		}
	}
}

?>
