<?php
class VisitController extends BaseController
{
    private $getAll,$arrayadd,$model,$getQuota;

    public function index()
	{
		
		$getAll = (new BaseModel)->getAll('visits');
		require_once('views/visits/index.php');

    }

    public function indexQuota()
	{
        $getAll = (new BaseModel)->getAll('quota_seller');
		require_once('views/visits/index_quota.php');

    }

    public function getBy($table)
	{
		$model = (new BaseModel)->getAll($table);
		return $model;

    }
    
    public function register()
	{
		require_once('views/visits/add.php');
    }

    public function registerQuota()
	{
		require_once('views/visits/add_quota.php');
    }

    public function update()
	{
		$id=$_GET["id"];
		$get = (new BaseModel)->getById($id,'quota_seller');
		require_once('views/visits/edit_quota.php');
	}

	public function save()
	{
		require_once("models/VisitModel.php");
		if (isset($_POST['seller'])) {
			$arrayadd = array('customer' => $_POST['customer'],
				'seller' => $_POST['seller'],
				'date' => $_POST['date'],
				'observations' => $_POST['observations']);
			
/****************aqui se calcula el valor de las visitas y el cupo disponible**********************************/

			$getCountSeller = (new VisitModel)->getCountSeller($_POST['seller'],'visits');
			$getQuota = (new VisitModel)->getQuota($_POST['seller'],'quota_seller');
			$getLastId = (new VisitModel)->getLastId($_POST['seller'],'visits');
			$getQuotan = (new VisitModel)->getQuotan($getLastId[0],'visits');

			$pVisits = $getCountSeller[0]/$getQuota[1];
			$vVisit = 20000 * $pVisits;
		    $QuotaB = $getQuotan[0] - $vVisit;

			$model = (new VisitModel)->save($arrayadd,'visits',$vVisit,$QuotaB);
			$response = new BaseController();
			if ($model == "Success") {
				$response->redirect("Visit","index",1);
			}else{
				$response->redirect("Visit","index",0);
			}
		}
    }

    public function saveQuota()
	{
        require_once("models/VisitModel.php");
		if (isset($_POST['quota'])) {
			$arrayadd = array('quota' => $_POST['quota'],
				'seller' => $_POST['seller'],
				'max_visits' => $_POST['max_visits']);
			$model = (new VisitModel)->saveQuota($arrayadd,'quota_seller');
			$response = new BaseController();
			if ($model == "Success") {
				$response->redirect("Visit","indexQuota",1);
			}else{
				$response->redirect("Visit","indexQuota",0);
			}
		}
    }

    public function editQuota()
	{
        require_once("models/VisitModel.php");
		if (isset($_POST['quota'])) {
            $arrayadd = array('quota' => $_POST['quota'],
                'id' => $_POST['id'],
				'seller' => $_POST['seller'],
				'max_visits' => $_POST['max_visits']);
			$model = (new VisitModel)->editQuota($arrayadd,'quota_seller');
			$response = new BaseController();
			if ($model == "Success") {
				$response->redirect("Visit","indexQuota",1);
			}else{
				$response->redirect("Visit","indexQuota",0);
			}
		}
    }

    public function delete()
    {
    	$id=$_GET["id"];
    	$model = (new BaseModel)->delete($id,'quota_seller');
    	$response = new BaseController();
    	if ($model == "Success") {
            $response->redirect("Visit","indexQuota",1);
        }else{
            $response->redirect("Visit","indexQuota",0);
        }
	}

	public function deleteVisits()
    {
    	$id=$_GET["id"];
    	$model = (new BaseModel)->delete($id,'visits');
    	$response = new BaseController();
    	if ($model == "Success") {
            $response->redirect("Visit","index",1);
        }else{
            $response->redirect("Visit","index",0);
        }
	}




}//end class