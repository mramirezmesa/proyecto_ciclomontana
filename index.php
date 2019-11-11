<?php
require_once("config/global.php");
require_once("core/Conectar.php");
require_once("core/HelpView.php");
require_once("controllers/BaseController.php");


require_once("models/BaseModel.php");
session_start();
if (isset($_GET["controller"])&&isset($_GET['action'])) {
	$controller=$_GET["controller"];
	$action = $_GET["action"];
}else{
	$controller =CONTROLADOR_DEFECTO;
	$action =ACCION_DEFECTO;
}

require_once('views/template.php');
?>
