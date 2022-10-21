<?php
session_start();
session_destroy(); // destruye toda la informacion de la sesion actual
header("Location: BBDDMiniAppAutenticacion.php");
