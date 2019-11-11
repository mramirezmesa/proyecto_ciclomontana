<?php
class FrontController
{

	public static function index()
	{

		include "views/login.php";

	}

	public static function home()
	{

		include "views/home.php";

	}

	#login
#-------------------------------------
	public function login()
	{
		if (isset($_POST['user']))
		{
			$arraylogin = array( 'user' => $_POST['user'] ,
				'pass' => $_POST['pass']);
			$model = (new BaseModel)->login($arraylogin, 'users');
			if ($model['user']=="") {
				$model['user']=1;
			}
			if($model['user']==$_POST['user'] &&$model['pass']==sha1($_POST['pass'])and $model['active']!= 0){
				$_SESSION["validar"]=true;
				$_SESSION["user"]=$model["user"];
				$_SESSION["name"]=$model["name"];
				require_once('views/home.php');

			}else{
				$fallo = true;
				require_once('views/login.php');
			}
		}
	}

	public static function error()
	{
		include "views/404.php";

	}

	public static function exit()
	{
		$exit = true;
		session_destroy();
		include "views/login.php";
	}

}
?>