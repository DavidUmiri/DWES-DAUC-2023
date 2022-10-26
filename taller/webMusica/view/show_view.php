<?php
/*
*	Muestra el menú, además del avatar y dependiendo el usuario unas opciones u otras
*/
function show_menu()
{
		echo '<!-- Header -->
				<header id="header">
					<div class="inner">';
		if (isset($_SESSION['user'])) {				// Si es usuario
			echo '<a class="logo ranking">
								<title>Puente arqueado</title>
								</a>
							<nav id="nav">
								<a href="index.php?cmd=productos" class="btn">Productos</a>
								<a href="index.php?cmd=cuenta" class="btn">Cuenta</a>';


			if ($_SESSION['admin']) {  				// Si es administrador
				echo '
								<a href="index.php?cmd=crear_usuario" class="btn">Crear usuario</a>
								<a href="index.php?cmd=menu_producto" class="btn">Gestionar productos</a>
								';
			}
			echo '<a href="index.php?cmd=logout" class="btn">Logout</a>';
		} else {
			echo '<a href="index.php" class="logo" />Puente Arqueado</a>
							<nav id="nav">
								<a href="index.php?cmd=productos" class="btn">Productos</a>
								<a href="index.php?cmd=login" class="btn">Log in</a>';
		}
		echo '</nav>
					</div>
				</header>';
	
}

/*
*	Muestra el banner
*/
function show_banner()
{
	echo 	'<!-- Banner -->
			<section id="banner">
				<div class="inner">
					<h1>BIENVENIDOS A TU TIENDA DE MUSICA DE CONFIANZA
					<br/>
					<ul class="actions">
						<li><a href="index.php?cmd=registrar"></a></li>
					</ul>
				</div>
			</section>
			<!-- Main -->
			<section id="main">
				<div class="inner">';
}


/*
*	Muestra el formulario de login 
*/
function show_loging()
{
	echo 	'<section class="contenedor">
					<form action="index.php" method="post" role="form">
						<div class="12u 12u$(xsmall) espacio"></div>
						<h1>LOG IN</h1>
						<div class="row uniform 50%">
							<div class="12u 12u$(xsmall)">
								<input id="email" type="email" class="pwd" name="email"" placeholder="Correo electrónico" required="" >
							</div>
							<div class="12u 12u$(xsmall)">
								<input id="pass" type="password" name="pass" placeholder="password" required="" >
							</div>
							<div class="12u$ 12u$(xsmall)">
								<button type="submit" name="login" class="boton">Login</button>
							</div>
							<div class="3u$ 12u$(small)"></div>
							<div class="12u 12u$(xsmall) espacio"></div>
							<div class="12u 12u$(xsmall) espacio"></div>
							<div class="12u 12u$(xsmall) espacio"></div>
							<div class="12u 12u$(xsmall) espacio"></div>							
						</div>	
					</form>
			</section>';
}

/*
*	Muestra el formulario para crear un usuario 
*/

function show_crear_usuario()
{
	echo 	'<section id="tiempo">
	<form action="index.php" method="post" role="form">
	<h1>Crear usuario</h1>
	<div class="row uniform 50%">
		<div class="12u 12u$(xsmall)">
			<label>Correo electrónico:</label>
			<input id="email" type="email" class="pwd" name="email" placeholder="Correo electrónico" required="" >
		</div>
		<div class="12u 12u$(xsmall)">
			<label>Contraseña:</label>
			<input id="pass" type="text" name="pass"" placeholder="Contraseña" required="" >
		</div>						
		<div class="6u 6u$(xsmall) espacio"></div>
		<div class="12u$ 12u$(xsmall)">
			<button type="submit" name="alta_usuario" class="boton">Dar de alta</button>
		</div>
		<div class="12u 12u$(xsmall) espacio"></div>
	</div>	
</form>
			</section>';
}

/*
*	Muestra los productos que hay disponibles
*/

function show_productos()
{
	include 'configuration.inc.php';
	$conn = mysqli_connect($DB_SERVER, $DB_USER, $DB_PASS, $DB_NAME);
	$sql = "select * from stock";
	$res = mysqli_query($conn, $sql);

	echo '<section id="productos">
	 			<form action="index.php" method="post" role="form">
	 				<div class="row uniform 50%">
	 					<div class="12u 12u$(xsmall) espacio"></div>			
	 					<div class="12u 12u$(xsmall)">
	 						<h1 class="centro">Catalogo</h1>
	 					</div>';
	while ($mostrar = mysqli_fetch_array($res)) {
		echo '<div class="centro" class="4u 12u$(xsmall)">
		<div class="12u 12u$(xsmall) espacio">
								 <p>--------------------------------------------------------------------</p>
								 </div>
	 						<div class="6u 12u$(xsmall)">
							 <h4 name="nombre" class="centro">' . $mostrar["ProdName"] . '</h4>	
							 <span class="image fit"><img src="images/' . $mostrar["ProdName"] . '.jpg" alt="" /></span>							
	 						</div>';
		if (isset($_SESSION['user'])) {
			echo '<div class="centro" class="6u 12u$(xsmall)">
	 							<span class="negrita">Precio: ' . $mostrar["ProdValue"] . ' €</span></p>
	 							<span class="negrita">Stock: ' . $mostrar["ProdStock"] . '</span></p>
								 			

	 						</div>';
			// <div class="6u 12u$(xsmall)">
			// 	<button type="submit" name="anadir" class="boton">añadir a cesta</button>
			// </div>';
		}
	}
	echo '</div> </div> </form> </section>';
}

