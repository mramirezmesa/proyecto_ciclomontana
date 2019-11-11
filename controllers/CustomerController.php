<?php

class CustomerController extends BaseController
{
    private $getAll,$arrayadd,$model;

    public function index()
	{
		$getAll = (new BaseModel)->getAll('customers');
		require_once('views/customers/index.php');

    }

    public function getBy($table)
	{
		$model = (new BaseModel)->getAll($table);
		return $model;

	}
    
    public function register()
	{
		require_once('views/customers/add.php');
    }

    public function update()
	{
		$id=$_GET["id"];
		$get = (new BaseModel)->getById($id,'customers');
		require_once('views/customers/edit.php');
	}
    
    public function save()
	{
        require_once("models/CustomerModel.php");
		if (isset($_POST['name'])) {
			$arrayadd = array( 'nit' =>  sha1($_POST['nit']) ,
				'name' => $_POST['name'],
				'fecha' => $GLOBALS["fecha"],
				'address' => $_POST['address'],
				'phone' => $_POST['phone'],
				'city' => $_POST['city'] ,
				'department' => $_POST['department'],
				'country' => $_POST['country']);
			$model = (new CustomerModel)->save($arrayadd,'customers');
			$response = new BaseController();
			if ($model == "Success") {
				$response->redirect("Customer","index",1);
			}else{
				$response->redirect("Customer","index",0);
			}
		}
    }

    public function edit()
	{
        require_once("models/CustomerModel.php");
		if (isset($_POST['name'])) {
			$arrayadd = array( 'id'=>$_POST['id'] ,
				'name' => $_POST['name'],
				'address' => $_POST['address'],
				'phone' => $_POST['phone'],
				'city' => $_POST['city'] ,
				'department' => $_POST['department'],
				'country' => $_POST['country']);
			$model = (new CustomerModel)->edit($arrayadd,'customers');
			$response = new BaseController();
			if ($model == "Success") {
				$response->redirect("Customer","index",1);
			}else{
				$response->redirect("Customer","index",0);
			}
		}
    }
    
    public function delete()
    {
    	$id=$_GET["id"];
    	$plans = (new BaseModel)->delete($id,'customers');
    	$response = new BaseController();
    	if ($plans == "Success") {
    		$response->redirect("Customer","index",1);
    	}else{
    		$response->redirect("Customer","index",0);
    	}
	}
	
	//indicadores

	public function CountvisitsController(){
    	$get = (new CustomerModel)-> CountvisitsControllerModel('customers');
    	return $get ;
    }

}//end class

