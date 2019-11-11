<?php
class HelpView{

    public function url($controlador=CONTROLADOR_DEFECTO,$accion=ACCION_DEFECTO){
        $urlString="index.php?controller=".$controlador."&action=".$accion;
        return $urlString;
    }

    #mensajes
#-------------------------------------
	public function success()
	{
		echo'
		<div class="alert alert-success respuesta">
		<strong>Muy bien!</strong> El registro se ha ejecutado con exito!!.
		</div>
		';
	}

	public function error()
	{
		echo'
		<div class="alert alert-danger respuesta">
		<strong>Fallo!</strong> El registro No se ha podido ejecutar, Intente nuevamente.
		</div>
		';
	}



}
?>