/*
* Muestra el menu para gestionar los productos.
*/
function show_menu_producto()
{
	include 'configuration.inc.php';
	$conn = mysqli_connect($DB_SERVER, $DB_USER, $DB_PASS, $DB_NAME);
	$sql = "select * from stock";
	$res = mysqli_query($conn, $sql);

	echo '<section id="anadir_producto">
			<div>
				<form action="index.php" method="post" role="form">
				<div class="12u 12u$(xsmall) espacio"></div>

					<h1 class="centro">Menu de Gestión de productos</h1>

					<div class="centro" class="4u 12u$(xsmall)">
											 <div class="6u 12u$(xsmall)">
							<div class="12u 12u$(xsmall) espacio"></div>

							<div class="row uniform 50%">
							<div class="8u 12u$(xsmall)">
							<label>Pulsa para ver los productos existentes:</label>
							<select name="instrumentos">';


	while ($mostrar = mysqli_fetch_array($res)) {

		echo '<option>' . $mostrar["ProdName"] . '</option>';
	}

	echo '</select></div>

	<div class="4u 12u$(xsmall)">
		<label>Stock:</label>
		<input type="number" name="cantidad" placeholder="stock">
	</div><br>

	<div class="8u 12u$(xsmall)">							
		<button type="submit" name="eliminar" class="boton">Eliminar producto</button>
	</div>

	<div class="4u 12u$(xsmall)">							
		<button type="submit" name="reponer" class="boton">Reponer producto</button>
	</div>

	</div>
	<div class="row uniform 50%">
		<div class="8u 12u$(xsmall)">
			<label>Producto que añadir:</label>
			<input type="text" id="nombre" name="nombre" placeholder="Nombre">
	</div>

	<div class="4u 12u$(xsmall)">
			<label>Precio:</label>
			<input type="number" id="precio" name="precio" placeholder="precio">
	</div><br>
					
	<div class="4u 12u$(xsmall)">
		<label>Stock:</label>
		<input type="number" id="stock" name="stock" min="0" placeholder="stock">
	</div><br>
	
	<div class="12u 12u$(xsmall)">
		<button type="submit" name="registrar" class="boton">Registrar producto</button>
	</div>

		</form>	</div>
		';
}


/*
* Muestra la cuenta del usuario
*/
function show_cuenta()
{
	include 'configuration.inc.php';
	$conn = mysqli_connect($DB_SERVER, $DB_USER, $DB_PASS, $DB_NAME);
	$sqls = "select * from stock";
	$prod = mysqli_query($conn, $sqls);

	echo '<section id="cuenta">
		<div>
			<form action="index.php" method="post" role="form">

				<h1 class="centro">Comprar producto: </h1>

				<div class="centro" class="4u 12u$(xsmall)">
						<div class="6u 12u$(xsmall)">
						
						<div class="8u 12u$(xsmall)">
						<label>Pulsa para ver los productos existentes:</label>
						<select name="instrumentos">';


	while ($mostrar = mysqli_fetch_array($prod)) {

		echo '<option>' . $mostrar["ProdName"] . '</option>';
	}

	echo '</select></div></br>
	
	<div class="8u 12u$(xsmall)">
		<label>Cantidad:</label>
		<input type="number" id="cantidad" name="cantidad" placeholder="Cantidad">
	</div>				
	</div>

	<div class="12u 12u$(xsmall)">
		<button type="submit" name="comprar" class="boton">Comprar producto</button>
	</div>
					
</form></div>
';
}



/*
*	Muestra un mensaje de tipo alert
*	E: $msg (mensaje que se quiere mostrar en alert) 
*/
function show_msg($msg)
{
	echo "<script type='text/javascript'>alert('" . $msg . "');</script>";
}

/*
* Muestra el autor y caracteristicas de la pagina
* E: Autor, versión, fecha de creación y nombre de la aplicación cogidos del fichero de configuración
*/
function show_acerca_de()
{
	echo 	'<section id="info">
					<div class="row uniform 50%">
						<div class="12u 12u$(xsmall)">
							Versión: 2.04.15<br>
							Fecha de creación: 13/10/2022<br>
							&copy 2020 Puente arqueado.
							</h5>
						</div>
					</div>
					<div class="vacia"></div>
				</section>';

}
