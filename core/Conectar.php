<?php
class Conectar
{

	public function conexion()
	{
		$con = new PDO('mysql:host=localhost;dbname=ciclomontana','root','');
		$con->exec("SET NAMES 'utf8';");

		return $con;

	}
}
