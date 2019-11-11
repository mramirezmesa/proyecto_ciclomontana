<?php
class CustomerModel extends BaseModel
{private $table,$arrayadd,$model;

	public function save($arrayadd,$table)
	{
		$model = $this->db->prepare("INSERT INTO $table(nit,name,address,phone,city,department,country,create_at)
		VALUES(:nit,:name,:address,:phone,:city,:department,:country,:fecha)");
		$model->bindParam(":nit", $arrayadd["nit"], PDO::PARAM_STR);
		$model->bindParam(":name", $arrayadd["name"], PDO::PARAM_STR);
		$model->bindParam(":address", $arrayadd["address"], PDO::PARAM_STR);
		$model->bindParam(":phone", $arrayadd["phone"], PDO::PARAM_STR);
		$model->bindParam(":city", $arrayadd["city"], PDO::PARAM_INT);
		$model->bindParam(":department", $arrayadd["department"], PDO::PARAM_INT);
		$model->bindParam(":country", $arrayadd["country"], PDO::PARAM_INT);
		$model->bindParam(":fecha", $arrayadd["fecha"], PDO::PARAM_STR);

		if ($model->execute()) {
			return "Success";
		}else{
			return $model->errorInfo();
		}
    }
    
    public function edit($arrayadd,$table)
	{
		$model = $this->db->prepare("UPDATE $table SET name=:name,address=:address,phone=:phone,city=:city,department=:department,country=:country WHERE id = :id");
		$model->bindParam(":id", $arrayadd["id"], PDO::PARAM_INT);
		$model->bindParam(":name", $arrayadd["name"], PDO::PARAM_STR);
		$model->bindParam(":address", $arrayadd["address"], PDO::PARAM_STR);
		$model->bindParam(":phone", $arrayadd["phone"], PDO::PARAM_STR);
		$model->bindParam(":city", $arrayadd["city"], PDO::PARAM_INT);
		$model->bindParam(":department", $arrayadd["department"], PDO::PARAM_INT);
		$model->bindParam(":country", $arrayadd["country"], PDO::PARAM_INT);
		

		if ($model->execute()) {
			return "Success";
		}else{
			return $model->errorInfo();
		}
	}

	//indicadores
	public function CountvisitsControllerModel($table)
	{
	$model =  $this->db->prepare("SELECT Count(city)FROM $table WHERE ");
	$model->execute();
	return $model->fetch();
	$model->close();

	}


}//end class