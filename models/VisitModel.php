<?php
class VisitModel extends BaseModel
{private $table,$arrayadd,$model;

	public function saveQuota($arrayadd,$table)
	{
		$model = $this->db->prepare("INSERT INTO $table(seller,quota,max_visits)
		VALUES(:seller,:quota,:max_visits)");
		$model->bindParam(":seller", $arrayadd["seller"], PDO::PARAM_STR);
		$model->bindParam(":quota", $arrayadd["quota"], PDO::PARAM_STR);
		$model->bindParam(":max_visits", $arrayadd["max_visits"], PDO::PARAM_INT);

		if ($model->execute()) {
			return "Success";
		}else{
			return $model->errorInfo();
		}
    }
    
    public function editQuota($arrayadd,$table)
	{
		$model = $this->db->prepare("UPDATE $table SET seller=:seller,quota=:quota,max_visits=:max_visits WHERE id = :id");
		$model->bindParam(":id", $arrayadd["id"], PDO::PARAM_INT);
		$model->bindParam(":seller", $arrayadd["seller"], PDO::PARAM_STR);
		$model->bindParam(":quota", $arrayadd["quota"], PDO::PARAM_STR);
		$model->bindParam(":max_visits", $arrayadd["max_visits"], PDO::PARAM_INT);

		if ($model->execute()) {
			return "Success";
		}else{
			return $model->errorInfo();
		}
	}

	public function save($arrayadd,$table,$visit_value,$quota_balance)
	{
		$model = $this->db->prepare("INSERT INTO $table(seller,customer,date,visit_value,quota_balance,observations)
		VALUES(:seller,:customer,:date,:visit_value,:quota_balance,:observations)");
		$model->bindParam(":seller", $arrayadd["seller"], PDO::PARAM_INT);
		$model->bindParam(":customer", $arrayadd["customer"], PDO::PARAM_INT);
		$model->bindParam(":date", $arrayadd["date"], PDO::PARAM_STR);
		$model->bindParam(":visit_value", $visit_value, PDO::PARAM_STR);
		$model->bindParam(":quota_balance", $quota_balance, PDO::PARAM_STR);
		$model->bindParam(":observations", $arrayadd["observations"], PDO::PARAM_STR);

		if ($model->execute()) {
			return "Success";
		}else{
			return $model->errorInfo();
		}
    }

	public function getQuota($seller,$table)
	{
	$model =  $this->db->prepare("SELECT quota,max_visits FROM $table WHERE seller = :seller");
	$model->bindParam(":seller", $seller, PDO::PARAM_INT);
	$model->execute();
	return $model->fetch();
	$model->close();
	}

	public function getQuotan($id,$table)
	{
	$model =  $this->db->prepare("SELECT quota_balance FROM $table WHERE id = :id");
	$model->bindParam(":id", $id, PDO::PARAM_INT);
	$model->execute();
	return $model->fetch();
	$model->close();
	}

	public function getCountSeller($seller,$table)
	{
	$model =  $this->db->prepare("SELECT COUNT(id) FROM $table WHERE seller = :seller");
	$model->bindParam(":seller", $seller, PDO::PARAM_INT);
	$model->execute();
	return $model->fetch();
	$model->close();
	}

	public function getLastId($seller,$table)
	{
	$model =  $this->db->prepare("SELECT MAX(id) FROM $table WHERE seller = :seller");
	$model->bindParam(":seller", $seller, PDO::PARAM_INT);
	$model->execute();
	return $model->fetch();
	$model->close();
	}

	


}//end class