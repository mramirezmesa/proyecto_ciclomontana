<?php

class BaseModel extends Conectar{

	private $table,$arrayadd,$model;

	public function __construct(){
		require_once "core/Conectar.php";
		$this->db=Conectar::conexion();

	}

	#login
	#--------------------------------
	public function login($arraylogin, $table)
	{
		$model = $this->db->prepare("SELECT * FROM $table WHERE user =:user");
		$model->bindParam(":user", $arraylogin["user"], PDO::PARAM_STR);
		$model->execute();
		return $model->fetch();
		// $stmt->close();
	}

    //mostrar todo
	public function getAll($table)
	{
		$model = $this->db->prepare("SELECT * FROM $table");
		$model->execute();
		return $model->fetchAll();
	}

		//obtener por id
	public function getById($id,$table){
		$model = $this->db->prepare("SELECT * FROM $table WHERE id=$id");
		$model->bindParam(":id", $id, PDO::PARAM_INT);
		$model->execute();
		return $model->fetch();
	}
		//eliminar
	public function delete($id,$table){
		$model = $this->db->prepare("DELETE FROM $table WHERE id=$id");
		$model->bindParam(":id", $id, PDO::PARAM_INT);
       	if ($model->execute()) {
			return "Success";
		}else{
			return "Error";
		}
	}

	//indicadores
	public function CountvisitsModel($table)
	{
	$model =  $this->db->prepare("SELECT Count(id) FROM $table ");
	$model->execute();
	return $model->fetch();
	$model->close();
	}





}//cerrar clase