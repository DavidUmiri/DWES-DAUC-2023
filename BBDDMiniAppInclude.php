<?php
session_start();
// comprobacion para evitar que accedan directamente a mostrar.php
if (!isset($_SESSION["iniciar"])) {
    header("Location: BBDDMiniAppCerrar.php");
}
